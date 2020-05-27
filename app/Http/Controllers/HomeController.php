<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard')  ->with('posts_count', Post::all()->count())
                                        ->with('categories_count',Category::all()->count())
                                        ->with('trashed_count', Post::onlyTrashed()->get()->count())
                                        ->with('users_count', User::all()->count());
                                
    }
}
