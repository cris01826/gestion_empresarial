<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Countries;
use App\Models\Cities;
use App\Models\Departments;
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

    public function createUser(Request $request){

        $newUser = new User;
        $newUser->name = $request->get('name');
        $newUser->last_name = $request->get('last_name');
        $newUser->dni = $request->get('dni');
        $newUser->address = $request->get('address');
        $newUser->phone = $request->get('phone');
        $newUser->id_country = $request->get('country');
        $newUser->id_department = $request->get('department');
        $newUser->id_city = $request->get('city');
        $newUser->save();

        $country = Countries::all();
        $department = Departments::where('id_country',$request->get('country'))
                      ->get();
        $city = Cities::where('id_department',$request->get('department'))
                        ->get();
        return response()->json( ["user"=> $newUser,"country"=> $country,"department"=>$department,"city"=>$city]);
    }

    public function updateUser(Request $request){
        $user = User::findOrFail($request->get('id'));
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->dni = $request->get('dni');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->id_country = $request->get('country');
        $user->id_department = $request->get('department');
        $user->id_city = $request->get('city');
        $user->save();
        return response()->json( ["user"=> $user]);
    }
    public function findUser(Request $request){
        $id = $request->get('id');
        $user = User::where('id',$id)
                ->get();
        $country = Countries::all();
        $department = Departments::where('id_country',$user[0]->id_country)
                      ->get();
        $city = Cities::where('id_department',$user[0]->id_city)
                ->get();
        return response()->json( ["user"=> $user[0],"country"=> $country,"department"=>$department,"city"=>$city]);
    }

    public function deleteUser(Request $request){
        $user = User::findOrFail($request->get('id'));
        $user->delete();
        return response()->json( ["user"=> $user]);
    }
}
