<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'lina@korina.test'],
            [
                'name' => 'Lina Garcia',
                'role' => 'assistant',
                'specialty' => 'Shampoo, Blow-Dry & Client Care',
                'password' => Hash::make('password'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
        );
    }

    public function down(): void
    {
        DB::table('users')->where('email', 'lina@korina.test')->delete();
    }
};
