<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product_Join extends Model
{
    protected $table = 'product_size_color_brand';
    use HasFactory;
    public function addProduct($dataInsertJoin)
    {
        return DB::table($this->table)->insert($dataInsertJoin);
    }
}
