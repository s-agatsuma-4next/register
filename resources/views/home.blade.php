@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul class="list-group">
            <li class="list-group-item"><a href="/cash"><i class="fas fa-edit"></i> お会計</a></li>
            <li class="list-group-item"><a href="/item"><i class="fas fa-edit"></i> 商品登録</a></li>
            <li class="list-group-item"><a href="/cash"><i class="fas fa-edit"></i> データ修正</a></li>
            <li class="list-group-item"><a href="/cash"><i class="fas fa-edit"></i> データ検索</a></li>
        </ul>
    </div>
</div>
@endsection
