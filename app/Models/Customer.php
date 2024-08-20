<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'customers';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'is_ph_verified', 'is_email_verified', 
        'is_active', 'remember_token', 'auth_token', 'token_expires_at', 'is_deleted', 'deleted_by'
    ];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function customerDetail()
    {
        return $this->hasOne(CustomerDetail::class, 'customer_id', 'id');
    }

    public function petShops()
    {
        return $this->hasMany(PetShop::class, 'customer_id', 'id');
    }

    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    public function getState()
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }

    public function getDistrict()
    {
        return $this->belongsTo(District::class, 'district', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
