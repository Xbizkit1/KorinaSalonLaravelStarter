<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')->where('email', 'mika@korina.test')->update([
            'specialty' => 'Hair Color & Keratin',
            'updated_at' => now(),
        ]);

        DB::table('users')->updateOrInsert(
            ['email' => 'aira@korina.test'],
            [
                'name' => 'Aira Dela Cruz',
                'role' => 'staff',
                'specialty' => 'Nail Art & Manicures',
                'password' => Hash::make('password'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
        );
    }

    public function down(): void
    {
        DB::table('users')->where('email', 'aira@korina.test')->delete();
    }
};
