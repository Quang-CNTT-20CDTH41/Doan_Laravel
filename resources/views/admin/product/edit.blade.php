@extends('layouts.admin')
@section('title', 'Admin Categories Edit')
@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('main')
    <div class="content-wrapper px-3">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Category',
            'key' => 'Edit',
        ])
        <div class="container-fluid px-3">
            <div class="row">
                <div class="col-md-12 p-2">
                    <a href="{{ route('products.index') }}" class="btn btn-success float-right"><i
                            class="fa fa-backward"></i> Back</a>
                </div>
                <div class="">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('products.update', [$product]) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="row">
                            <div class="col-sm-6 mx-4">
                                <div class="form-group row">
                                    <label for="" class="col-form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name"
                                        value="{{ $product->name }}">
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Hình ảnh chi tiết</label>

                                    <div class="input-group px-0">
                                        <input type="text" class="form-control d-none" id="image_list"
                                            placeholder="Tải hình ảnh" name="image_list" multiple
                                            value="{{ $product->image_list }}">
                                        <span class=""><button type="button" class="btn btn-danger text-white"
                                                data-toggle="modal" data-target="#imagelist"><i
                                                    class="fas fa-folder"></i></button></span>
                                    </div>
                                    <div id="show_image_list" class="row mt-3">

                                    </div>
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
                                        <textarea id="summernote" rows="20" cols="20" name="description">{{ $product->description }}</textarea>
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
                                        value="{{ $product->price }}">
                                    @error('price')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Giá giảm giá</label>
                                    <input type="number" class="form-control" placeholder="Nhập giá giảm giá"
                                        name="sale_price" value="{{ $product->sale_price }}">
                                    @error('sale_price')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label">Hình ảnh đại diện</label>

                                    <div class="input-group px-0">
                                        <input type="text" class="form-control d-none" id="image" placeholder="Tải hình ảnh"
                                            name="image" value="{{ $product->image }}">
                                        <span class=" "><button type="button"
                                                class="btn btn-success text-white" data-toggle="modal"
                                                data-target="#fileimage"><i class="fas fa-folder"></i></button></span>

                                        <div class="m-3">
                                            <img src="" class="img-fluid img-thumbnail" id="showimage" alt=""
                                                style="width:250px">

                                        </div>
                                    </div>
                                    @error('image')
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

    <x-imageList />
    <x-image />
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

        $(function() {
            // IMAGE LIST
            var _links = $('input#image_list').val();
            var _html = '';
            if ($.inArray('[', _links)) {
                _html += '<div class="col-sm-4 p-1"><img src="' + _links +
                    '" class="img-fluid img-thumbnail" style="width:250px;" alt=""></div>';
            } else {
                var _arrs = $.parseJSON(_links);
                _arrs.forEach(element => {
                    let _url = element;
                    _html += '<div class="col-sm-4 p-1"><img src="' + _url +
                        '" class="img-fluid img-thumbnail" style="width:250px;" alt=""></div>';
                });
            }
            $('#show_image_list').html(_html);

            var _link = $('input#image').val();
            var _img = '{{ url('') }}' + _link;
            $('#showimage').attr('src', _img);

            $('#imagelist').on('hide.bs.modal', function() {
                // IMAGE LIST
                var _links = $('input#image_list').val();
                var _html = '';
                if ($.inArray('[', _links)) {
                    _html += '<div class="col-sm-4 p-1"><img src="' + _links +
                        '" class="img-fluid img-thumbnail" style="width:250px;" alt=""></div>';
                } else {
                    var _arrs = $.parseJSON(_links);
                    _arrs.forEach(element => {
                        let _url = element;
                        _html += '<div class="col-sm-4 p-1"><img src="' + _url +
                            '" class="img-fluid img-thumbnail" style="width:250px;" alt=""></div>';
                    });
                }
                $('#show_image_list').html(_html);
            });
            // IMAGE

            $('#fileimage').on('hide.bs.modal', function() {
                var _link = $('input#image').val();
                var _img = '{{ url('') }}' + _link;
                $('#showimage').attr('src', _img);
            })

        })
    </script>
@endsection
