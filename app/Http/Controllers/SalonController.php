<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function home() { return view('welcome'); }

    public function dashboard()
    {
        return view('dashboard', [
            'sales' => Transaction::sum('amount'),
            'lowStock' => Inventory::whereColumn('quantity', '<=', 'reorder_level')->count(),
            'todayShifts' => Schedule::whereDate('shift_date', today())->count(),
            'recentTransactions' => Transaction::with(['service', 'staff'])->latest()->take(5)->get(),
        ]);
    }

    public function transactions()
    {
        return view('transactions.index', [
            'services' => Service::orderBy('category')->get(),
            'staff' => User::where('role', 'staff')->orderBy('name')->get(),
            'transactions' => Transaction::with(['service', 'staff'])->latest()->get(),
        ]);
    }

    public function storeTransaction(Request $request)
    {
        $data = $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'staff_id' => ['required', 'exists:users,id'],
            'payment_mode' => ['required', 'in:Cash,GCash'],
            'gcash_confirmed' => ['nullable', 'boolean'],
        ]);
        if ($data['payment_mode'] === 'GCash' && empty($data['gcash_confirmed'])) {
            return back()->withErrors(['payment_mode' => 'Please complete the GCash demo payment first.'])->withInput();
        }
        unset($data['gcash_confirmed']);
        $service = Service::findOrFail($data['service_id']);
        Transaction::create($data + [
            'amount' => $service->price,
            'commission' => round($service->price * ($service->commission_rate / 100), 2),
        ]);
        return back()->with('success', 'Transaction recorded and commission calculated.');
    }

    public function inventory()
    {
        return view('inventory.index', ['items' => Inventory::orderBy('quantity')->get()]);
    }

    public function restock(Request $request, Inventory $inventory)
    {
        $data = $request->validate(['quantity' => ['required', 'integer', 'min:1']]);
        $inventory->increment('quantity', $data['quantity']);
        return back()->with('success', 'Stock updated.');
    }

    public function subtractStock(Request $request, Inventory $inventory)
    {
        $data = $request->validate(['quantity' => ['required', 'integer', 'min:1']]);

        $updated = Inventory::whereKey($inventory->id)
            ->where('quantity', '>=', $data['quantity'])
            ->decrement('quantity', $data['quantity']);

        if (! $updated) {
            return back()->withErrors(['quantity' => "There isn't enough {$inventory->name} in stock to subtract that amount."]);
        }

        return back()->with('success', 'Stock reduced.');
    }

    public function schedules()
    {
        return view('schedules.index', [
            'schedules' => Schedule::with('staff')->orderBy('shift_date')->orderBy('shift_start')->get(),
        ]);
    }
}
