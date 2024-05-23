<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\DetailPayment;
use App\Models\Import;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Product_detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{
    private $product;
    private $brand;
    private $cart;
    private $payment;
    private $detail_payment;
    private $product_detail;
    private $import;
    private $user;
    const _PER_PAGE = 6;
    public function __construct()
    {
        $this->product = new Product();
        $this->brand = new Brand();
        $this->cart = new Cart();
        $this->payment = new Payment();
        $this->detail_payment = new DetailPayment();
        $this->product_detail = new Product_detail();
        $this->import = new Import();
        $this->user = new User();
    }
    function dashboard()
    {
        $totalAmountInPayment = $this->payment->getTotalAmount();
        $totalAmountInImport = $this->import->getTotalAmount();
        $profit = $totalAmountInPayment - $totalAmountInImport;
        $profitFollowMonth = $this->payment->profitFollowMonth();
        $users = $this->user->countUser();
        return view('admin.dashboard', compact('totalAmountInPayment', 'totalAmountInImport', 'profit', 'users'));
    }
    function home(Request $req)
    {
        $count_cart = 0;
        if (Auth::check()) {
            $userId = Auth::user()->id;
            if ($userId) {
                $count_cart = $this->cart->count_cart($userId);
            }
        }
        $allBrand = getAllBrands();
        $productList = $this->product->getProducts();
        return view('public.index', compact('allBrand', 'productList', 'count_cart'));
    }
    function search(Request $req)
    {
        $keywords = $req->keywords;
        $productList = $this->product->getProducts(keywords: $keywords);
        return view('public.search', compact('productList'));
    }
    function shop(Request $req)
    {
        $filters = [];
        $allBrand = getAllBrands();
        $allCategory = getAllCategories();
        if (!empty($req->categoryID)) {
            $categoryID = $req->categoryID;
            $filters[] = ['p.categoryID', '=', $categoryID];
        }
        if (!empty($req->brandID)) {
            $brandID = $req->brandID;
            $filters[] = ['p.brandID', '=', $brandID];
        }
        if (!empty($req->brandID)) {
            $brandID = $req->brandID;
            $filters[] = ['p.brandID', '=', $brandID];
        }

        $price = $req->price;
        if (!empty($price)) {
            if ($price == 1) {
                $filters[] = ['pd.price', '<=', 100000];
            } else if ($price == 2) {
                $filters[] = ['pd.price', '>', 100000];
                $filters[] = ['pd.price', '<=', 1000000];
            } else if ($price == 3) {
                $filters[] = ['pd.price', '>', 1000000];
            } else if ($price == "0") {
                $filters[] = [];
            }
        }
        $productList = $this->product->getProducts($filters);
        $brands = $this->brand->getBrandsWithTypes();
        return view('public.shop', compact('productList', 'allBrand', 'allCategory', 'brands'));
    }
    function productDetail(Request $request, $id)
    {
        if (!empty($id)) {
            $productDetail = $this->product->getProductsById($id);
            if (!empty($productDetail[0])) {
                $request->session()->put('idInCart', $id);
                $productDetail = $productDetail[0];
            } else {
                return redirect()->route('products.index')->with('msg', 'product not exist');
            }
        } else {
            return redirect()->route('products.index')->with('msg', 'product not exist');
        }
        $detailImage = json_decode($productDetail->detail_images);
        $newDetailImages = [];
        $idImage = 1;
        foreach ($detailImage as $image) {
            $newDetailImage = [
                'id' => $idImage,
                'image' => $image
            ];
            $newDetailImages[] = (object) $newDetailImage;
            $idImage++;
        }
        $listSizes = $this->product_detail->getSizeById($id);
        $listColors = $this->product_detail->getColorById($id);
        return view('public.productDetail', compact('productDetail', 'newDetailImages', 'listSizes', 'listColors'));
    }
    function contact()
    {
        return view('public.contact');
    }
    function cart()
    {
        $userId = Auth::user()->id;
        $carts = $this->cart->getAll($userId);
        $totalPrice = 0;

        foreach ($carts as $item) {
            $subtotal = $item->quantity * $item->price;
            $totalPrice += $subtotal;
        }
        return view('clients.cart', compact('carts', 'totalPrice'));
    }
    function checkout()
    {
        $userId = Auth::user()->id;
        $carts = $this->cart->getAll($userId);
        $total = 0;
        foreach ($carts as $item) {
            $total += $item->price * $item->quantity;
        }
        return view('clients.checkout', compact('carts', 'total'));
    }
    function payment(Request $req)
    {
        $userId = Auth::user()->id;
        $dataInsertToPayment = [
            "firstName" => $req->firstName,
            "lastName" => $req->lastName,
            "email" => $req->email,
            "address" => $req->address,
            "country" => $req->country,
            "city" => $req->city,
            "total_amount" => $req->total_amount,
            "create_at" => Carbon::now(),
            "phone" => $req->phone,
            "desc" => $req->desc,
            "userID" => $userId
        ];
        $carts = $this->cart->getAll($userId);
        $payment = $this->payment->add($dataInsertToPayment);
        foreach ($carts as $value) {
            $data = [
                'productID' => $value->productID,
                'sizeID' => $value->sizeID,
                'colorID' => $value->colorID,
            ];
            $idProductDetail = $this->product_detail->getIdProductDetail($data);
            $newValue = [
                "quantity" => $value->quantity,
                "paymentID" => $value->paymentID = $payment,
                "productDetailID" => $idProductDetail,
            ];
            $this->detail_payment->add($newValue);
        }
        $this->cart->deleteCartByUserId($userId);
        return redirect()->route('shop')->with('msg', 'Add product success');
    }
    function addToCart(Request $request)
    {
        // dd($request);
        $validated = $request->validate(
            [
                'size' => 'required',
                'color' => 'required',
            ],
            [
                'size.required' => 'Vui lòng chọn size giày',
                'color.required' => 'Vui lòng chọn màu giày ',
            ]
        );

        $id = session('idInCart');
        $userId = Auth::user()->id;
        $quantity = $request->quantity;
        $size = $request->size;
        $color = $request->color;
        $data = [
            'userID' => $userId,
            'productID' => $id,
            'quantity' => $quantity,
            'sizeID' => $size,
            'colorID' => $color,
        ];
        //check quantity in stock > quantity in order
        $checkQuantity =  $this->cart->checkQuantityProduct($data);
        if (!$checkQuantity) {
            return redirect()->route('productDetail', ['id' => $id])->with('msg', 'Số lượng không đủ cho loại hàng này');
        }
        $check = $this->cart->checkProduct($data);
        if ($check) {
            $this->cart->incrementQuantityInDetail($data);
        } else {
            $price = $this->cart->getPriceOfProduct($data);
            $data['price'] = $price;
            $this->cart->addToCart($data);
        }
        return redirect()->route('clients.cart')->with('msg', 'Thêm sản phẩm thành công');
    }
    function deleteCart($id)
    {
        $this->cart->deleteCart($id);
        return redirect()->route('clients.cart')->with('msg', 'Delete product success');
    }
    function incrementQuantity($id)
    {
        $this->cart->incrementQuantity($id);
        return redirect()->route('clients.cart');
    }
    function decrementQuantity($id)
    {
        $this->cart->decrementQuantity($id);
        return redirect()->route('clients.cart');
    }
}
