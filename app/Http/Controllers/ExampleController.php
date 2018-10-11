<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function index(){
        return view('front-end.home.home');

    }

    public function about(){

        return view('front-end.about.about');
    }

    public function product1(){

        return view('front-end.product.product1');
    }
    public function product2(){

        return view('front-end.product.product2');
    }


    public function faqs(){


        return view('front-end.faq.faqs');
    }

    public function icons(){

        return view('front-end.web-icon.web-icons');
    }

    public function typography(){

        return view('front-end.web-icon.typography');
    }



    public function contactUs(){

        return view('front-end.contact.contact-us');
    }
}
