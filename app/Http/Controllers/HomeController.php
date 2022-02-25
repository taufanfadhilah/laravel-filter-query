<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        // filter by name
        $users->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->name.'%');
        });

        // filter by min age
        $users->when($request->age, function ($query) use ($request) {
            return $query->where('age', '>=', $request->age);
        });

        // filter by gender
        $users->when($request->gender, function ($query) use ($request) {
            return $query->whereGender($request->gender);
        });
        
        return view('welcome', ['users' => $users->paginate(10)]);
    }
}
