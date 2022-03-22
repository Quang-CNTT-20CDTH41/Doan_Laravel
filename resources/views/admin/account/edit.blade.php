@extends('layouts.admin')
@section('title', 'Admin Accounts')
@section('main')
    <div class="content-wrapper">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Admin',
            'key' => 'Accounts',
        ])
        <div class="row px-2">
            <div class="col-md-12 p-2">
                <a href="{{ route('accounts.index') }}" class="btn btn-success float-right"><i class="fa fa-backward"></i>
                    Back</a>
            </div>

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
            <form action="{{ route('accounts.update', [$account]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $account->id }}" name="id">
                <div class="form-group row">
                    <label for="" class="col-form-label col-sm-3">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nhập tên người dùng" name="name"
                            value="{{ $account->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-form-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ $account->email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-form-label col-sm-3">Phonenumber</label>
                    <div class="col-sm-9">
                        <input type="phone" class="form-control" placeholder="Phonenumber" name="phone"
                            value="{{ $account->phone }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-form-label col-sm-3">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Address" name="address"
                            value="{{ $account->address }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-form-label col-sm-3">Birthday</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" placeholder="Address" name="birthday"
                            value="{{ $account->birthday }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-form-label col-sm-3">Status</label>
                    <div class="col-sm-9 d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                {{ $account->status == 1 ? 'checked' : '' }} value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Public
                            </label>
                        </div>
                        <div class="form-check px-5">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                                {{ $account->status == 0 ? 'checked' : '' }} value="0">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Private
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-form-label col-sm-3">Admin/User</label>
                    <div class="col-sm-9 d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="admin" id="admin"
                                {{ $account->admin == 1 ? 'checked' : '' }} value="1">
                            <label class="form-check-label" for="admin">
                                Admin
                            </label>
                        </div>
                        <div class="form-check px-5">
                            <input class="form-check-input" type="radio" name="admin" id="user"
                                {{ $account->admin == 0 ? 'checked' : '' }} value="0">
                            <label class="form-check-label" for="user">
                                User
                            </label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success mb-2">Save Change</button>
            </form>
        </div>
    </div>
@endsection
@section('js')

@endsection
