<?php

namespace App\Http\Controllers\Auth;

use App\Workers;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [ 
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {

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
        return User::create([
            'email' => $email,
            'password' => $pwdHash,
            'role_id' => 3
        ]);  
        
    }
}
