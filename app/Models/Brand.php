<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';
    public function getAll()
    {
        $brands = DB::table($this->table)
            ->orderBy('name', 'ASC')
            ->get();
        return $brands;
    }
    public function addBrand($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function getBrandsWithTypes()
    {
        $brands = DB::table('brand as b')
            ->leftJoin('type_brand as tb', 'b.id', '=', 'tb.brandID')
            ->select('b.id as brand_id', 'b.name as brand_name', 'tb.id as type_id', 'tb.name as type_name')
            ->get()
            ->groupBy('brand_id');

        return $brands;
    }
}
