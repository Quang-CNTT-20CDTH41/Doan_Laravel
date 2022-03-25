@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('main')
    <div class="content-wrapper">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Admin',
            'key' => 'Dashboard',
        ])
        <iframe src="{{ url('file/dialog.php') }}" style="width:100%;height:400px;overflow-y:auto;border:5px;"
            frameborder="0"></iframe>
    </div>
@endsection
