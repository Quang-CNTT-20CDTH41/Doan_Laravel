@extends('layouts.admin')
@section('title', 'Admin Accounts')
@section('main')
    <div class="content-wrapper">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Admin',
            'key' => 'Accounts',
        ])
        <div class="form-group row">
            <label for="livesearch" class="col-form-label col-sm-1 ml-5">Tìm kiếm</label>
            <div class="col-sm-10">
                <input type="search" class="form-control" id="livesearch" name="keyword" value="{{ request()->search }}"
                    placeholder="Nhập email nhân vật">
            </div>
        </div>
        <table class="table">
            <thead class="table-dark">
                <th scope="">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </thead>
            <tbody id="listUser">
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if ($user->status == 1)
                                <span class="badge bg-success">Public</span>
                            @else
                                <span class="badge bg-danger">Private</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('accounts.edit', [$user]) }}" class="btn btn-warning"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('accounts.show', [$user]) }}" class="btn btn-primary"><i
                                    class="far fa-eye"></i></a>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->appends(request()->all())->links() }}
    </div>
    <form action="" method="post" id="form-delete">
        @csrf
        @method('delete')
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '#livesearch', function() {
                var keyword = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('accounts.index') }}",
                    data: {
                        keyword: keyword
                    },
                    datatype: 'json',
                    success: function(response) {
                        $('#listUser').html(response);
                    },
                })
            })
        })
    </script>
@endsection
