@extends('layouts.common')
@section('title', '編集フォーム')
@section('content')
<div class="container">

  <h3 class="mt-3">編集フォーム</h3>
  <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
    @csrf
    <input type="hidden" name="id" value="{{ $post->id }}">
    <table>
      <tr>
        <th>
          <label for="name" class="mt-4">ニックネーム</label>
        </th>
        <td>
          <input id="name" name="name" class="mt-3" value="{{ $post->name }}" type="text">
          <!-- エラーの存在チェック -->
          @if ($errors->has('name'))
          <div class="text-danger">
            {{$errors->first('name')}}
          </div>
          @endif
        </td>
      </tr>
      <tr>
        <th>
          <label for="weight" class="mt-4">現在の体重</label></th>
        <td>
          <input id="weight" name="weight" class="mt-3" value="{{ $post->weight }}" type="text">
          kg
          @if ($errors->has('weight'))
          <div class="text-danger">
            {{$errors->first('weight')}}
          </div>
          @endif
        </td>
      </tr>
      <tr>
        <th><label for="target_weight" class="mt-4">目標体重</label></th>
        <td>
          <input id="target_weight" name="target_weight" class="mt-3" value="{{ $post->target_weight }}" type="text"> <span>kg</span>
          @if ($errors->has('target_weight'))
          <div class="text-danger">
            {{$errors->first('target_weight')}}
          </div>
          @endif
        </td>
      </tr>
      <tr>
        <th><label for="content" class="mt-3">宣言</label></th>
        <td>
          <textarea id="content" name="content" class="mt-3" rows="4">{{ $post->content }}
          </textarea>
          @if ($errors->has('content'))
          <div class="text-danger">
            {{$errors->first('content')}}
          </div>
          @endif
        </td>
      </tr>
    </table>
    <a class="btn btn-secondary" href="/">
      キャンセル
    </a>
    <button type="submit" class="btn btn-primary">
      更新する
    </button>
  </form>
</div><!-- /.container -->

<script>
  function checkSubmit() {
    if (window.confirm('更新してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection