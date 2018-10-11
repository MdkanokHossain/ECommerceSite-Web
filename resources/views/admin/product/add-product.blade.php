@extends('admin.master')

@section('title')
    Product Info
@endsection

@section('body')

    <br/>

    <div class="row">

        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel-heading text-center font-weight-bold"
                 style="font-family:cursive; text-transform:uppercase; background-color:orange;color: white ">
                Product Add Form
            </div>

            <div class="panel" style="margin-top: 20px;">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <h2 class="text-center text-danger" style="font-family: cursive">{{Session::get('msg')}}</h2>


                        <form action="{{route('save-product')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Category Name</label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                    <select name="category_id" class="form-control">
                                        <option>---Select Category Name---</option>
                                        @foreach( $categories as  $category)
                                        <option value="{{ $category->id}}">{{ $category->category_name}}</option>
                                            @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Brand Name</label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                    <select name="brand_id" class="form-control">
                                        <option>---Select Brand Name---</option>
                                        @foreach( $brands as  $brand)
                                            <option value="{{ $brand->id}}">{{ $brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Product Name</label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                    <input type="text" name="product_name" class="form-control">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Product Price</label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                    <input type="number" name="product_price" class="form-control">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Product Quantity</label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                    <input type="number" name="product_quantity" class="form-control">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Product Skew</label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                    <input type="number" name="product_skew" class="form-control">
                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 40px"> Product Short Description </label>
                                <div class="col-md-9 " style="margin-top: 20px">
                                    <textarea name=" product_short_description" class="form-control" rows="3"
                                              style="resize: vertical"></textarea>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 40px"> Product Long Description </label>
                                <div class="col-md-9 " style="margin-top: 20px">
                                    <textarea name=" product_long_description" class="form-control" id="editor" rows="3"
                                              style="resize: vertical"></textarea>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Product Image </label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                  <input type="file" name="product_image" accept="image/*">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 " style="margin-top: 10px"> Publication Status</label>
                                <div class="col-md-9 " style="margin-top: 10px">
                                    <input type="radio" name="publication_status" value="1">Published
                                    <input type="radio" name="publication_status" value="0">Unpublished
                                </div>

                            </div>


                            <div class="form-group">

                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" name="btn" class="btn btn-block btn-primary "
                                           value="Save Product Info">

                                </div>

                            </div>

                        </form>

                    </div>


                </div>

            </div>
        </div>

    </div>


@endsection