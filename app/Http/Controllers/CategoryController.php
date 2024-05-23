<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    function index()
    {
        return view('admin.category.index');
    }
    function add()
    {

        return view('admin.category.add');
    }
    function postAdd(Request $req)
    {
        $data = [
            'name' => $req->name,
            'desc' => $req->desc
        ];
        $this->category->addCategory($data);
        return redirect()->route('categories.index')->with('msg', 'Add category success');
    }
    function getEdit(Request $req, $id)
    {
        if (!empty($id)) {
            $productDetail = $this->category->getDetail($id);
            if (!empty($categoryDetail[0])) {
                $req->session()->put('id', $id);
                $categoryDetail = $categoryDetail[0];
            } else {
                return redirect()->route('categories.index')->with('msg', 'category not exist');
            }
        } else {
            return redirect()->route('categories.index')->with('msg', 'category not exist');
        }
        return view('admin.category.edit');
    }

    function postEdit(Request $req)
    {
        $id = session('id');
        $data = [
            'name' => $req->name,
            'desc' => $req->desc
        ];
        $this->category->updateCategory($data, $id);
    }
    public function delete($id)
    {
        if (!empty($id)) {
            $categoryDetail = $this->category->getDetail($id);
            if (!empty($categoryDetail[0])) {
                $deleteStatus = $this->category->deleteCategory($id);
                if ($deleteStatus) {
                    $msg = 'Delete success';
                } else {
                    $msg = 'Delete fail';
                }
            } else {
                $msg = 'category not exist';
            }
        } else {
            $msg = 'Lien ket ko ton tai';
        }
        return redirect()->route('categories.index')->with('msg', $msg);
    }
}
