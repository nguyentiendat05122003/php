<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Size extends Model
{
    use HasFactory;
    protected $table = 'size';
    public function getAll()
    {
        $categories = DB::table($this->table)
            ->orderBy('value', 'ASC')
            ->get();
        return $categories;
    }
    public function addSize($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function updateSize($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteSize($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' where id = ?', [$id]);
    }
}
