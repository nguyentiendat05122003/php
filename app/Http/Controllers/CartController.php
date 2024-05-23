<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }
    function getAll()
    {
        // return $this->cart->getAll();
    }
    function addToCart($data)
    {
        return $this->cart->addToCart($data);
    }
    function updateToCart($data, $id)
    {
        return $this->cart->updateToCart($data, $id);
    }
    function deleteCart($id)
    {
        return $this->cart->deleteCart($id);
    }
    function countCart($userId)
    {
        return $this->cart->count_cart($userId);
    }
}
