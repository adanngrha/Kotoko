<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function ordered_product ()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function status ()
    {
        return $this->hasOne(Status::class);
    }

    public function courier ()
    {
        return $this->hasOne(Courier::class);
    }

    public function service ()
    {
        return $this->hasOne(Service::class);
    }
}
