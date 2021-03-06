@extends('layouts.app')

@section('content')
    <form name="form1" action="/cash/store" method="post" id="submit">
        {{-- フラッシュ・メッセージ --}}
        @if (session('my_status'))
            <div class="container mt-2" id="msg-success">
                <div class="alert alert-success">
                    {{ session('my_status') }}
                </div>
            </div>
        @endif
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" id="epson_ip_address" value="<?php echo config('epson.ip_address'); ?>">
        <input type="hidden" id="epson_ip_port" value="<?php echo config('epson.port'); ?>">
        <input type="hidden" id="epson_device_id" value="<?php echo config('epson.device_id'); ?>">
        <div class="container body">
            <div class="mb-4">
                <h3 class="page-header">お客様情報</h3>
                <div class="form-group ">
                    <div class="btn-group btn-group-toggle mr-2" data-toggle="buttons">
                        <label class="btn btn-outline-primary active">
                            <input name="sex" type="radio" autocomplete="off" value="F" checked> 女性
                        </label>
                        <label class="btn btn-outline-primary">
                            <input name="sex" type="radio" autocomplete="off" value="M"> 男性
                        </label>
                    </div>
                    <div class="btn-group btn-group-toggle " data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input name="age" type="radio" autocomplete="off" value="10"> 10代
                        </label>
                        <label class="btn btn-outline-success">
                            <input name="age" type="radio" autocomplete="off" value="20"> 20代
                        </label>
                        <label class="btn btn-outline-success">
                            <input name="age" type="radio" autocomplete="off" value="30"> 30代
                        </label>
                        <label class="btn btn-outline-success active">
                            <input name="age" type="radio" autocomplete="off" value="40" checked> 40代
                        </label>
                        <label class="btn btn-outline-success">
                            <input name="age" type="radio" autocomplete="off" value="50"> 50代
                        </label>
                        <label class="btn btn-outline-success">
                            <input name="age" type="radio" autocomplete="off" value="60"> 60代
                        </label>
                        <label class="btn btn-outline-success">
                            <input name="age" type="radio" autocomplete="off" value="70"> 70代
                        </label>
                    </div>
                </div>
            </div>
            <h3 class="page-header">お買い上げ</h3>
            <table class="table table-striped table-hover table-sm table-fixed">
                <thead>
                <tr>
                    <th style="width:30%;">名称</th>
                    <th style="width:50%;">価格</th>
                    <th style="width:20%;">個数</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{{ $item->name }}}</td>
                        <td>
                            <input type="number" name="price[{{{ $item->id }}}]" value="{{{ $item->price * (100 + config('cash.tax')) / 100 }}}" data-id="{{{ $item->id }}}" required="required" style="width:150px;" class="form-control"/>
                        </td>
                        <td>
                            <input type="number" name="count[{{{ $item->id }}}]" value="0" data-id="{{{ $item->id }}}" required="required" style="width:100px;" class="form-control"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <footer class="fixed-bottom">
                <div class="container">
                    <div class="d-flex mt-2">
                        <div class="form-group col-md-2">
                            <label>消費税（%）</label>
                            <input type="number" name="tax" value="<?php echo config('cash.tax'); ?>" required="required" class="form-control" readonly/>
                        </div>
                        <div class="form-group  col-md-2">
                            <label>お会計</label>
                            <input type="number" name="total_price" value="" required="required" class="form-control" readonly/>
                        </div>
                        <div class="form-group col-md-2">
                            <label>お預かり</label>
                            <input type="number" name="acceptance" value="" required="required" class="form-control"/>
                        </div>
                        <div class="form-group col-md-2">
                            <label>おつり</label>
                            <input type="number" name="change" value="" required="required" class="form-control" readonly/>
                        </div>
                        <div class="form-group align-self-end">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-cash-register"></i> お会計</button>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </form>
<style>
    .body {
        height: auto;
        padding: 0 0 85px 0;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        var ePosDev = new epson.ePOSDevice();
        connect();
        /**
         * レシートプリンタとコネクション確立
         */
        function connect() {
            var ipAddress = $('#epson_ip_address').val();
            var port = $('#epson_ip_port').val();

            alert(2);
            ePosDev.connect(ipAddress, port, callback_connect);
        }

        /**
         * TODO デバイス購入後に実装する
         */
        function callback_connect(resultConnect){
            // 現状エラータイムアウトが返る
            alert(resultConnect);
        }

        /**
         * 価格計算
         */
        $('input[name^="count"],input[name^="price"]').change(function () {
            var total_price = 0;

            $('input[name^="count"]').each(function () {
                total_price += $(this).val() * $('input[name="price[' + $(this).data('id') + ']"]').val();
            });

            $('input[name="total_price"]').val(total_price);
        });

        $('input[name="acceptance"]').change(function () {
            $('input[name="change"]').val($(this).val() - $('input[name="total_price"]').val());
        });

        $('#submit').submit(function () {
            return confirm("お会計を実行します");
        });

        if($('#msg-success').length){
            setTimeout(function(){
                $('#msg-success').fadeOut('fast').queue(function() {
                    this.remove();
                });
            }, 5000);
        }
    });
</script>
@endsection