<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Product_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $product;
    private $product_detail;
    const _PER_PAGE = 3;
    public function __construct()
    {
        $this->product = new Product();
        $this->product_detail = new Product_detail();
    }
    function index(Request $req)
    {
        $allBrand = getAllBrands();
        $allCategory = getAllCategories();
        $allColor = getAllColors();
        $filters = [];
        $keywords = null;
        if (!empty($req->Status)) {
            $status = $req->Status;
            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['product.active', '=', $status];
        }

        if (!empty($req->categoryID)) {
            $categoryID = $req->categoryID;
            $filters[] = ['product.categoryID', '=', $categoryID];
        }

        if (!empty($req->brandID)) {
            $brandID = $req->brandID;
            $filters[] = ['product.brandID', '=', $brandID];
        }

        if (!empty($req->keywords)) {
            $keywords = $req->keywords;
        }

        $sortBy = $req->input('sort-by');
        $sortType = $req->input('sort-type');
        $allowSort = ['asc', 'desc'];
        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType = 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }
        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType
        ];
        $productList = $this->product->getAllProduct($filters, $keywords, $sortArr = [], self::_PER_PAGE);
        return view('admin.products.index', compact('productList', 'allBrand', 'allCategory', 'allColor'));
    }

    function add()
    {
        $allBrand = getAllBrands();
        $allCategory = getAllCategories();
        $allColor = getAllColors();
        $allSize = getAllSize();
        return view('admin.products.add', compact('allBrand', 'allCategory', 'allColor', 'allSize'));
    }

    function getEdit(Request $request, $id)
    {
        if (!empty($id)) {
            $productDetail = $this->product->getDetail($id);
            if (!empty($productDetail[0])) {
                $request->session()->put('id', $id);
                $productDetail = $productDetail[0];
            } else {
                return redirect()->route('products.index')->with('msg', 'product not exist');
            }
        } else {
            return redirect()->route('products.index')->with('msg', 'product not exist');
        }
        $allBrand = getAllBrands();
        $allCategory = getAllCategories();
        $allColor = getAllColors();
        $allSize = getAllSize();
        $allProvider = getAllProvider();
        $listDetail = $this->product_detail->getAll($id);
        $detailImage = json_decode($productDetail->detail_images);
        return view('admin.products.edit', compact('productDetail', 'allCategory', 'allColor', 'allBrand', 'detailImage', 'allSize', 'allProvider', 'listDetail'));
    }

    function postAdd(ProductRequest $req)
    {
        $images = array();
        if ($files = $req->file('images')) {
            foreach ($files as $file) {
                $path = $file->store('products', 'public');
                $images[] = $path;
            }
        }
        $path = $req->file('thumb')->store('products', 'public');
        $newImage = json_encode($images);
        $dataInsertProduct = [
            'name' => $req->name,
            'thumb' => $path,
            "desc" => $req->desc,
            "active" => $req->status,
            "detail_images" => $newImage,
            "brandID" => $req->brandID,
            "typeBrandID" => $req->typeBrandID,
            "categoryID" => $req->categoryID,
        ];
        $this->product->addProduct($dataInsertProduct);
        return redirect()->route('products.index')->with('msg', 'Add product success');
    }

    public function postEdit(Request $req)
    {
        $id = session('id');
        $productDetail = $this->product->getDetail($id)[0];
        if ($req->file('images')) {
            $images = array();
            if ($files = $req->file('images')) {
                foreach ($files as $file) {
                    $path = $file->store('products', 'public');
                    $images[] = $path;
                }
            }
        } else {
            $images = $productDetail->detail_images;
        }
        if ($req->file('thumb')) {
            $path = $req->file('thumb')->store('products', 'public');
        } else {
            $path = $productDetail->thumb;
        }
        $dataInsertProduct = [
            'name' => $req->name,
            'thumb' => $path,
            "desc" => $req->desc,
            "active" => $req->status,
            "detail_images" => $images,
            "brandID" => $req->brandID,
            "typeBrandID" => $req->typeBrandID,
            "categoryID" => $req->categoryID,
        ];
        $this->product->updateProduct($dataInsertProduct, $id);
        return redirect()->route('products.edit', ['id' => $id])->with('msg', 'Update product success');
    }
    public function delete($id)
    {
        if (!empty($id)) {
            $productDetail = $this->product->getDetail($id);
            if (!empty($productDetail[0])) {
                $deleteStatus = $this->product->deleteProduct($id);
                if ($deleteStatus) {
                    $msg = 'Delete success';
                } else {
                    $msg = 'Delete fail';
                }
            } else {
                $msg = 'product not exist';
            }
        } else {
            $msg = 'Lien ket ko ton tai';
        }
        return redirect()->route('products.index')->with('msg', $msg);
    }
    function addDetail(Request $req)
    {
        $id = session('id');
        $data = [
            'price' => $req->price,
            'quantity' => $req->quantity,
            'colorID' => $req->colorID,
            'providerID' => $req->providerID,
            'sizeID' => $req->sizeID,
            'productID' => $id
        ];
        $this->product_detail->addProductDetail($data);
        return redirect()->route('products.edit', ['id' => $id])->with('msg', 'Update product success');
    }
    function getEditDetail(Request $request, $id)
    {
        if (!empty($id)) {
            $productDetail = $this->product_detail->getDetail($id);
            if (!empty($productDetail[0])) {
                $request->session()->put('idDetail', $id);
                $productDetail = $productDetail[0];
            } else {
                return redirect()->route('products.index')->with('msg', 'product not exist');
            }
        } else {
            return redirect()->route('products.index')->with('msg', 'product not exist');
        }
        $allBrand = getAllBrands();
        $allCategory = getAllCategories();
        $allColor = getAllColors();
        $allSize = getAllSize();
        $allProvider = getAllProvider();
        return view('admin.products.editDetail', compact('productDetail', 'allColor', 'allSize', 'allProvider', 'id'));
    }
    function postEditDetail(Request $request, $id)
    {
        $data = [
            'colorID' => $request->colorID,
            'sizeID' => $request->sizeID,
            'providerID' => $request->providerID,
            'price' => $request->price,
        ];
        $this->product_detail->updateProductDetail($data, $id);
        return redirect()->route('products.index')->with('msg', 'edit detail product success');
    }
}
