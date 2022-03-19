@extends('layouts.admin')
@section('title', 'Admin Categories List')
@section('main')
    <div class="content-wrapper px-3">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Category',
            'key' => 'List',
        ])
        <form action="" method="get">
            <div class="d-flex">
                <div class="py-2">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="search"
                        value="{{ request()->search }}">
                </div>
                <div class="py-2">
                    <button class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="ml-auto p-2">
                    <a href="{{ route('categories.create') }}" class="btn btn-success">Create Category</a>
                </div>
            </div>
        </form>
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Total Product</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created Date</th>
                        <th class="text-right pr-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products->count() }}</td>
                            <td>
                                @if ($category->status == 0)
                                    <span class="badge badge-danger">Private</span>
                                @else
                                    <span class="badge badge-success">Public</span>
                                @endif
                            </td>
                            <td>{{ $category->created_at->format('m-d-yy') }}</td>
                            <td class="text-right">
                                <form action="" method="post">
                                    <a href="{{ route('categories.edit', [$category]) }}" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="mx-2">
                {{ $categories->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
@endsection
