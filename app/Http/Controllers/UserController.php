<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()->paginate(5);

        return view('user.index', [
            'users' => $users
        ]);
    }
}
