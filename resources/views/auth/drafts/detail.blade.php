@extends('layouts.common')
@section('title','詳細画面')
@section('content')

@if(!Auth::check())
<div id="login-wrapper" class="row">
  <div class="col-7">
    <h1 class="text-white"><b>そうだ！ ダイエットしよう！ </b></h1>
    <p class="text-white">ダイエット宣言アプリは自分の現在の体重と目標体重を宣言して記録するアプリです。<br>目標を宣言してモチベーションを上げましょう！<br>
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
<div class="container">
  <div class="row">
    <div class="col-12 mt-3">
      <h2>{{ $post->name }}</h2>
      <span>宣言日：{{ $post->created_at }}</span>
      <span>更新日：{{ $post->updated_at }}</span>
      <p class="mt-3">{{ $post->content }}</p>
    </div><!-- /.col-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->
@endif
@endsection