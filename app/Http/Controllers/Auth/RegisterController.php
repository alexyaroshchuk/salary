<?php

namespace App\Http\Controllers\Auth;

use App\Workers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        Workers::create([
            'fullname' => $data['fullname'],
            'date_of_birth' => $data['date_of_birth'],
            'id_position' => $data['id_position'],
        ]);
        
        $email = $data['email'];
        $pwdHash =  bcrypt($data['password']);
        
        return User::create([
            'email' => $email,
            'password' => $pwdHash,
            'role_id' => 3
        ]);  
       
        config(['database.connections.pgsqlAuth.username' => env('DB_USERNAME')]);
        config(['database.connections.pgsqlAuth.password' => env('DB_PASSWORD')]);

        DB::connection('pgsqlAuth')
	      ->select("INSERT INTO users(email, password, role_id) VALUES ('$email','$pwdHash', 3)"); 
    }
}
