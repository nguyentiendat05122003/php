<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail_Import extends Model
{
    use HasFactory;
    protected $table = 'detail_import';
    public function getAll()
    {
        $import = DB::table($this->table)
            ->orderBy('name', 'ASC')
            ->get();
        return $import;
    }
    public function add($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function updateDetailImport($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteDetailImport($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
