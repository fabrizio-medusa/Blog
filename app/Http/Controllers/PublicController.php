<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerRequestMail;



class PublicController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except('homepage');
    }
        

    public function homepage () {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(4);

        return view('welcome', compact('articles'));
    }

    public function careers() {
        return view('careers');
    }

    public function careersSubmit(Request $request) {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));

        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;

            case 'revisor':
                $user->is_revisor = NULL;
                break;

            case 'writer':
                $user->is_writer = NULL;
                break; 
        }

        $user->update();

        return redirect(route('careers'))->with('success', 'Grazie per averci contattato');

    }

}
