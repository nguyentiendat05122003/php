<?php

namespace App\Http\Controllers;

use App\Models\TypeOfBrand;
use Illuminate\Http\Request;

class TypeOfBrandController extends Controller
{
    private $type_brand;

    public function __construct()
    {
        $this->type_brand = new TypeOfBrand();
    }
    public function getData($option)
    {
        $data = $this->type_brand->getTypeBrand($option);
        return response()->json($data);
    }
}
