<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\Sales;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    protected $item;
    protected $sales;
    protected $customer;

    public function __construct(Item $item, Sales $sales, Customer $customer){
        //$this->middleware('auth');
        $this->item = $item;
        $this->sales = $sales;
        $this->customer = $customer;
    }

    public function daily($date)
    {
        $sales = $this->sales->select(
                \DB::raw('item_id, sum(price * count) AS total_price, sum(count) as total_count'
                ))
            ->where(\DB::raw('DATE(created_at)'), $date)
            ->groupBy('item_id')
            ->orderBy('total_price', 'desc')
            ->get();

        return view('search.daily')->with(compact('sales', 'date'));
    }
}
