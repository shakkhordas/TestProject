<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Country extends Model
{
    use HasFactory;
    
    // public function customer() {
    //     $this->hasMany(Customer::class, 'country_id');
    // }
}
