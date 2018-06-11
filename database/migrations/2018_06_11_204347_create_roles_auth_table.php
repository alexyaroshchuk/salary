<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesAuthTable extends Migration
{
    public function up()
    {
	    Schema::connection('pgsqlAuth')->create('roles', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('display_name');
	    });
	    DB::connection('pgsqlAuth')->table('roles')->insert([
		    'name' => 'admin',
		    'display_name' => 'Администратор'
	    ]);
	    DB::connection('pgsqlAuth')->table('roles')->insert([
		    'name' => 'accountant',
		    'display_name' => 'Бухгалтер'
	    ]);
	    DB::connection('pgsqlAuth')->table('roles')->insert([
		    'name' => 'worker',
		    'display_name' => 'Сотрудник'
	    ]);
    }

    public function down()
    {
	    Schema::connection('pgsqlAuth')->dropIfExists('users');
	    Schema::connection('pgsqlAuth')->dropIfExists('roles');
    }

}
