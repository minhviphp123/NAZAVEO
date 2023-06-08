<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Category;
use App\Models\Menu;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'thumb', 'child_id'];

    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
