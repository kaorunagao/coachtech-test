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
    $title = 'お問い合わせ- 検索';
    @endphp
    
    @extends('layout')

    @section('content')
        <h2 class="mt-2 mb-5">管理システム</h2>
        <div class="container">

            <form method="GET" action="{{route('search')}}">
                @csrf
                    <label for="form-search">お名前</label>
                    <input type="search" name="q" id="form-search">
                    <button type="submit">検索</button>
                    <input type="reset" name="reset" value="リセット" >
            </form>
            <p><font color=dcdcdc>例)山田 太郎(名字もしく名前のみでも検索可)</font></p>

            <form method="GET" action="{{route('search')}}">
                @csrf
                    <label for="form-search">メールアドレス</label>
                    <input type="search" name="q" id="form-search">
                    <button type="submit">検索</button>
                    <input type="reset" name="reset" value="リセット" >
            </form>
            <p><font color=dcdcdc>例)test@example.com(一部分でも検索可)</font></p>

            <form method="GET" action="{{route('search')}}">
                @csrf
                    <label for="form-search">性別</label>
                    <input type="search" name="q" id="form-search">
                    <button type="submit">検索</button>
                    <input type="reset" name="reset" value="リセット" >
            </form>
            <p><font color=dcdcdc>例)男性もしくは女性</font></p>

            <form method="GET" action="{{route('search')}}">
                @csrf
                <label for="form-search">登録日</label>
                <input type="date" name="from" placeholder="from_date">
                <span class="mx-3 text-grey">~</span>
                <input type="date" name="until" placeholder="until_date">
                <button type="submit">検索</button>
                <input type="reset" name="reset" value="リセット" >
            </form><br><br>
            {{ $inputs->links('pagination::bootstrap-4') }}
            <br>
            <table border="1" bordercolor="dcdcdc">
                <tr>
                    <th>ID</th>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>ご意見</th>
                </tr>
                @foreach($inputs as $input)
                <tr>
                    <td>{{$input->id}}</td>
                    <td>{{$input->fullname}}</td>
                    <td>{{$input->gender}}</td>
                    <td>{{$input->email}}</td>
                    <td>{{Str::limit($input->opinion,25,'...')}}
                    </td>
                    <td><th><a href="{{route('view',['id'=>$input->id])}}">詳細</a></th></td>
                    <td><form method="POST" action="{{route('destroy',['id'=>$input->id])}}">
                        @csrf
                        <button type="submit" style="background:dcdcdc;color:red;">削除</button>
                    </form></td>
                </tr>
                @endforeach
            </table>
        </div>
    @endsection
    </div>
</body>

</html>