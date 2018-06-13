<?php

namespace App\Http\Controllers;   

use Illuminate\Http\Request;
use App\Workers;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class UsersController extends Controller
{   
    use RegistersUsers;
    
    protected $redirectTo = '/home';

    public function addUser(){
        return view('addUser');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function createUser(Request $request)
    {
        $data = $request->all();

        $name = $data['name'];
        $email = $data['email'];
        $pwdHash =  bcrypt($data['password']);
        config(['database.connections.pgsqlAuth.username' => env('DB_USERNAME')]);
        config(['database.connections.pgsqlAuth.password' => env('DB_PASSWORD')]);

        DB::connection('pgsqlAuth')->table('users')->insert([
                'email' => $email,
                'password' => $pwdHash,
                'role_id' => 3
        ]);
        Workers::create([
            'fullname' => $data['fullname'],
            'date_of_birth' => $data['date_of_birth'],
            'id_position' => $data['id_position'],
        ]);
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $pwdHash,
            'role_id' => 3
        ]);  

        return redirect('/addUser')->with('message', 'Сотрудник добавлен');;
    }

    public function refreshUser(){
        return view('refreshUser');
    }

    public function updateUser(Request $request) {

        if(Role::isWorker() || Role::isAccountant())
	    {
		    session()->flash(
			    'messageError', 'Not enough privileges'
		    );
		    return back()->withErrors([
			    'message' => 'Non enough privileges'
		    ]);
        }
        
        // $data = $request->all();

        // $name = $data['name'];
        // $email = $data['email'];
        // $pwdHash =  bcrypt($data['password']);
        // $role = $data['role_id'];

        // Workers::where('id_worker', $id_worker)->update([
        //     'fullname' => $data['fullname'],
        //     'date_of_birth' => $data['date_of_birth'],
        //     'id_position' => $data['id_position'],
        // ]);
        // User::where('id', $id)update([
        //     'name' => $name,
        //     'email' => $email,
        //     'password' => $pwdHash,
        //     'role_id' => $role
        // ]);  

        return redirect('/refreshUser')->with('message', 'Сотрудник изменен');;
    }  
}
