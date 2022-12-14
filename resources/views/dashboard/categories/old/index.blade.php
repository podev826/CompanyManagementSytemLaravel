@section('title')
List Category
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Categories</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button  class="btn btn-primary-rgba" data-toggle="modal" data-target="#createNewCategory"><i class="feather icon-plus mr-2"></i>Add New</button>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="default-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Arabic Name</th>
                                    <th>Parent Name</th>
                                    <!--<th>Actions</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($cuttings) > 0)
                                @foreach($cuttings as $key => $cut)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $cut->name }}</td>
                                        <td>{{ $cut->name_ar }}</td>
                                        <td>{{ category_parent($cut->parent) }}</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="#" class="btn btn-success-rgba cut-edit" data-cut="{{$cut}}" data-toggle="modal" data-target="#editCategory"><i class="feather icon-edit-2"></i></a>
                                                <a href="{{ url('dashboard/delete_category/'.$cut->id) }}" class="btn btn-danger-rgba" onclick="return confirm('Are you sure???')"><i class="feather icon-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>



@include('dashboard.categories.createModule')
@include('dashboard.categories.editModule')

<!-- End Contentbar -->
@endsection

@include('dashboard.categories.script')
