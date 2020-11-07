@extends('layouts.common')
@section('title','トップ')
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
    <div class="col-md-12">
      <h2 class="mt-3">宣言一覧</h2>
      @if (session('err_msg'))
      <p class="text-danger">{{ session('err_msg') }}</p>
      @endif
      <table class="table mt-3">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">ニックネーム</th>
            <th scope="col">現在の体重</th>
            <th scope="col">目標体重</th>
            <th scope="col">日付</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td> <a href="/post/{{ $post->id }}">{{ $post->name }}</a></td>
            <td>{{ $post->weight }}kg</td>
            <td>{{ $post->target_weight }}kg</td>
            <td>{{ $post->updated_at }}</td>
            <td><button type="button" class="btn btn-primary" onclick="location.href='/post/edit/{{ $post->id }}'">編集</button></td>

            <form method="POST" action="{{ route('delete',$post->id) }}" onSubmit="return checkDelete()">
              @csrf
              <td><button type="submit" class="btn btn-danger" onclick=>削除 </button> </td>
            </form>
          </tr>
        </tbody> @endforeach
      </table>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container -->

@endif

<script>
  function checkDelete() {
    if (window.confirm('削除してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection