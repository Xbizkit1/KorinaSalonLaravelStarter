<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Service extends Model { protected $fillable = ['name','category','price','duration','commission_rate']; protected $casts = ['price'=>'decimal:2']; }
