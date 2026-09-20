<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('schedules', function (Blueprint $table) { $table->id(); $table->foreignId('staff_id')->constrained('users'); $table->date('shift_date'); $table->time('shift_start'); $table->time('shift_end'); $table->enum('status',['Regular','Peak','Day Off'])->default('Regular'); $table->timestamps(); }); } public function down(): void { Schema::dropIfExists('schedules'); } };
