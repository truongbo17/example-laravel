<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    public $timestamps = false; //ko insert updated_at,created_at
    protected $fillable = [
        'customer_id',
        'total_money',
        'order_date'
    ];
}
