<?php

namespace App\Models;
use App\Models\OrderDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order1 extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function manu_order_details()
    {
        return $this->hasMany(OrderDetails::class, 'order1_id');
    }
}
