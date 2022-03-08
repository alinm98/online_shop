<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'transaction_id' ,
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction($string)
    {
        $from = 28;
        return substr($string ,$from);
    }

    public function detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
