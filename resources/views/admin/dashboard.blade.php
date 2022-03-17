@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('main')
    <div class="content-wrapper">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Admin',
            'key' => 'Dashboard',
        ])
    </div>
@endsection
