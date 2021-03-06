<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\Sales;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class CashController extends Controller
{
    protected $item;
    protected $sales;
    protected $customer;

    public function __construct(Item $item, Sales $sales, Customer $customer){
        $this->middleware('auth');
        $this->item = $item;
        $this->sales = $sales;
        $this->customer = $customer;
    }

    public function index()
    {
        $items = $this->item::where('valid', 1)->orderBy('price', 'asc')->get();
        return view('cash.index')->with(compact('items'));

    }

    public function store(Request $request)
    {
        $this->customer->fill([
            'sex' => $request->sex,
            'age' => $request->age
        ]);
        $this->customer->save();

        $customer_id = $this->customer->id;

        foreach ($request->count as $key => $count){
            if(0 === intval($count)){
                continue;
            }
            $sales = new Sales;
            $sales->fill([
                'customer_id' => $customer_id,
                'register' => \Auth::user()->id,
                'item_id' => $key,
                'price' => $request->price[$key] ,
                'count' => $count,
                'tax_rate' => $request->tax,
            ]);
            $sales->save();
        }
        return redirect()->to('/cash')->with('my_status', __('お会計が完了しました'));

    }

    public function edit(){
        $sales = $this->sales->orderBy('created_at', 'desc')->get();
        return view('cash.edit')->with(compact('sales'));
    }

    public function destroy($id)
    {
        $sales = $this->sales->find($id);
        $sales->delete();

        return redirect()->to('/cash/edit');
    }
}
