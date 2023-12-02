@extends('moduleadmin::layouts.admin')

@push('css-style')
    @include('moduleadmin::admin.partials.common_index_css')
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin-panel') }}">Home</a></li>
                        <li class="breadcrumb-item active">brand</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tag"></i>
                        brand
                    </h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/brand/create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> {{ __('Add New') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="my-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Name</th>
                                {{-- <th>Category</th> --}}
                                <th>Active</th>
                                {{-- <th>photo</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $index => $brand)
                                <tr>

                                    <td>
                                        {{ $brand->name }}
                                    </td>

                                    {{-- <td>{{ $brand->_parent->name ?? '--' }}</td> --}}



                                    <td>
                                        {{ $brand->getActive() }}
                                    </td>
                                    {{-- <td>
                                        @if ($brand->photo !== null)
                                            <img src="{{ asset('uploads/product-category') . '/' . $brand->photo }}"
                                                alt="" width="50" height="50">
                                        @endif
                                    </td> --}}

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button
                                                    onclick="window.location='{{ url('admin.product.edit', $brand->id) }}'"
                                                    class="btn btn-success btn-sm rounded-0" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <form class="d-inline delete-form"
                                                    action="{{ url('admin.product.destroy', $brand->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm delete-btn" type="submit"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                {{-- <th>Category</th> --}}
                                <th>Active</th>
                                {{-- <th>photo</th> --}}
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('moduleadmin::admin.partials.common_index_js')
@endsection
