<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    protected $table = 'payment';
    use HasFactory;
    public function add($data)
    {
        return DB::table($this->table)->insertGetId($data);
    }
    function getAllPayment()
    {
        $payments = DB::table($this->table)
            ->select('payment.*')
            ->get();
        return $payments;
    }
    function getPaymentById($id)
    {
        $payment = DB::table($this->table)
            ->select('payment.*', 'detail_payment.*', 'product.name', 'product_detail.*', 'color.value as color', 'size.value as size', 'detail_payment.quantity as quantity')
            ->join('detail_payment', 'payment.id', '=', 'detail_payment.paymentID')
            ->join('product_detail', 'detail_payment.productdetailID', '=', 'product_detail.id')
            ->join('product', 'product_detail.productId', '=', 'product.id')
            ->join('size', 'product_detail.sizeID', '=', 'size.id')
            ->join('color', 'product_detail.colorID', '=', 'color.id')
            ->where('payment.id', '=', $id)
            ->get();
        // dd($payment);
        return $payment;
    }
    function updatePayment($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    function getTotalAmount()
    {
        $totalSalesAmount = DB::table($this->table)
            ->where('paid', 1)
            ->sum('total_amount');
        return $totalSalesAmount;
    }

    function profitFollowMonth()
    {
        $currentYear = Carbon::now()->year;

        $profits = [];

        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = Carbon::create($currentYear, $month, 1)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $totalImportAmount = DB::table('import')
                ->whereBetween('createAt', [$startOfMonth, $endOfMonth])
                ->sum('total_amount');

            $totalSalesAmount = DB::table('payment')
                ->where('paid', 1)
                ->whereBetween('create_at', [$startOfMonth, $endOfMonth])
                ->sum('total_amount');

            $profit = $totalSalesAmount - $totalImportAmount;

            $profits[$month] = $profit;
        }

        return $profit;
    }
}
