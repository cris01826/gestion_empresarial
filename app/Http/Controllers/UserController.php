<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Countries;
use App\Models\User_Workstation;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->get('text');
        $users = User::where('name','LIKE','%'.$text.'%')
                ->orWhere('dni','LIKE','%'.$text.'%')
                ->orderBy('name','asc')
                ->paginate(5);
        $cargos = User_Workstation::all();
        $paises = Countries::all();
        return view('user', compact('users','text','cargos','paises'));
    }
}
