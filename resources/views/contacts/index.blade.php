<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    @php
    $title = 'お問い合わせ';
    @endphp
    
    @extends('layout')

    @section('content')
        <h1 class="text-center mt-2 mb-5">お問い合わせ</h1>
        <div class="container">
            {!! Form::open(['route' => 'confirm', 'method' => 'POST']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お名前<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::text('fullname', null, ['class' => 'form-control']) }}
                    </div>
                    <p><font color=dcdcdc>例)山田 太郎</font></p>
                </div>
                @if ($errors->has('fullname'))
                <p class="alert alert-danger">{{ $errors->first('fullname') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">性別<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        <input type="radio" name="gender" value="男性" checked="checked">男性
                        <input type="radio" name="gender" value="女性">女性
                    </div>
                </div>
                @if ($errors->has('gender'))
                <p class="alert alert-danger">{{ $errors->first('gender') }}</p>
                @endif
                
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>
                    <p><font color=dcdcdc>例)test@example.com</font></p>
                </div>
                @if ($errors->has('email'))
                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">郵便番号<span class="badge badge-danger ml-1">必須</p>
                    <div class="col-sm-8">
                        {{ Form::text('postcode', null, ['class' => 'form-control']) }}
                    </div>
                    <p><font color=dcdcdc>例)123-4567(半角、ﾊｲﾌﾝ)</font></p>
                </div>
                @if ($errors->has('postcode'))
                <p class="alert alert-danger">{{ $errors->first('postcode') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">住所<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::text('address', null, ['class' => 'form-control']) }}
                    </div>
                    <p><font color=dcdcdc>例)東京都渋谷区千駄ヶ谷1-2-3</font></p>
                </div>
                @if ($errors->has('address'))
                <p class="alert alert-danger">{{ $errors->first('address') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">建物名</p>
                    <div class="col-sm-8">
                        {{ Form::text('building_name', null, ['class' => 'form-control']) }}
                    </div>
                    <p><font color=dcdcdc>例)千駄ヶ谷マンション101</font></p>
                </div>
                @if ($errors->has('building_name'))
                <p class="alert alert-danger">{{ $errors->first('building_name') }}</p>
                @endif
                
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">ご意見<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::textarea('opinion', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('opinion'))
                <p class="alert alert-danger">{{ $errors->first('opinion') }}</p>
                @endif
                <div class="text-center">
                    {{ Form::submit('確認', ['class' => 'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    @endsection
    </div>
</body>

</html>