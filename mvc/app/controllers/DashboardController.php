<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Invoice;
class DashboardController extends BaseController{
    function home(){
        $product = Product::all();
        $user = User::all();
        $category = Category::all();
        $invoice = Invoice::all();
        return $this->render('dashboard.index',[
            'products'=>$product,
            'users'=>$user,
            'categories'=>$category,
            'invoices'=>$invoice
        ]);
    }
}
