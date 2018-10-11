@extends('admin.master')

@section('body')

        <div class="row" >
            <div class="col-md-8 col-md-offset-2">
            <div class="panel" style="margin-top: 50px;">
                <div class="panel panel-default">
                    <div class="panel-body" style="background-color:  #00ACEE">
                        <form action="" method="POST" class="form-horizontal">
                            <div class="form-group" >
                                <label class="col-md-3 " style="color: white" >Name</label>
                                <div class="col-md-9 ">
                                    <input type="text" name="name" class="form-control">

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
            </div>

        </div>


@endsection