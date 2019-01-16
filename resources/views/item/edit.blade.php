@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <h3 class="page-header">商品編集</h3>
                <div class="card">

                    <div class="card-body">
                        <form name="form1" action="/item/update/{{ $item->id }}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label>名前</label>
                                <input type="text" name="name" value="{{ $item->name }}" required="required" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>価格</label>
                                <input type="number" name="price" value="{{ $item->price }}" required="required" class="form-control"/>

                            </div>

                            <div class="form-group">
                                <label>原価</label>
                                <input type="number" name="cost" value="{{ $item->cost }}" required="required" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary active">
                                        <input name="valid"  type="radio" autocomplete="off" value="1" {{{ $item->valid ? 'checked' : ''}}}> 販売中
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input name="valid"  type="radio" autocomplete="off" value="0" {{{ $item->valid ? '' : 'checked'}}}> 販売していない
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> 更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection