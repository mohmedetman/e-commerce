@extends('moduleadmin::layouts.admin')

@section('css')
    @include('moduleadmin::admin.partials.common_create_js')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">brand</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header   border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                @foreach ($locales as $locale)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->first) active @endif"
                                            id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#{{ $locale }}"
                                            role="tab" aria-controls="custom-tabs-five-overlay"
                                            aria-selected="true">{{ $locale }}</a>
                                    </li>
                                @endforeach



                            </ul>
                        </div>

                        <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    @foreach ($locales as $locale)
                                        <div class="tab-pane fade show  @if ($loop->first) active @endif"
                                            id="{{ str_replace(' ', '-', $locale) }}" role="tabpanel"
                                            aria-labelledby="custom-tabs-setting-tab">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputName1">Name ({{ $locale }})</label>
                                                        <input name="{{$locale}}[name]" type="text" class="form-control"
                                                            id="exampleInputName1" placeholder="Enter arabic name"
                                                            value="">
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="container">
                                    <div class="row">

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input name="is_active" type="checkbox"  class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">IS ACTIVE </label>
                                            </div>
                                        </div>



                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">Press Submit After Filling Fields To Add Product
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    @include('moduleadmin::admin.partials.common_create_js')
@endsection