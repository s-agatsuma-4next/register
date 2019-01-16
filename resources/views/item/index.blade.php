@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="page-header">商品一覧</h3>
        <div class="mb-2">
            <a href="/item/create" class="btn btn-primary"><i class="fas fa-plus"></i> 新規登録</a>
        </div>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>名称</th>
                <th>価格</th>
                <th>原価</th>
                <th>販売中</th>
                <th>作成日時</th>
                <th>更新日時</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{{ $item->name }}}</td>
                    <td>{{{ $item->price }}}</td>
                    <td>{{{ $item->cost }}}</td>
                    <td>{{{ $item->valid ? '〇' : ''}}}</td>
                    <td>{{{ $item->created_at }}}</td>
                    <td>{{{ $item->updated_at }}}</td>
                    <td>
                        <a href="/item/edit/{{{ $item->id }}}" class="btn btn-success btn-xs"><i class="fas fa-edit"></i> 編集</a>
                        <a href="/item/destroy/{{{ $item->id }}}" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> 削除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

<style>

    </style>