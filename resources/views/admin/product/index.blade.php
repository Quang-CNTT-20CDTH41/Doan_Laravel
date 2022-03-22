@extends('layouts.admin')
@section('title', 'Admin Product List')
@section('main')
    <div class="content-wrapper px-3">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Product',
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
                    <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
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
                        <th scope="col">Price / Sale</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th class="text-right pr-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }} / <span class="badge bg-success">{{ $product->sale_price }}</span>
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                @if ($product->status == 0)
                                    <span class="badge badge-danger">Private</span>
                                @else
                                    <span class="badge badge-success">Public</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{ route('products.edit', [$product]) }}" class="btn btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="{{ route('products.destroy', [$product]) }}" class="btn btn-danger btndelete"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="mx-2 float-end">
            {{ $products->appends(request()->all())->links() }}
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
