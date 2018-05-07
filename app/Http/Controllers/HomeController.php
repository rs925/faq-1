<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $questions = $user->questions()->paginate(6);
        return view('home')->with('questions', $questions);
    }

    public function administrator(Request $req)
    {

        return view('middleware2')->withMessage("administrator");
    }

    public function moderator(Request $req)
    {

        return view('middleware1')->withMessage("moderator");
    }
    public function member(Request $req)
    {

        return view('middleware')->withMessage("member");
    }
}
