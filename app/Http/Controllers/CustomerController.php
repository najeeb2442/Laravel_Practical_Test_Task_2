<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $highestSpentMoney = $this->maxPayment();
        $highestNumberOfOrders = $this->highestOrders();
        return view('welcome',[
            'highestSpentMoney'=> $highestSpentMoney,
            'highestNumberOfOrders'=> $highestNumberOfOrders,
        ]);
    }

    public function maxPayment()
    {
        // finding the customerNumber with highest sum of payments
        $customerNumber=DB::table('payments')->groupBy('customerNumber')
        ->selectRaw('sum(amount) as sum, customerNumber')
        ->get('sum','customerNumber')->sortBy('sum')->last()->customerNumber;

        // finding the record of customer with highest sum of payments
        $highestSpentMoney=DB::table('customers')->where('customerNumber',$customerNumber)->first();

        return $highestSpentMoney;

    }

    public function highestOrders() {

        // finding the customerNumber with highest number of orders
        $customerNumber=DB::table('orders')
        ->selectRaw('count(customerNumber) as numberOfOrders, customerNumber')
        ->groupBy('customerNumber')
        ->get('numberOfOrders','customerNumber')->sortBy('numberOfOrders')->last()->customerNumber;

        // finding the record of customer with highest number of orders
        $highestNumberOfOrders=DB::table('customers')->where('customerNumber',$customerNumber)->first();

        // dd($highestNumberOfOrders);
        return $highestNumberOfOrders;
    }

}
