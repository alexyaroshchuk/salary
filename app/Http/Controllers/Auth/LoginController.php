<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
    
//     $user = DB::connection('pgsqlAuth')
//             ->select("select users.email, users.password, roles.id, roles.name 
//                       from users join roles on users.role_id = roles.id
//                       where email = '$email' AND password = '$pasHash' ");


// //
//         if($user)
//         {
//             config(['database.connections.pgsql.username' => $user[0]->name]);
//             switch ($user[0]->name)
//             {
//                 case 'chief_director':
//                     config(['database.connections.pgsql.password' => env('DB_ROLE_CHIEF_DIRECTOR_PASSWORD')]);
//                     break;
//                 case 'vice_director':
//                     config(['database.connections.pgsql.password' => env('DB_ROLE_VICE_DIRECTOR_PASSWORD')]);
//                     break;
//                 case 'chief_accountant':
//                     config(['database.connections.pgsql.password' => env('DB_ROLE_CHIEF_ACCOUNTANT_PASSWORD')]);
//                     break;
//                 case 'chief_agronomist':
//                     config(['database.connections.pgsql.password' => env('DB_ROLE_CHIEF_AGRONOMIST_PASSWORD')]);
//                     break;
//                 default:
//                     break;
//             }
//         }

//         DB::reconnect('pgsql');
// }
