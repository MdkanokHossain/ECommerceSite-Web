<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{


    public function addProduct()
    {

        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view('admin.product.add-product', [

            'categories' => $categories,
            'brands' => $brands,

        ]);
    }

    protected function productImageUpload($request)
    {
        $productImage = $request->file('product_image');
        $imageFileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name . '.' . $imageFileType;
        $directory = 'product-images/';
        $imageUrl = $directory . $imageName;

        $productImage->move($directory, $imageName);

        return $imageUrl;
    }

    protected function productBasicInfo($request, $imageUrl)
    {

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_skew = $request->product_skew;
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;

        $product->save();


    }


    public function saveProduct(Request $request)
    {

        $imageUrl = $this->productImageUpload($request);

        $this->productBasicInfo($request, $imageUrl);

        return redirect('product-add')->with('msg', 'Product Info Save Succesfully !! ');

    }


    public function manageProduct()
    {

//        $users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();
//

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();


        return view('admin.product.manage-product', ['products' => $products]);
    }

    public function editProduct($id)
    {

        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        $product = Product::find($id);

        return view('admin.product.edit-product', [

            'categories' => $categories,
            'brands' => $brands,
            'product' => $product
        ]);

    }

    protected function updateProductBasicInfo($product, $request, $imageUrl)
    {

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_skew = $request->product_skew;
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_image=$imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();

    }


    public function updateProduct(Request $request)
    {
        $product = Product::find($request->product_id);

        $productImage = $request->file('product_image');
        if ($productImage) {
            unlink($product->product_image);
            $imageUrl = $this->productImageUpload($request);
        } else {
            $imageUrl = $product->product_image;
        }

        $this->updateProductBasicInfo($product, $request, $imageUrl);

        return redirect('/product-manage')->with('msg', 'Product info update successfully');
//
//        $imageUrl = $this->productImageUpload($request);
//
//        $product = Product::find($request->product_id);
//
//        $this->updateProductBasicInfo($product, $request, $imageUrl);
//
//
//        return redirect('/product-manage')->with('msg', 'Product Info Update Succesfully !! ');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/product-manage')->with('msg', 'Product Info Delete Succesfully !! ');
    }

}
