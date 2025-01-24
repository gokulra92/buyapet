<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CustomerDetail extends Model
{
    protected $table = 'customer_details';

    protected $fillable = [
        'customer_id',
        'gender',
        'dob',
        'country',
        'state',
        'district',
        'subscribe_newsletter',
        'show_followers_count',
        'send_contact_detail_to_email'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function getDobAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
