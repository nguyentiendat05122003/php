<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $tableJoinProduct = 'product_size_color_brand';
    protected $tableDetailImage = 'detail_images';

    public function getAllProduct($filters = [], $keywords = null, $sortArr = [], $perPage = 3)
    {
        $products = DB::table($this->table)
            ->select('product.*')
            ->join('category', 'product.categoryID', '=', 'category.id')
            ->join('brand', 'product.brandID', '=', 'brand.id')
            ->join('type_brand', 'product.typeBrandID', '=', 'type_brand.id');
        $orderBy = 'product.name';
        $orderType = 'desc';
        if (!empty($sortBy) && is_array($sortArr)) {
            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        }
        $products = $products->orderBy($orderBy, $orderType);
        if (!empty($filters)) {
            $products = $products->where($filters);
        }
        if (!empty($keywords)) {
            $products = $products->where(function ($query) use ($keywords) {
                $query->orWhere('product.name', 'like', '%' . $keywords . '%');
                $query->orWhere('product.desc', 'like', '%' . $keywords . '%');
            });
        }
        if (!empty($perPage)) {
            $products = $products->paginate($perPage);
        } else {
            $products = $products->get();
        }
        return $products;
    }
    public function getAll()
    {
        $products =  DB::table($this->table)->where('active', '=', '1')->get();
        return $products;
    }
    public function addProduct($dataInsertProduct)
    {
        return DB::table($this->table)->insert($dataInsertProduct);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' where id = ?', [$id]);
    }

    public function updateProduct($dataInsertProduct, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($dataInsertProduct);
    }
    public function deleteProduct($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function getProducts($filters = [], $keywords = null, $perPage = 6)
    {
        $products = DB::table('product AS p')
            ->select(
                'p.id AS id',
                'p.name AS name',
                'p.thumb AS thumb',
                'br.name AS brand',
                DB::raw('MIN(pd.price) AS MinPrice'),
                DB::raw('MAX(pd.price) AS MaxPrice')
            )
            ->join('product_detail AS pd', 'p.id', '=', 'pd.productID')
            ->join('brand AS br', 'br.id', '=', 'p.brandID')
            ->groupBy('p.id', 'p.name')
            ->havingRaw('MinPrice = MIN(pd.price) AND MaxPrice = MAX(pd.price)');

        if (!empty($filters)) {
            $products = $products->where($filters);
        }

        if (!empty($keywords)) {
            $products = $products->where(function ($query) use ($keywords) {
                $query->orWhere('p.name', 'like', '%' . $keywords . '%');
                $query->orWhere('br.name', 'like', '%' . $keywords . '%');
            });
        }
        if (!empty($perPage)) {
            $products = $products->paginate($perPage);
        } else {
            $products = $products->get();
        }
        return $products;
    }

    public function getProductsById($id)
    {
        $results = DB::table('product AS p')
            ->select(
                'p.id AS id',
                'p.name AS name',
                'p.thumb AS thumb',
                'p.detail_images',
                'p.desc',
                DB::raw('MIN(pd.price) AS MinPrice'),
                DB::raw('MAX(pd.price) AS MaxPrice')
            )
            ->join('product_detail AS pd', 'p.id', '=', 'pd.productID')
            ->groupBy('p.id', 'p.name')
            ->where('p.id', '=', $id)
            ->get();
        // dd($results);
        return $results;
    }
}
