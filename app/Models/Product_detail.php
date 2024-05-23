<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product_detail extends Model
{
    use HasFactory;
    protected $table = 'product_detail';
    public function getAll($id)
    {
        $details = DB::table($this->table)
            ->select('product_detail.*', 'color.value as color', 'size.value as size', 'provider.name')
            ->join('product', 'product_detail.productID', '=', 'product.id')
            ->join('color', 'product_detail.colorID', '=', 'color.id')
            ->join('size', 'product_detail.sizeID', '=', 'size.id')
            ->join('provider', 'product_detail.providerID', '=', 'provider.id')
            ->where('productID', '=', $id)
            ->get();
        return $details;
    }
    function getSizeById($id)
    {
        $details = DB::table($this->table)
            ->select('size.id as id', 'size.value as size',)
            ->join('product', 'product_detail.productID', '=', 'product.id')
            ->join('color', 'product_detail.colorID', '=', 'color.id')
            ->join('size', 'product_detail.sizeID', '=', 'size.id')
            ->join('provider', 'product_detail.providerID', '=', 'provider.id')
            ->where('productID', '=', $id)
            ->distinct()->get(['size']);
        return $details;
    }
    function getColorById($id)
    {
        $details = DB::table($this->table)
            ->select('color.id as id', 'color.value as color',)
            ->join('product', 'product_detail.productID', '=', 'product.id')
            ->join('color', 'product_detail.colorID', '=', 'color.id')
            ->join('size', 'product_detail.sizeID', '=', 'size.id')
            ->join('provider', 'product_detail.providerID', '=', 'provider.id')
            ->where('productID', '=', $id)
            ->distinct()->get(['color']);
        return $details;
    }
    public function addProductDetail($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function updateProductDetail($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteProductDetail($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' where id = ?', [$id]);
    }
    public function getIdProductDetail($data)
    {
        $detailProductId = DB::table($this->table)
            ->where('productID', $data['productID'])
            ->where('sizeID', $data['sizeID'])
            ->where('colorID', $data['colorID'])
            ->value('id');
        return $detailProductId;
    }
}
