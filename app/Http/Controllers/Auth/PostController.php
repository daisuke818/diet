<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * フォーム画面を表示する
     */
    public function index()
    {
        return view('auth.drafts.new');
    }

    /**
     * 一覧画面を表示する
     * @return view
     */
    public function showTopPage()
    {
        $posts = Post::all();

        return view('top', ['posts' => $posts]);
    }

    /**
     * 詳細画面を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $post = Post::find($id);
        //フラッシュメッセージを表示する
        \Session::flash('err_msg', 'データがありません');
        //もし$postがnullだったら一覧画面を表示する
        if (is_null($post)) {
            return redirect(route('top'));
        }

        return view('auth.drafts.detail', ['post' => $post]);
    }
}
