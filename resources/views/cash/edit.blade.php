@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="page-header">販売一覧</h3>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>名称</th>
                <th>価格</th>
                <th>個数</th>
                <th>作成日時</th>
                <th>更新日時</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{{ App\Item::find($sale->item_id)->name }}}</td>
                    <td>{{{ $sale->price }}}</td>
                    <td>{{{ $sale->count}}}</td>
                    <td>{{{ $sale->created_at }}}</td>
                    <td>{{{ $sale->updated_at }}}</td>
                    <td>
                        <a href="/cash/destroy/{{{ $sale->id }}}" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> 削除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

<style>

</style>