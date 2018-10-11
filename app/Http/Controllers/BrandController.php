<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{


    public function addBrand(){

        return view('admin.brand.add-brand');
    }

    public function saveBrand( Request $request){

        $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;

        $brand->save();

        return redirect('/brand-add')->with('msg', 'Brand Info Save Successfully !!!');
    }

    public function manageBrand(){

        $brands = Brand::all();

        return view('admin.brand.manage-brand', ['brands'=> $brands]);
    }


    public function editBrand($id){

        $brand = Brand::find($id);

        return view('admin.brand.edit-brand', ['brand'=>$brand]);
    }

    public function updateBrand(Request $request){

        $brand = Brand::find($request->brand_id);

        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;

        $brand->save();

        return redirect('brand-manage')->with('msg','Brand Update Successfully !!!');


    }

    public function deleteBrand($id){

        $brand = Brand::find($id);
        $brand->delete();

        return redirect('brand-manage')->with('msg','Brand Delete Info Successfully !!!');

    }





}
