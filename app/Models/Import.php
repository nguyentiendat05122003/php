<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Import extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'import';
    public function getAll()
    {
        $import = DB::table($this->table)
            ->select('import.*', 'provider.name as providerName', 'users.name as userName')
            ->join('provider', 'import.providerId', '=', 'provider.id')
            ->join('users', 'import.userId', '=', 'users.id')
            ->get();
        return $import;
    }
    public function add($data)
    {
        return DB::table($this->table)->insertGetId($data);
    }
    public function updateImport($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteImport($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    function getTotalAmount()
    {
        $totalSalesAmount = DB::table($this->table)
            ->sum('total_amount');
        return $totalSalesAmount;
    }
}
