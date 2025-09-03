<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'products'; // your existing table
    public $timestamps = false;    // if your table doesn’t have created_at, updated_at


}


