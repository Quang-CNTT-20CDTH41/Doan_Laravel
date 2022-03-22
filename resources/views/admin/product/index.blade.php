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
                    <input type="text" class="form-control rounded-0" placeholder="Tìm kiếm" name="search"
                        value="{{ request()->search }}">
                </div>
                <div class="py-2">
                    <button class="btn btn-primary rounded-0">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="ml-auto p-2">
                    <a href="{{ route('categories.create') }}" class="btn btn-success">Create Category</a>
                </div>

            </div>
        </form>
        <div>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
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
                                <a href="{{ route('categories.edit', [$category]) }}" class="btn btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="{{ route('categories.destroy', [$category]) }}"
                                    class="btn btn-danger btndelete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="mx-2 float-end">
            {{ $categories->appends(request()->all())->links() }}
        </div>
        <form action="" method="post" id="form-delete">
            @csrf
            @method('delete')
        </form>
    </div>
@endsection

@section('js')
    <script>
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action', _href);
            if (confirm("Bạn có muốn tiếp tục xoá danh mục")) {
                $('form#form-delete').submit();
            }
        })
    </script>
@endsection
