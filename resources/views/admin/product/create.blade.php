@extends('layouts.admin')
@section('title', 'Admin Product Create')
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
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="post">
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
                                    @error('image')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Nội dung</label>
                                    <textarea name="description" class="form-control" id="" cols="20" rows="7">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="" class="col-form-label ">Giá</label>
                                    <input type="text" class="form-control" placeholder="Nhập giá" name="price"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Giá giảm giá</label>
                                    <input type="text" class="form-control" placeholder="Nhập giá giảm giá"
                                        name="sale_price" value="{{ old('sale_price') }}">
                                    @error('sale_price')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Hình ảnh đại diện</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Chọn danh mục</label>
                                    <select class="form-select" name="category_id">
                                        <option selected value="0">Chọn danh mục</option>
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
