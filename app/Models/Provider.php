<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Provider extends Model
{
    use HasFactory;
    protected $table = 'provider';
    public function getAll()
    {
        $providers = DB::table($this->table)
            ->orderBy('name', 'ASC')
            ->get();
        return $providers;
    }
    public function add($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function updateProvider($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteProvider($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' where id = ?', [$id]);
    }
}
