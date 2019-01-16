<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // table
    protected $table = "item";

    // fields
    protected $fillable = ["name", "price", "cost", "valid"];
}
