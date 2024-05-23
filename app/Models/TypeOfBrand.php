<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeOfBrand extends Model
{
    use HasFactory;
    protected $table = 'type_brand';
    public function getTypeBrand($id)
    {
        return DB::table($this->table)->where('brandID', $id)->get();
    }
    public function addTypeOfBrand($data)
    {
        return DB::table($this->table)->insert($data);
    }
}
