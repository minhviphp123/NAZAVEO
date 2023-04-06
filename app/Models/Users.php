<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAllUsers()
    {
        $users = DB::select('select * from users');

        return $users;
    }

    public function addUser($data)
    {
        DB::table('users')->insert([
            'name' => $data['name'],
            'password' => $data['password']
        ]);

        // return $users;
    }

    public function getDetail($id)
    {
        return DB::select('select * from ' . $this->table . ' where id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        // $data = array_merge($data, [$id]);
        return
            DB::table($this->table)
            ->where('id', $id)
            ->update([
                'name' => $data['name'],
            ]);
    }

    public function deleteUser($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
