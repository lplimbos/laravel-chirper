<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $user = User::find($id);

        $chirps = $user->chirps()->get();

        return view('home', ['chirps' => $chirps]);
    }
}
