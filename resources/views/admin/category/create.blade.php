@extends('layouts.admin')
@section('title', 'Admin Categories Create')
@section('main')
    <div class="content-wrapper px-3">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Category',
            'key' => 'Create',
        ])
        <div class="container-fluid px-3">
            <div class="row">
                <div class="col-md-12 p-2">
                    <a href="{{ route('categories.index') }}" class="btn btn-success float-right"><i
                            class="fa fa-backward"></i> Back</a>
                </div>
                <div class="">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf

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

                        <div class="form-group row">
                            <label for="" class="col-form-label col-sm-3">Tên danh mục</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-sm-3">Chọn danh mục cha</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="parent_id">
                                    <option selected value="0">New Category</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
