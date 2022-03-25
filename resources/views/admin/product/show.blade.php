@extends('layouts.admin')
@section('title', 'Admin Accounts')
@section('main')
    <div class="content-wrapper">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Product',
            'key' => 'Show',
        ])
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-2">
                    <a href="{{ route('products.index') }}" class="btn btn-success float-right"><i
                            class="fa fa-backward"></i>
                        Back</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card text-white bg-secondary">
                <div class="card-header row">
                    <h3 class=" text-center">THÔNG TIN SẢN PHẨM</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200px">Tên sản phẩm</th>
                            <th>{{ $product->name }}</th>
                        </tr>
                        <tr>
                            <th>Giá</th>
                            <th>{{ $product->price }}</th>
                        </tr>
                        <tr>
                            <th>Giá giảm giá</th>
                            <th>{{ $product->sale_price }}</th>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>
                                @if ($product->status == 1)
                                    <span class="badge bg-success">Public</span>
                                @else
                                    <span class="badge bg-danger">Private</span>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>Nội dung hình ảnh</th>
                            <th>{!! $product->description !!}</th>
                        </tr>
                    </table>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row text-secondary">
                                <div class="col-12">
                                    <div class="card card-dark mt-5">
                                        <div class="card-header">
                                            <h3 class="">HÌNH ẢNH</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <h4>HÌNH ẢNH ĐẠI DIỆN</h4>
                                            <div class="row mt-4">
                                                <div class="col-sm-4">
                                                    <div class="position-relative">
                                                        <img src="{{ $product->image }}" alt="Photo 1"
                                                            class="img-fluid img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="text-secondary mt-3">HÌNH ẢNH CHI TIẾT</h4>
                                            <div id="show_image_list" class="row"></div>

                                            <input type="text" value='{{ $product->image_list }}' class="d-none"
                                                name="" id="image_list">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            // Summernote
            var _links = $('input#image_list').val();
            var _html = '';
            console.log(_links);
            if (_links) {
                var _arrs = $.parseJSON(_links);
                _arrs.forEach(element => {
                    let _url = element;
                    console.log(_url);
                    _html += '<div class="col-sm-4 mt-2">';
                    _html += '<div class="position-relative">';
                    _html += "<img src='" + _url +
                        "' class = 'img-fluid img-thumbnail w-100'>";
                    _html += '</div>'
                    _html += '</div>'
                });
            } else {
                _html += '<h4 class="text-danger">Sản phẩm không có hình ảnh chi tiết</h4>'
            }
            $('#show_image_list').html(_html);
        })
    </script>
@endsection
