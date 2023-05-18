<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'description'];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function mice()
    {
        return $this->hasMany(Mouse::class);
    }

    public function keyboards()
    {
        return $this->hasMany(Keyboard::class);
    }
}
