<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お問い合わせ</title>
</head>

<body>
  <h3>詳細</h3>
  <div>
    ID：
    {{$input->id}}
  </div>

  <div>
    お名前：
    {{$input->fullname}}
  </div>

  <div>
    性別：
    {{$input->gender}}
  </div>

  <div>
    メールアドレス：
    {{$input->email}}
  </div>

  <div>
    ご意見：
    {{$input->opinion}}
  </div>
  <br>
  <a href="{{ route('show') }}">{{ __('戻る') }}</a>

</body>

</html>