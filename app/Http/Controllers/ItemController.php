<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    protected $item;

    public function __construct(Item $item){
        $this->middleware('auth');
        $this->item = $item;
    }

    /**
     * Display a listing of the resource.
     * 一覧
     * @return Response
     */
    public function index()
    {
        $items = $this->item->all();
        return view('item.index')->with(compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * 新規作成
     * @return Response
     */
    public function create()
    {
        // 新規登録画面を表示
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     * 新規登録
     * @return Response
     */
    public function store(Request $request)
    {
        // パラメータを取得して保存
        $data = $request->all();
        $this->item->fill($data);
        $this->item->save();

        // 一覧画面へ遷移
        return redirect()->to('/item');
    }

    /**
     * Show the form for editing the specified resource.
     * 編集
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->item->find($id);

        return view('item.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     * 更新
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $item = $this->item->find($id);
        $data = $request->all();
        $item->fill($data);
        $item->save();

        return redirect()->to('/item');
    }

    /**
     * Remove the specified resource from storage.
     * 削除
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->item->find($id);
        $item->delete();

        return redirect()->to('/item');
    }
}
