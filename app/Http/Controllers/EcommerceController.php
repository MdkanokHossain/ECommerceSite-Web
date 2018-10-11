<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{


    public function index(){
        $products = Product::where('publication_status', 1)
                            ->orderBy('id', 'desc')
//                            ->skip(11)
                            ->take(6)
                            ->get();
//        return $products;
        $categories = Category::where('publication_status', 1)->get();
        return view('front-end.home.home', [
                'products'      =>  $products,
                'categories'    =>  $categories
        ]);

    }

    public function aboutUs(){

        return view('front-end.about.about-us');
    }

    public function categoryProduct($id){
        $products = Product::where('category_id', $id)
                            ->where('publication_status', 1)
                            ->get();
        $categories = Category::where('publication_status', 1)->get();
        return view('front-end.category.category-product', [
            'products'      =>  $products,
            'categories'    =>  $categories
        ]);

    }

public function productDetails($id) {
        $product = Product::find($id);
        return view('front-end.product.product-details', ['product'    =>  $product]);
}








    public function contactUs(){

        return view('front-end.contact.contact-us');
    }





}
