<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inventory extends Model { protected $fillable = ['name','category','quantity','reorder_level','supplier']; }
