@extends('layouts.admin')
@section('title', 'Admin Accounts')
@section('main')
    <div class="content-wrapper">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Admin',
            'key' => 'Accounts',
        ])
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-2">
                    <a href="{{ route('accounts.index') }}" class="btn btn-success float-right"><i
                            class="fa fa-backward"></i>
                        Back</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2">Infomation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Name</th>
                    <th scope="row">{{ $account->name }}</th>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <th scope="row">{{ $account->email }}</th>
                </tr>
                <tr>
                    <th scope="row">Phonenumber</th>
                    <th scope="row">{{ $account->phone }}</th>
                </tr>
                <tr>
                    <th scope="row">Address</th>
                    <th scope="row">{{ $account->address }}</th>
                </tr>
                <tr>
                    <th scope="row">Sex</th>
                    <th scope="row">{{ $account->sex == 1 ? 'Male' : 'Female' }}</th>
                </tr>
                <tr>
                    <th scope="row">Birthday</th>
                    <th scope="row">{{ $account->birthday }}</th>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <th scope="row">
                        @if ($account->status == 1)
                            <span class="badge bg-success">Public</span>
                        @else
                            <span class="badge bg-danger">Private</span>
                        @endif
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('js')

@endsection
