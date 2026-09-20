<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model { protected $fillable = ['service_id','staff_id','amount','payment_mode','commission']; protected $casts = ['amount'=>'decimal:2','commission'=>'decimal:2']; public function service(){ return $this->belongsTo(Service::class); } public function staff(){ return $this->belongsTo(User::class,'staff_id'); } }
