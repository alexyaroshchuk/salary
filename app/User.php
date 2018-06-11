<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
	public $timestamps = true;

    protected $table = 'users';

    protected $fillable = ['email', 'password', 'role_id', 'activated'];

    protected $hidden = ['password', 'remember_token'];
	public function worker()
	{
		return $this->hasOne(Workers::class, 'id');
	}
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
