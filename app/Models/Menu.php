<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'desc'];

    public function Menu()
    {
        return $this->hasMany(Products::class);
    }
}
