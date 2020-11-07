<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

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

    /**
     * 宣言を登録する
     */
    public function exeStore(PostRequest $request)
    {
        //宣言のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //宣言の登録
            Post::create($inputs);
            //登録に成功したらコミットする
            \DB::commit();
        } catch (\Throwable $e) {
            //登録が失敗したらエラーページを表示する
            \DB::rollback();
            abort(500);
        }


        \Session::flash('err_msg', '宣言を登録しました');

        return redirect(route('top'));
    }

    /**
     * 宣言編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $post = Post::find($id);
        //フラッシュメッセージを表示する
        \Session::flash('err_msg', 'データがありません');
        //もし$postがnullだったら一覧画面を表示する
        if (is_null($post)) {
            return redirect(route('top'));
        }

        return view('auth.drafts.Edit', ['post' => $post]);
    }

    /**
     * 宣言を更新する
     */
    public function exeUpdate(PostRequest $request)
    {
        //宣言のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //どの宣言か見つける
            $post = Post::find($inputs['id']);
            //塗り潰す
            $post->fill([
                'name' => $inputs['name'],
                'weight' => $inputs['weight'],
                'target_weight' => $inputs['target_weight'],
                'content' => $inputs['content'],
            ]);
            //更新する
            $post->save();
            //登録に成功したらコミットする
            \DB::commit();
        } catch (\Throwable $e) {
            //登録が失敗したらエラーページを表示する
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '宣言を更新しました');

        return redirect(route('top'));
    }

    /**
     * 宣言削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        //$idが空の場合この中身の処理を実行する
        if (empty($id)) {
            //フラッシュメッセージを表示する
            \Session::flash('err_msg', 'データがありません');

            return redirect(route('top'));
        }
        try {
            // 宣言の削除
            Post::destroy($id);
        } catch (\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('top'));
    }
}
