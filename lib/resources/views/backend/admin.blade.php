@extends('backend.master')
@section('title', "Admin")
@section('main')
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Add admin
                    </div>

                    <div class="panel-body">
                        @include('errors.note')
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                        @endif
                        <form method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Full name:</label>
                                <input required type="text" name="full_name" class="form-control" placeholder="Name" >
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input required type="email" name="email" class="form-control" placeholder="@gmail..." >
                            </div>
                             <div class="form-group">
                                <label>Password:</label>
                                <input required type="password" name="password" class="form-control" placeholder="" >
                            </div>
                            <div class="form-group">
                                <label>Confirm password:</label>
                                <input required type="password" name="re_password" class="form-control" placeholder="" >
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <input required type="tel" name="phone" class="form-control" placeholder="" >
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <input required type="text" name="address" class="form-control" placeholder="" >
                            </div>
                                
                                <div class="form-group">
                                    <input type="submit" name="submit" class="form-control btn btn-primary"  value="Add new ">
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>

            <div class="col-xs-12 col-md-7 col-lg-7">
                {{-- <div class="col-xs-12 col-md-12 col-lg-12"> --}}
                    <div class="panel panel-primary">
                        <div class="panel-heading">Admin list</div>

                        <div class="panel-body">
                            {{-- @include('errors.note') --}}
                            @if(Session::has('deletethanhcong'))
                            <div class="alert alert-info">{{Session::get('deletethanhcong')}}</div>
                            @endif
                            <div class="bootstrap-table">
                                <div class="table-responsive">
                                    {{-- <a href="{{asset('admin/category/add')}}" class="btn btn-primary">Add category</a> --}}
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>Full name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th >Tool</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($admin as $cate)
                                            {{-- expr --}}
                                            
                                            <tr>
                                                <td>{{$cate->full_name}}</td>
                                                <td>{{$cate->email}}</td>
                                                <td>{{$cate->phone}}</td>
                                                <td>{{$cate->address}}</td>
                                               
                                                <td>
                                                    <a href="{{asset('admin/admin/edit/'.$cate->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                                    <a href="{{asset('admin/admin/delete/'.$cate->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>


        </div><!--/.row-->
    </div>  <!--/.main-->

@stop