@section('title')
    {{__('Systems/SystemFive/companies.company_add')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')


    <link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

    <style>

        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: pink;!important;
            text-decoration-color: #0a6aa1;
            font-size: 12px;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: pink;!important;
            text-decoration-color: #0a6aa1;

            font-size: 12px;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: pink;!important;
            text-decoration-color: #0a6aa1;

            font-size: 12px;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: pink;!important;
            text-decoration-color: #0a6aa1;

            font-size: 12px;
        }
    </style>

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{__('Systems/SystemFive/companies.add_company')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('companies.index')}}">{{__('Systems/SystemFive/companies.companies')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/companies.add_company')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('companies.index') }}">Back</a>
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
                <form method="post" action="{{ route('companies.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="name">{{__('Systems/SystemFive/companies.name')}}</label>
                                        <input type="text" class="form-control" id="code" name="name"
                                               placeholder="name" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="field">{{__('Systems/SystemFive/companies.field')}}</label>
                                        <select class="form-control" id="field" name="field">
                                            <option disabled="" selected>Select the field</option>
                                            @if(isset($fields))
                                                @foreach($fields as $key => $field)
                                                    <option value="{{$field->name}}">{{$field->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="country">{{__('Systems/SystemFive/companies.country')}}</label>
                                        <select class="form-control" id="country" name="country" onchange="onselectChanged('country')">
                                            <option disabled selected value="">select country</option>
                                            @if(isset($sortnames) && count($sortnames) > 0)
                                                @foreach($sortnames as $key => $sortname)
                                                    <optgroup label="{{$sortname->sortname}}">
                                                        @foreach($countries as $key => $country)
                                                            @if($sortname->sortname == $country->sortname)
                                                                <option value="{{$country->id}}">@if(app()->getLocale() == "en"){{$country->name}} @else {{$country->ar_name}} @endif</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach

                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="region">{{__('Systems/SystemFive/companies.region')}}</label>
                                        <select class="form-control" id="region" name="region" onchange="onselectChanged('province')">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="city">{{__('Systems/SystemFive/companies.city')}}</label>
                                        <select class="form-control" id="city" name="city" onchange="onselectChanged('city')">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="neighborhood">{{__('Systems/SystemFive/companies.neighborhood')}}</label>
                                        <select class="form-control" id="neighborhood" name="neighborhood">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="mobile">{{__('Systems/SystemFive/companies.mobile')}}</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                               placeholder="mobile" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="telephone">{{__('Systems/SystemFive/companies.telephone')}}</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                               placeholder="telephone" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="email">{{__('Systems/SystemFive/companies.email')}}</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="email" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="address">{{__('Systems/SystemFive/companies.address')}}</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="address" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="bankaccount">{{__('Systems/SystemFive/companies.bankaccount')}}</label>
                                        <input type="bankaccount" class="form-control" id="bankaccount" name="bankaccount"
                                               placeholder="bankaccount" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="cardimage">{{__('Systems/SystemFive/companies.cardimage')}}</label>
                                        <input type="cardimage" class="form-control" id="cardimage" name="cardimage"
                                               placeholder="cardimage" required="">
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFive/companies.add_company')}}</button>
                                    </div>
                                </div>
                </form>

            </div>

            <p id="locale" style="display: none;"><?php echo app()->getLocale()?></p>


        </div>
    </div>
    </div>
    <!-- End col -->
    </div>
    <!-- End row -->
    </div>

    <script>
        function onselectChanged(area) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });

            $.ajax({
                url: "/dashboard/region",
                headers: { 'csrftoken' : '{{ csrf_token() }}' },
                data: JSON.stringify({country:$("#country").val(),
                    province:$("#region").val(),
                    city:$("#city").val(),
                    neighborhood:$("#neighborhood").val(),
                    area:area}),
                type: 'POST',
                datatype: 'JSON',
                contentType: 'application/json',
                success: function (response) {

                    console.log(response[0]);
                    var index;
                    var content = "";
                    for ( index = 0 ; index < response.length ; index ++ ) {

                        content += "<option";
                        content += " value=";
                        content += "'";
                        content += response[index].id;
                        content += "'";
                        content += ">";
                        if($("#locale") === "en")
                            content += response[index].name;
                        else
                            content += response[index].ar_name;
                        content += "</option>";

                    }

                    var preoption;

                    if (area === "country") {
                        preoption = "<option disabled selected value=\"\">select region</option>";
                        $("#region").html(preoption + content);
                        $("#city").html("");
                        $("#neighborhood").html("");
                    }
                    if (area === "province") {
                        preoption = "<option disabled selected value=\"\">select city</option>";
                        $("#city").html(preoption + content);
                        $("#neighborhood").html("");
                    }
                    if (area === "city") {
                        preoption = "<option disabled selected value=\"\">select neighborhood</option>";
                        $("#neighborhood").html(preoption + content);
                    }

                    // console.log(response);


                },
                error: function (response) {
                    $('#errormessage').html(response.message);
                }
            });
        }

    </script>


    <!-- End Contentbar -->
@endsection
@section('script')


    <script src="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard//plugins/datepicker/i18n/datepicker.en.js') }}"></script>


    <script src="{{ asset('assets/dashboard//js/custom/custom-toasts.js') }}"></script>



@endsection 