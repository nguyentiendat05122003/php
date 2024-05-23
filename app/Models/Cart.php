<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table = 'cart';
    use HasFactory;
    public function getAll($id)
    {
        $carts = DB::table($this->table)
            ->select('product.name', 'product.thumb', 'cart.*', 'size.value as size', 'color.value as color')
            ->join('product', 'cart.productID', '=', 'product.id')
            ->join('size', 'cart.sizeID', '=', 'size.id')
            ->join('color', 'cart.colorID', '=', 'color.id')
            ->where('userID', '=', $id);

        $cart = $carts->get();
        return $cart;
    }
    public function addToCart($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function incrementQuantityInDetail($data)
    {
        $userId = $data['userID'];
        $productId = $data['productID'];
        $sizeId = $data['sizeID'];
        $colorId = $data['colorID'];

        $cartItem = DB::table($this->table)
            ->where('userID', $userId)
            ->where('productID', $productId)
            ->where('sizeID', $sizeId)
            ->where('colorID', $colorId)
            ->increment('quantity', $data['quantity']);
    }
    public function decrementQuantity($id)
    {
        return DB::table($this->table)->where('id', $id)->decrement('quantity', 1);
    }
    public function incrementQuantity($id)
    {
        return DB::table($this->table)->where('id', $id)->increment('quantity', 1);
    }
    public function deleteCart($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function deleteCartByUserId($userId)
    {
        return DB::table($this->table)->where('userId', $userId)->delete();
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' where id = ?', [$id]);
    }
    public function count_cart($userId)
    {
        return DB::select('SELECT count(*) FROM ' . $this->table . ' where userID = ?', [$userId]);
    }
    public function checkQuantityProduct($data)
    {
        $productExists = DB::table('product_detail')
            ->where('productID', $data['productID'])
            ->where('quantity', '>=', $data['quantity'])
            ->where('sizeID', $data['sizeID'])
            ->where('colorID', $data['colorID'])
            ->exists();
        if ($productExists) {
            return true;
        } else {
            return false;
        }
    }
    public function checkProduct($data)
    {
        $productExists = DB::table($this->table)
            ->where('productID', $data['productID'])
            ->where('sizeID', $data['sizeID'])
            ->where('colorID', $data['colorID'])
            ->exists();
        if ($productExists) {
            return true;
        } else {
            return false;
        }
    }
    public function getPriceOfProduct($data)
    {
        $product = DB::table('product_detail')
            ->select('price')
            ->where('productID', $data['productID'])
            ->where('quantity', '>=', $data['quantity'])
            ->where('sizeID', $data['sizeID'])
            ->where('colorID', $data['colorID'])
            ->first();
        if ($product) {
            $price = $product->price;
            return $price;
        } else {
            return;
        }
    }
}
