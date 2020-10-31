@extends('layouts.common')
@section('content')

@if(!Auth::check())
<div id="login-wrapper" class="row">
  <div class="col-7">
    <h1 class="text-white"><b>Hello Hackers！</b></h1>
    <p class="text-white">調味料管理アプリは冷蔵庫で食材を腐らせないように記録するアプリです。<br>今日買った食材を書いて忘れないようにしましょう！<br>
      ユーザー登録が面倒な方はこちらでもログインできます。<br><br>
      ユーザー名：test <br><br>
      メールアドレス：test@test.com <br><br>
      パスワード：12345678 <br>
    </p>
  </div>
  <div class="col-5">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <table>
        <tr>
          <th>ユーザ名</th>
          <td><input type="text" class="form-control" placeholder="test" size="50" value="{{ old('email') }}" name="username" required autofocus></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><input type="email" class="form-control" placeholder="test@test.com" size="50" name="email" required></td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td><input type="password" class="form-control" name="password" required size="50"></td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" value="ログイン" class="form-control"></td>
        </tr>
      </table>
    </form>
  </div>
</div>
@else
@endif

@endsection