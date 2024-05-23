<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Color extends Model
{
    use HasFactory;
    protected $table = 'color';
    public function getAll()
    {
        $colors = DB::table($this->table)
            ->orderBy('value', 'ASC')
            ->get();
        return $colors;
    }
    public function addColor($data)
    {
        return DB::table($this->table)->insert($data);
    }
}
