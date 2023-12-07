<?php

namespace App\Models;
use App\Models\CusOderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CusOrder extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function cus_order_details()
    {
        return $this->hasMany(CusOderDetail::class);
    }
}
