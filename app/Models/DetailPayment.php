<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailPayment extends Model
{
    use HasFactory;
    protected $table = 'detail_payment';
    public function add($data)
    {
        return DB::table($this->table)->insert($data);
    }
}
