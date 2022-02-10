<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order ()
    {
        return $this->belongsToMany(Order::class);
    }

    public function service ()
    {
        return $this->hasMany(Service::class);
    }
}
