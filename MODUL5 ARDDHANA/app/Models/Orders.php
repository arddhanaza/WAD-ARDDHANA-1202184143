<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class Orders extends Model
{
    use HasFactory;

    public static function getAllData(){
        return DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->select('orders.*','products.name')
            ->orderBy('created_at','desc')
            ->get();
    }
}
