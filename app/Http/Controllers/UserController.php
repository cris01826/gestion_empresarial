<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->get('text');
        $users = User::where('name','LIKE','%'.$text.'%')
                ->orWhere('dni','LIKE','%'.$text.'%')
                ->orderBy('name','asc')
                ->paginate(8);
        return view('user', compact('users','text'));
    }
}
