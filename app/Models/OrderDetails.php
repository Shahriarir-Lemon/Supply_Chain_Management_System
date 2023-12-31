<?php

namespace App\Models;
use App\Models\Order1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function manu_order()
    {
        return $this->belongsTo(Order1::class, 'order1_id');
    }
}
