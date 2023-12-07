<?php

namespace App\Models;
use App\Models\CusOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CusOderDetail extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function cus_order()
    {
        return $this->belongsTo(CusOrder::class);
    }
}
