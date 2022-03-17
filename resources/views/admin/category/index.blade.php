@extends('layouts.admin')
@section('title', 'Admin Categories List')
@section('main')
    <div class="content-wrapper">
        @include('layouts.inc.admin.content-header', [
            'name' => 'Category',
            'key' => 'List',
        ])
    </div>
@endsection
