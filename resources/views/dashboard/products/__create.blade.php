@extends('dashboard.layouts.layout')
@php
    $lang_current = Config::get('app.locale');
@endphp
@section('title')
    {{ __('products/productAdd.titleAdd') }}
@endsection
<base href="{{ url('/') }}">
@section('style')
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Dropzone css -->
    <link href="{{ asset('assets/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Tagsinput css -->
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('rightbar-content')
    <form id="product_form" method="post" enctype="multipart/form-data">
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">{{ __('products/productAdd.titleAdd') }}</h4>
                    <div class="breadcrumb-list">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                            <li class="breadcrumb-item">{{ __('side.products') }}</li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('products.index')}}">{{ __('side.productList') }}</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">{{ __('products/productAdd.titleAdd') }}</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="widgetbar">
                        <button class="btn btn-primary save"
                                type="button">{{ __('products/productAdd.publish') }}</button>
                        <div class="loadingMask">
                            <img src="{{asset('assets/images/loader.gif')}}" alt="">
                        </div>
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
                <div class="col-lg-8 col-xl-9">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('products/productAdd.productDetail') }}</h5>
                        </div>
                        <!-- Start col -->

                        <div class="card-body">
                            <ul class="nav nav-pills nav-justified mb-3"
                                @if($lang_current == 'ar') style="padding-right: 0 !important;" @endif role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" style="font-family: 'Tajawal', sans-serif;"
                                       id="pills-arabic-product-information-tab-justified" data-toggle="pill"
                                       href="#pills-arabic-product-information-justified" role="tab"
                                       aria-controls="pills-profile" aria-selected="false">???????????? ???????????? ????????????
                                        ??????????????</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-english-product-information-tab-justified"
                                       data-toggle="pill" href="#pills-english-product-information-justified" role="tab"
                                       aria-controls="pills-home" aria-selected="true">Product Details in English</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body tab-content" style="text-align: left;">
                            <div class="aaaaa form-group row tab-pane fade show"
                                 id="pills-english-product-information-justified" role="tabpanel"
                                 aria-labelledby="pills-english-product-information-tab-justified">
                                <label for="name_en" class="col-sm-12 col-form-label">Product Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name_en" class="form-control font-20" id="name_en"
                                           required>
                                    <div class="error error_name_en"></div>
                                </div>
                                <label for="description_en" class="col-sm-12 col-form-label">Product Description</label>
                                <div class="col-sm-12">
                                    <textarea class="summernote input-block-level" id="description_en"
                                              name="description_en"></textarea>
                                    <div class="error error_description_en"></div>
                                </div>
                            </div>


                            <div class="form-group row tab-pane fade show active" style="text-align: right;"
                                 id="pills-arabic-product-information-justified" role="tabpanel"
                                 aria-labelledby="pills-arabic-product-information-tab-justified">
                                <label style="font-family: 'Tajawal', sans-serif;" for="name_ar"
                                       class="col-sm-12 col-form-label">?????? ????????????</label>
                                <div class="col-sm-12">
                                    <input style="text-align: right; font-family: 'Tajawal', sans-serif;" type="text"
                                           name="name_ar" class="form-control font-20" id="name_ar" required>
                                    <div class="error error_name_ar"></div>
                                </div>
                                <label for="description_ar" style="font-family: 'Tajawal', sans-serif;"
                                       class="col-sm-12 col-form-label">??????
                                    ????????????</label>
                                <div style="font-family: 'Tajawal', sans-serif;" class="col-sm-12">
                                    <textarea class="summernote input-block-level" id="description_ar"
                                              name="description_ar"></textarea>
                                    <div class="error error_description_ar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xl-4">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="nav flex-column nav-pills" id="v-pills-product-tab" role="tablist"
                                         aria-orientation="vertical">
                                        <a class="nav-link mb-2 active" id="v-pills-general-tab" data-toggle="pill"
                                           href="#v-pills-general" role="tab" aria-controls="v-pills-general"
                                           aria-selected="true"><i
                                                class="feather icon-feather mr-2"></i>{{ __('products/productAdd.general') }}
                                        </a>
                                        <a class="nav-link mb-2" id="v-pills-stock-tab" data-toggle="pill"
                                           href="#v-pills-stock" role="tab" aria-controls="v-pills-stock"
                                           aria-selected="false"><i
                                                class="feather icon-box mr-2"></i>{{ __('products/productAdd.stock') }}
                                        </a>
                                        <a class="nav-link mb-2" id="v-pills-shipping-tab" data-toggle="pill"
                                           href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping"
                                           aria-selected="false"><i
                                                class="feather icon-truck mr-2"></i>{{ __('products/productAdd.shipping') }}
                                        </a>
                                        <!--<a class="nav-link mb-2" id="v-pills-advanced-tab" data-toggle="pill" href="#v-pills-advanced" role="tab" aria-controls="v-pills-advanced" aria-selected="false"><i class="feather icon-settings mr-2"></i>Advanced</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-8">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="tab-content" id="v-pills-product-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel"
                                             aria-labelledby="v-pills-general-tab">
                                            <div class="form-group row">
                                                <label for="purchase_price" class="col-sm-4 col-form-label">Purchase
                                                    Price</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="purchase_price" name="purchase_price"
                                                           class="form-control" placeholder="100" required>
                                                    <div class="error error_purchase_price"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="price"
                                                       class="col-sm-4 col-form-label">{{ __('products/productAdd.price') }}</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="price" name="price" class="form-control"
                                                           placeholder="100" required>
                                                    <div class="error error_price"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="salePrice"
                                                       class="col-sm-4 col-form-label">{{ __('products/productAdd.salePrice') }}</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="sale_price" class="form-control"
                                                           placeholder="50" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-stock" role="tabpanel"
                                             aria-labelledby="v-pills-stock-tab">
                                            <div class="form-group row">
                                                <label for="sku"
                                                       class="col-sm-4 col-form-label">{{ __('products/productAdd.sku') }}</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="sku" class="form-control" id="sku"
                                                           placeholder="SKU001">
                                                </div>
                                            </div>
                                            <!--TODO: Add an option to control the status-->
                                            <div class="form-group row">
                                                <label for="stockStatus"
                                                       class="col-sm-4 col-form-label">{{ __('products.stockStatus') }}</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="stock_status" id="stockStatus">
                                                        <option value="1">In Stock</option>
                                                        <option value="0">Out of Stock</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="stockQuantity"
                                                       class="col-sm-4 col-form-label">{{ __('products.quantity') }}</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="stock_quantity" class="form-control"
                                                           id="stockQuantity" placeholder="100">
                                                    <div class="error error_stock_quantity"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-shipping" role="tabpanel"
                                             aria-labelledby="v-pills-shipping-tab">
                                            <div class="form-group row">
                                                <label for="weight"
                                                       class="col-sm-4 col-form-label">{{ __('products/productAdd.weight') }}</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="weight" class="form-control" id="weight"
                                                           placeholder="0">
                                                </div>
                                            </div>
                                            <!--TODO: Add an option to control the status-->
                                            <div class="form-group row mb-0">
                                                <label for="shippingClass"
                                                       class="col-sm-4 col-form-label">{{ __('products/productAdd.shoppingClasses') }}</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="shipping" id="shippingClass">
                                                        <option value="free">Free Shipping</option>
                                                        <option value="no">No Shipping</option>
                                                        <option value="fixed">Fixed Shipping</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="tab-pane fade" id="v-pills-advanced" role="tabpanel" aria-labelledby="v-pills-advanced-tab">-->
                                        <!--        <div class="form-group row mb-0">-->
                                        <!--            <label for="purchaseNote" class="col-sm-3 col-form-label">Purchase note</label>-->
                                        <!--            <div class="col-sm-9">-->
                                        <!--                <textarea class="form-control" name="purchaseNote" id="purchaseNote" rows="3" placeholder="Purchase note"></textarea>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-4 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('products/productAdd.categories') }}</h5>
                        </div>
                        <div class="card-body">
                            @if(isset($categories))
                                @if(count($categories) > 0)
                                    @foreach($categories as $cat)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="categories[]" class="custom-control-input"
                                                   value="{{ $cat->id }}" id="{{ $cat->id }}">
                                            <label class="custom-control-label"
                                                   for="{{ $cat->id }}">{{ $cat->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                    <!--<div class="card m-b-30">-->
                    <!--    <div class="card-header">-->
                <!--        <h5 class="card-title">{{ __('products/productAdd.color') }}</h5>-->
                    <!--    </div>-->
                    <!--    <div class="card-body pt-3">-->
                    <!--        <div class="custom-checkbox-button">-->
                    <!--            <div class="form-check-inline checkbox-primary">-->
                    <!--              <input type="checkbox" id="customCheckboxInline5" name="customCheckboxInline2" checked>-->
                    <!--              <label for="customCheckboxInline5"></label>-->
                    <!--            </div>-->
                    <!--            <div class="form-check-inline checkbox-secondary">-->
                    <!--              <input type="checkbox" id="customCheckboxInline6" name="customCheckboxInline2">-->
                    <!--              <label for="customCheckboxInline6"></label>-->
                    <!--            </div>-->
                    <!--            <div class="form-check-inline checkbox-success">-->
                    <!--              <input type="checkbox" id="customCheckboxInline7" name="customCheckboxInline2">-->
                    <!--              <label for="customCheckboxInline7"></label>-->
                    <!--            </div>-->
                    <!--            <div class="form-check-inline checkbox-danger">-->
                    <!--              <input type="checkbox" id="customCheckboxInline8" name="customCheckboxInline2">-->
                    <!--              <label for="customCheckboxInline8"></label>-->
                    <!--            </div>-->
                    <!--            <div class="form-check-inline checkbox-warning">-->
                    <!--              <input type="checkbox" id="customCheckboxInline9" name="customCheckboxInline2">-->
                    <!--              <label for="customCheckboxInline9"></label>-->
                    <!--            </div>-->
                    <!--            <div class="form-check-inline checkbox-info">-->
                    <!--              <input type="checkbox" id="customCheckboxInline10" name="customCheckboxInline2">-->
                    <!--              <label for="customCheckboxInline10"></label>-->
                    <!--            </div>-->
                    <!--            <div class="form-check-inline checkbox-light">-->
                    <!--              <input type="checkbox" id="customCheckboxInline11" name="customCheckboxInline2">-->
                    <!--              <label for="customCheckboxInline11"></label>-->
                    <!--            </div>-->
                    <!--            <div class="form-check-inline checkbox-dark">-->
                    <!--              <input type="checkbox" id="customCheckboxInline12" name="customCheckboxInline2">-->
                    <!--              <label for="customCheckboxInline12"></label>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->


                    <!--/====================================\-->
                    <!--|======  Meat Application END  ======|-->
                    <!--\====================================/-->
                    @php
                        $plug = get_plugin_if_active(2);
                    @endphp
                    @if($plug->status == 1)
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title btn btn-primary d-block" data-toggle="modal"
                                    data-target="#sizes">{{ __('products/productAdd.size') }}</h5>
                            </div>

                        </div>

                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('products/productAdd.cuttingMethod') }}</h5>
                            </div>
                            <div class="card-body pt-3">
                                <select class="select2-multi-select form-control" name="cutting_method[]"
                                        multiple="multiple">
                                    @if(isset($cutting))
                                        @if(count($cutting) > 0)
                                            @foreach($cutting as $cut)
                                                <option value="{{ $cut->id }}">{{ $cut->name_ar }}</option>
                                            @endforeach
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('products/productAdd.packagingMethod') }}</h5>
                            </div>
                            <div class="card-body pt-3">
                                <select class="select2-multi-select form-control" name="packaging_method[]"
                                        multiple="multiple" required>
                                    @if(isset($packing))
                                        @if(count($packing) > 0)
                                            @foreach($packing as $pack)
                                                <option value="{{ $pack->id }}">{{ $pack->name_ar }}</option>
                                            @endforeach
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                @endif
                <!--/====================================\-->
                    <!--|======  Meat Application END  ======|-->
                    <!--\====================================/-->


                    <!--<div class="card m-b-30">-->
                    <!--    <div class="card-header">-->
                    <!--        <h5 class="card-title">Tags</h5>-->
                    <!--    </div>-->
                    <!--    <div class="card-body">-->
                    <!--        <div class="product-tags">-->
                    <!--            <span class="badge badge-secondary-inverse">New</span>-->
                    <!--            <span class="badge badge-secondary-inverse">Latest</span>-->
                    <!--            <span class="badge badge-secondary-inverse">Trending</span>-->
                    <!--            <span class="badge badge-secondary-inverse">Popular</span>-->
                    <!--            <span class="badge badge-secondary-inverse">Sale</span>-->
                    <!--        </div>                                -->
                    <!--    </div>-->
                    <!--    <div class="card-footer">-->
                    <!--        <div class="add-product-tags">-->
                    <!--                <div class="input-group">-->
                    <!--                  <input type="search" class="form-control" placeholder="Add Tags" aria-label="Search" aria-describedby="button-addonTags">-->
                    <!--                  <div class="input-group-append">-->
                    <!--                    <button class="input-group-text" type="submit" id="button-addonTags">Add</button>-->
                    <!--                  </div>-->
                    <!--                </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class="card-title">
                                        {{__('products.digital_product')}}
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="digital_product"
                                               id="digital_product">
                                        <label class="custom-control-label" for="digital_product"></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary mt-3 btn-digital-codes" data-toggle="modal"
                                            data-target="#add_codes">
                                        {{__('products.add_digital_codes_on_here')}}
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('products/productAdd.image') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-inline-block mb-1">
                                <img id="imagePreview" src="{{asset('assets/images/default.png')}}" alt="Rounded Image"
                                     class="img-fluid rounded" style="width: 200px;height: 200px;object-fit: cover;">
                            </div>
                            <div class="error error_image"></div>
                        </div>
                        <div class="card-footer">
                            <input type="file" name="image" id="imageUpload"
                                   class="btn btn-primary-rgba btn-lg btn-block">
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->

        </div>

        @include('dashboard.products.models-create')
    </form>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <!-- Tagsinput js -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
    <!-- Summernote js -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Dropzone js -->
    <script src="{{ asset('assets/plugins/dropzone/dist/dropzone.js') }}"></script>
    <!-- eCommerce Page js -->
    <script src="{{ asset('assets/js/custom/custom-ecommerce-product-detail-page.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-toasts.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-sweet-alert.js') }}"></script>
    <script>
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewId).attr('src', e.target.result);
                    $(previewId).hide();
                    $(previewId).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this, '#imagePreview');
        });

        $(document).ready(function () {
            $('.product_size').on('change', function () {
                if ($(this).is(':checked')) {
                    $(this).parent().parent().parent().find('.size-price-input').attr('name', 'size_price[]')
                }else{
                    $(this).parent().parent().parent().find('.size-price-input').attr('name', '')
                }
            });
            $('#digital_product').on('change', function () {
                if ($(this).is(':checked')) {
                    swal({
                        title: '{{(__('products.are_you_sure_you_want_to_activate_the_digital_product'))}}',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: '{{__('general.yes')}}!',
                        cancelButtonText: '{{__('general.no_cancel')}}!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10',
                        buttonsStyling: false
                    }).then(function () {
                        $('.btn-digital-codes').show();
                        $('.card-code').show()
                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            $('#digital_product').prop('checked', false);
                        }
                    });
                    // $('.card-code').show();
                } else {
                    swal({
                        title: '{{(__('products.are_you_sure_you_want_to_deactivate_the_digital_product'))}}',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: '{{__('general.yes')}}!',
                        cancelButtonText: '{{__('general.no_cancel')}}!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10',
                        buttonsStyling: false
                    }).then(function () {
                        $('.btn-digital-codes').hide();
                        $('.card-code').hide();

                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            $('#digital_product').prop('checked', true);
                        }
                    });
                }
            });

            var new_code = function () {
                $('.btn-plus').on('click', function () {
                    var html = ` <div class="row mt-3">
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="codes[]">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-danger btn-remove"><i class="la la-close"></i></button>
                                    </div>
                                </div>`;
                    $('.new-code').append(html);
                    remove_code();
                });
            };

            var remove_code = function () {
                $('.btn-remove').on('click', function () {
                    $(this).parent().parent().remove();
                });
            };
            var save = function () {
                $('.save').on("click", function () {
                    $(".loadingMask").css('display', 'inline-block');

                    $.ajax({
                        method: "post",
                        beforeSend: function () {
                            $(".loadingMask").css('display', 'inline-block');
                        },
                        url: "{{route('products.store')}}",

                        data:
                            new FormData($("#product_form")[0])
                        ,
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        async: true,
                        processData: false,
                        contentType: false,
                        success: function (data) {

                            //  wait.resolve();
                            $(".loadingMask").css('display', 'none');
                            if (data.errors) {
                                $('.errors-m').remove();
                                if (data.errors.hasOwnProperty("name_en") || data.errors.hasOwnProperty("description_en")) {
                                    $('#pills-english-product-information-tab-justified').tab('show');
                                } else if (!data.errors.hasOwnProperty("name_en") || !data.errors.hasOwnProperty("description_en")) {
                                    $('#pills-arabic-product-information-tab-justified').tab('show');
                                }
                                jQuery.each(data.errors, function (key, value) {
                                    var errorValue = `<label class="errors-m">` + value + `</label>`;
                                    if (key == "name_ar") {
                                        $('.error_name_ar').append(errorValue);
                                    }
                                    if (key == "name_en") {
                                        $('.error_name_en').append(errorValue);
                                    }
                                    if (key == "description_en") {
                                        $('.error_description_en').append(errorValue);
                                    }
                                    if (key == "description_ar") {
                                        $('.error_description_ar').append(errorValue);
                                    }
                                    if (key == "price") {
                                        $('.error_price').append(errorValue);
                                    }
                                    if (key == "purchase_price") {
                                        $('.error_purchase_price').append(errorValue);
                                    }
                                    if (key == "stock_quantity") {
                                        $('.error_stock_quantity').append(errorValue);
                                    }
                                    if (key == "image") {
                                        $('.error_image').append(errorValue);
                                    }

                                });
                            } else {
                                $(".loadingMask").css('display', 'none');
                                swal(
                                    '{{__('general.done')}}!',
                                    '{{__('general.add_successfully')}}!',
                                    'success'
                                ).then(function () {
                                    window.location = "{{route('products.index')}}"
                                });
                            }
                        },
                        error: function () {
                            $(".loadingMask").css('display', 'none');
                            swal(
                                '{{__('general.error')}}!',
                                '{{__('general.please_try_again')}}!',
                                'error'
                            )
                        }
                    });


                });
            };

            save();
            new_code();
            remove_code();
        });


    </script>

@endsection  
