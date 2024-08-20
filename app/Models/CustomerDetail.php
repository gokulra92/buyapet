<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CustomerDetail extends Model
{
    protected $table = 'customer_details';

    protected $fillable = [
        'customer_id', 'profile_picture', 'reference_key', 'gender', 'dob', 'subscribe_newsletter',
        'show_followers_count', 'send_contact_detail_to_email', 'default_search_range',
        'country', 'state', 'district'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture
            ? Storage::disk('public')->url($this->profile_picture)
            : null;
    }
}
