<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mobile', 'email', 'address', 'dob', 'country_id', 'status', 'image_file'];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    // public function info() {
    //     return $this->belongsTo(Info::class, 'email');
    // }
    
}
