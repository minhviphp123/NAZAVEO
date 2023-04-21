<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function isExistName($username): bool
    {
        if (User::where('name', $username)->exists()) {
            return true;
        }

        return false;
    }

    public function createUser($userInfo): void
    {
        $user = User::create([
            'name' => $userInfo['name'],
            'password' => $userInfo['password'],
            'role' => $userInfo['role'],
        ]);

        $user->save();
    }
}
