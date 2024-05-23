<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    private $provider;
    public function __construct()
    {
        $this->provider = new Provider();
    }
    function index()
    {
        $providers = $this->provider->getAll();
        return view('admin.provider.index', compact('providers'));
    }
    function add()
    {

        return view('admin.provider.add');
    }
    function postAdd(Request $req)
    {
        $data = [
            'name' => $req->name,
            'address' => $req->address,
            'phone' => $req->phone,
            'email' => $req->email,
        ];
        $this->provider->add($data);
        return redirect()->route('provider.index')->with('msg', 'Add provider success');
    }
    public function delete($id)
    {
        if (!empty($id)) {
            $providerDetail = $this->provider->getDetail($id);
            if (!empty($providerDetail[0])) {
                $deleteStatus = $this->provider->deleteProvider($id);
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
        return redirect()->route('provider.index')->with('msg', $msg);
    }
}
