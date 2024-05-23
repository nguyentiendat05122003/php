<?php

namespace App\Http\Controllers;

use App\Models\Detail_Import;
use App\Models\Import;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImportController extends Controller
{
    private $import;
    private $detail_import;
    function index()
    {
        $list = session('list');
        return view('admin.import.index', compact('list'));
    }
    public function __construct()
    {
        $this->import = new Import();
        $this->detail_import = new Detail_Import();
    }
    function add()
    {
        $allProduct = getAllProduct();
        $allBrand = getAllBrands();
        $allCategory = getAllCategories();
        $allColor = getAllColors();
        $allProvider = getAllProvider();
        $allSize = getAllSize();
        return view('admin.import.add', compact('allProduct', 'allBrand', 'allCategory', 'allColor', 'allProvider', 'allSize'));
    }
    function postAdd(Request $req)
    {
        $total = $req->price * $req->quantity;
        $userId = Auth::user()->id;
        $productId = $req->productId;
        $list = session()->get('list');
        if (!$list) {
            $item = [
                (object)$req->all()
            ];
            session()->put('list', $item);
        } else {
            $newItem =
                (object)$req->all();
            session()->push('list', $newItem);
        }
        return redirect()->route('import.index');
    }
    function delete($id)
    {
        $newList =  [];
        $lists = session('list');
        foreach ($lists as $key => $list) {
            if ($key != $id) {
                $newList[] = $list;
            }
        }
        session()->put('list', $newList);
        return redirect()->route('import.index');
    }
    function view()
    {
        $listImport = $this->import->getAll();
        return view('admin.import.view', compact('listImport'));
    }
    function save(Request $req)
    {
        $list = session('list');
        $userId = Auth::user()->id;
        $total_amount = 0;
        $providerId = $list[0]->providerId;
        foreach ($list as $item) {
            $total_amount += $item->quantity * $item->price;
        }
        $dataInsertImport = [
            'total_amount' => $total_amount,
            'createAt' => Carbon::now(),
            'providerId' => $providerId,
            'userId' => $userId
        ];
        $newImportId = $this->import->add($dataInsertImport);
        foreach ($list as $item) {
            $dataInsertDetailImport = [
                'quantity' => $item->quantity,
                'price' => $item->price,
                'productID' => $item->productId,
                'importID' => $newImportId,
                'colorID' => $item->colorID,
                'sizeID' => $item->sizeID,
            ];
            $this->detail_import->add($dataInsertDetailImport);
        };
        session()->forget('list');
        return redirect()->route('import.view')->with('msg', 'import invoice add success');
    }
}
