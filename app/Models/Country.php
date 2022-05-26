<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public static function countriesCollection(){
        $countries = array(
            1 => 'Bangladesh',
            2 => 'India',
            3 => 'Sri Lanka',
        );
        return $countries;
    }

    
}
