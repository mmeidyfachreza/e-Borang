<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'alamat', 'no_hp', 'no_identitas', 'tgl_lahir', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
    if (is_array($roles)) {
        return $this->hasAnyRole($roles) || 
                abort(401, 'This action is unauthorized.');
    }
    return $this->hasRole($roles) || 
            abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function scopeSearch($query,$nama,$email,$no_hp)
    {
        $split = preg_split('/\s+/', $nama, -1, PREG_SPLIT_NO_EMPTY);
        
        return $query
        ->where(function ($q) use ($split) {
            foreach ($split as $value) {
              $q->orWhere('name', 'like', "%{$value}%");
            }
        })
        ->where('email', $email)
        ->where('no_hp', $no_hp)
        ->orWhere('no_hp', $no_hp)
        ->orWhere(function ($q) use ($split) {
            foreach ($split as $value) {
              $q->orWhere('name', 'like', "%{$value}%");
            }
        })
        ->orWhere('email', $email);
   
        //return $query->where('email','banawa');
    }
}
