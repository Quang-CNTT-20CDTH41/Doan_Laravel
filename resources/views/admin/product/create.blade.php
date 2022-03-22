@extends('layouts.admin')
@section('title', 'Admin Product Create')
@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('main')
    <div class="content-wrapper px-2">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Product',
            'key' => 'Create',
        ])
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-2">
                    <a href="{{ route('products.index') }}" class="btn btn-success float-right"><i
                            class="fa fa-backward"></i> Back</a>
                </div>
                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mx-4">
                                <div class="form-group row">
                                    <label for="" class="col-form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Hình ảnh chi tiết</label>
                                    <input type="file" class="form-control" name="image_list" multiple>
                                    @error('image_list')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Nội dung
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <textarea id="summernote" rows="20" cols="20" name="description"></textarea>
                                        @error('description')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.content -->
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="" class="col-form-label ">Giá</label>
                                    <input type="number" class="form-control" placeholder="Nhập giá" name="price"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Giá giảm giá</label>
                                    <input type="number" class="form-control" placeholder="Nhập giá giảm giá"
                                        name="sale_price" value="{{ old('sale_price') }}">
                                    @error('sale_price')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Hình ảnh đại diện</label>
                                    <input type="file" class="form-control" name="file_upload">
                                    @error('file_upload')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Chọn danh mục</label>
                                    <select class="form-select" name="category_id">
                                        {!! $htmlOption !!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 p-2">
                            <button type="submit" class="btn btn-primary float-right mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Summernote -->
    <script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                placeholder: 'Vui lòng nhập nội dung mô tả sản phẩm'
            })
        })
    </script>
@endsection
