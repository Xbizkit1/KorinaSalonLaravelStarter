<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Schedule extends Model { protected $fillable = ['staff_id','shift_date','shift_start','shift_end','status']; public function staff(){ return $this->belongsTo(User::class,'staff_id'); } }
