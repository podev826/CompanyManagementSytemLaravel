@section('title')
{{__('Systems/SystemTwo/permissiongroups.permissiongroups_edit')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemTwo/permissiongroups.edit_permissiongroup')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('permissiongroups.index')}}">{{__('Systems/SystemTwo/permissiongroups.permissiongroups')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/permissiongroups.edit_permissiongroup')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('permissiongroups.index') }}" >{{__('Systems/SystemTwo/permissiongroups.back')}}</a>
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
            <form method="post" action="{{ url('dashboard/edit-permissiongroup') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="permissiongroup_id" value="{{ $permissiongroup->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/permissiongroups.name')}}</label>
                                <input type="text" placeholder="name" class="form-control" @if(isset($permissiongroup->name)) value="{{ $permissiongroup->name }}"@endif name="name" required="">
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/permissiongroups.ar_name')}}</label>
                                <input type="text" placeholder="ar_name" class="form-control" @if(isset($permissiongroup->ar_name)) value="{{ $permissiongroup->ar_name }}"@endif name="ar_name" required="">
                            </div>
                        </div>

                  

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="state">{{__('Systems/SystemTwo/permissiongroups.state')}}</label>
                                <select id="state" name="state" class="form-control">
                                    <option @if(isset($permissiongroup->state) && $permissiongroup->state == 1) selected @endif value="1">{{__('Systems/SystemTwo/permissiongroups.state_enabled')}}</option>
                                    <option @if(isset($permissiongroup->state) && $permissiongroup->state == 0) selected @endif value="0">{{__('Systems/SystemTwo/permissiongroups.state_disabled')}}</option>
                                </select>
                                {{--<input type="number" placeholder="entry_hour" class="form-control" @if(isset($permissiongroup->entry_hour)) value="{{ $permissiongroup->entry_hour }}"@endif name="entry_hour" placeholder="No entry_hour" required="">--}}
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/permissiongroups.permissions')}}</label>
                                @if(isset($permissions) && count($permissions) > 0)
                                    @foreach($permissions as $key => $permission)
                                        <label for="{{$permission->id}}">@if(app()->getLocale() == "en"){{$permission->name}} @else {{$permission->ar_name}}@endif</label>
                                        <input type="checkbox" @if(isset($permissions_granted) && count($permissions_granted) > 0) @foreach($permissions_granted as $key => $permission_granted) @if($permission_granted->id == $permission->id) checked @endif @endforeach @endif id="{{$permission->id}}" name="{{$permission->id}}"/>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/permissiongroups.save')}}</button>
                            </div>


                        </div>
                    </form>

                    </div>


                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

<!-- End Contentbar -->
@endsection
@section('script')

<script src="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datepicker/i18n/datepicker.en.js') }}"></script>


{{-- <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script> --}}

<script>
    $(document).ready(function() {

        $('#default-date').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });

        $('#default-date12').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });


    });
</script>
@endsection