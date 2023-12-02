@extends('moduleadmin::layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{url('admin.vendors')}}">المتاجر </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل البروفيل 

                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل البروفيل 
                                    </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('moduleadmin::admin.includes.alerts.success')
                                @include('moduleadmin::admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.edit_profile_admin')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            <input type="hidden"  value="{{$admin->id}}" id="latitude" name="admin_id">
                                            {{-- <input type="hidden" value="" id="longitude"  name="longitude"> --}}
                                            @csrf
                                          

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات المستخدم </h4>
                                                <div class="row">
                                                  
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">name</label>
                                                            <input type="text" id="mobile"
                                                                   class="form-control"
                                                                   value="{{$admin->name}}"
                                                                   placeholder="" name="name">

                                                            @error("name")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">email</label>
                                                            <input type="email" 
                                                                   class="form-control" 
                                                                   value="{{$admin->email}}"
                                                                   placeholder="  " name="email">

                                                            @error("email")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">password</label>
                                                            <input type="password" id="mobile"
                                                                   class="form-control"
                                                                   value=""
                                                                   placeholder="" name="password">

                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Password Confirmation</label>
                                                            <input type="password" 
                                                                   class="form-control" 
                                                                   value=""
                                                                   placeholder="" name="password_confirmation">

                                                            @error("password_confirmation")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>


                                               


                                               
                                              

                                            </div>


                                            <div id="map" style="height: 5px;width: 1000px;"></div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsectio