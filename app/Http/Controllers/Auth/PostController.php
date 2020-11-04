<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('auth.drafts.new');
    }

    // public function postArticle(Request $request)
    // {
    //     $request->validate([
    //         'weight' => 'required|unique:posts|max:10',
    //         'percentage' => 'max:10',
    //         'content' => 'max:255',
    //     ]);
    // }

    public function showTopPage()
    {
        $posts = Post::all();

        // dd($Posts);

        return view('top', ['posts' => $posts]);
    }
}
