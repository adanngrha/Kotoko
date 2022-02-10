<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function courier ()
    {
        return $this->belongsTo(Courier::class);
    }

    public function order ()
    {
        return $this->belongsToMany(Order::class);
    }
}
