<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';
    public function users()
    {
    	return $this->hasMany(User::class);
	}
	
    public static function isAdmin()
    {
    	if($user = auth()->user())
	    {
	    	if($user->role->display_name === 'Администратор')
	    		return true;
	    }
	    else
	    {
	    	return false;
	    }
    }
	public static function isAccountant()
	{
		if($user = auth()->user())
		{
			if($user->role->display_name === 'Бухгалтер')
				return true;
		}
		else
		{
			return false;
		}
	}
	public static function isWorker()
	{
		if($user = auth()->user())
		{
			if($user->role->display_name === 'Сотрудник')
				return true;
		}
		else
		{
			return false;
		}
	}
}
