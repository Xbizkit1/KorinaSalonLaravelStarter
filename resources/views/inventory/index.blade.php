@extends('layouts.app')
@section('title', 'Inventory · Korina Salon')
@section('content')
<p class="page-kicker">Studio supplies</p><h1>Inventory</h1><p class="page-subtitle">Items at or below their reorder level are flagged for the owner.</p>
<div class="card table-card"><table><tr><th>Item</th><th>Category</th><th>On hand</th><th>Reorder at</th><th>Supplier</th><th>Adjust stock</th></tr>@foreach($items as $item)<tr><td>{{ $item->name }}</td><td><span class="badge">{{ $item->category }}</span></td><td class="{{ $item->quantity <= $item->reorder_level ? 'low' : '' }}">{{ $item->quantity }}</td><td>{{ $item->reorder_level }}</td><td>{{ $item->supplier }}</td><td><form method="POST" action="{{ route('inventory.restock',$item) }}" style="display:flex;gap:7px">@csrf <input name="quantity" type="number" min="1" value="1" style="width:62px"> <button style="width:auto;min-height:38px;padding:7px 12px">Add</button><button formaction="{{ route('inventory.subtract',$item) }}" style="width:auto;min-height:38px;padding:7px 12px;background:#fff;color:#a34d5f;border-color:#d9afb8">Subtract</button></form></td></tr>@endforeach</table></div>
@endsection
