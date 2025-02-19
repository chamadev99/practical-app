<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Delivery extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'deliveries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        "pickup_address",
        "pickup_name",
        "pickup_contact_no",
        "delivery_address",
        "delivery_name",
        "delivery_contact_no",
        "type_of_goods",
        "deliver_provider",
        "priority",
        "shipment_pickup_date",
        "shipment_pickup_time",
        "description",
        "length",
        "height",
        "width",
        "weight",
        "status",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->status = "pending";
        });
    }
}
