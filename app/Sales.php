<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    // table
    protected $table = "sales";

    // fields
    protected $fillable = ["customer_id", "item_id", "count", "tax_rate", "register", "price"];
}
