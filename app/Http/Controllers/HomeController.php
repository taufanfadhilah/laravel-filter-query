<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::search($request->input('search'));

        // filter by gender
        $users->when($request->gender, function ($query) use ($request) {
            return $query->whereGender($request->gender);
        });
        
        return view('welcome', ['users' => $users->paginate(10)]);
    }
}
