@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12  ">
            <div class="panel" style="margin-top: 100px;">
                <div class="panel panel-default">

                    <div class="panel-heading text-center"
                         style="text-transform:uppercase; background-color:#1b6d85;color: white ">
                        Product View Table
                    </div>

                    <div class="panel-body">

                        <h3 class="text-center text-danger" id="msgRmv">{{Session::get('msg')}}</h3>

                        <table class="table table-bordered text-center">


                            <tr>
                                <th class="text-center">Sl No</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product Price</th>
                                <th class="text-center">Product Quantity</th>
                                <th class="text-center">Product Description</th>
                                <th class="text-center">Action</th>
                            </tr>

                            @php($i=0)

                            @foreach( $products as $product)

                                <tr>
                                    <td>{{$i++ }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>{{ $product->product_description }}</td>
                                    <td>
                                        <a href="{{route('edit-product',['id'=>$product->id])}}"
                                           class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{route('delete-product',['id'=>$product->id])}}"
                                           class="btn btn-danger btn-xs"
                                           onclick="return confirm('Are you sure delete this ???')">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                        </table>


                    </div>


                    <div class="panel-footer " style="  background-color:#1b6d85; ">
                        <a href="{{route('add-product')}}" class="btn " style="color: white;  border-style:  solid; border-color:#1ffafd">Add Product</a>
                        <a href="{{route('view-product')}}" class="btn pull-right" style="color: white;  border-style:  solid; border-color:#1ffafd">View Product</a>
                    </div>

                </div>

            </div>
        </div>

    </div>


@endsection