<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // table
    protected $table = "customer";

    // fields
    protected $fillable = ["sex", "age"];
}
