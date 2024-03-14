<?php

namespace App\Http\Controllers;
use \App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){

        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user){

        $user->is_admin = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso amministratore l\'utente scelto');
    }

    public function setRevisor(User $user){

        $user->is_revisor = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso revisore l\'utente scelto');
    }

    public function setWriter(User $user){

        $user->is_write = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso redattore l\'utente scelto');
    }
}
