@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="page-header">売り上げ一覧</h3>
        <div class="d-flex mt-2">
            <div class="form-group col-md-2">
                <input type="date" name="date" id="date" value="{{{ $date  }}}" required="required" class="form-control" />

            </div>
            <div>
                <button class="btn btn-primary"><i class="fas fa-search"></i> 検索</button>
            </div>
        </div>


        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>名称</th>
                <th>個数</th>
                <th>売り上げ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($sales as $sale)
                <tr>
                    <td>{{{ App\Item::find($sale->item_id)->name }}}</td>
                    <td>{{{ $sale->total_count }}}</td>
                    <td>{{{ $sale->total_price }}}</td>
                </tr>
                @php
                    $total = $total + $sale->total_price;
                @endphp
            @endforeach
            <tr>
                <td>合計</td>
                <td></td>
                <td>{{{ $total }}}</td>
            </tr>
            </tbody>
        </table>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('button').click(function() {
            location.href = "/search/daily/" + $('#date').val();
        })

    });
</script>

@endsection
