<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id');
            $table->boolean('activated')->default('false');
            $table->rememberToken();
	        $table->timestamps();
	        $table->foreign('role_id')
	              ->references('id')
	              ->on('roles')
	              ->onDelete('cascade');
        });
	    DB::table('users')->insert([
		    'email' => env('USER_INITIAL_EMAIL'),
		    'password' =>  bcrypt(env('USER_INITIAL_PASSWORD')),
		    'role_id' => 1,
		    'activated' => true,
		    'created_at' => 'now()',
		    'updated_at' => 'now()'
	    ]);
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
