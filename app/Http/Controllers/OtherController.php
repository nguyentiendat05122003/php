<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\TypeOfBrand;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    private $color;
    private $brand;
    private $typeBrand;
    private $category;
    private $size;
    public function __construct()
    {
        $this->color = new Color();
        $this->brand = new Brand();
        $this->typeBrand = new TypeOfBrand();
        $this->category = new Category();
        $this->size = new Size();
    }
    function index()
    {
        $allBrand = getAllBrands();
        return view('admin.otherInfo.index', compact('allBrand'));
    }
    function postAddBrand(Request $req)
    {
        $path = $req->file('logo')->store('products', 'public');
        $data = [
            'name' => $req->nameBrand,
            'logo' => $path,
            "desc" => $req->desc,
        ];

        $this->brand->addBrand($data);
        return redirect()->route('other.index')->with('msg', 'Add product success');
    }
    function postAddColor(Request $req)
    {
        $data = [
            'value' => $req->valueColor,
            "desc" => $req->desc,
        ];

        $this->color->addColor($data);
        return redirect()->route('other.index')->with('msg', 'Add product success');
    }

    function postAddTypeOfBrand(Request $req)
    {
        $data = [
            'name' => $req->nameBrand,
            "desc" => $req->desc,
            "brandID" => $req->brandID,
        ];

        $this->typeBrand->addTypeOfBrand($data);
        return redirect()->route('other.index')->with('msg', 'Add product success');
    }
    function postAddCategory(Request $req)
    {
        $data = [
            'name' => $req->nameCategory,
            "desc" => $req->desc,
        ];

        $this->category->addCategory($data);
        return redirect()->route('other.index')->with('msg', 'Add product success');
    }
    function postAddSize(Request $req)
    {
        $data = [
            'value' => $req->value,
            "desc" => $req->desc,
        ];
        $this->size->addSize($data);
        return redirect()->route('other.index')->with('msg', 'Add product success');
    }
}
