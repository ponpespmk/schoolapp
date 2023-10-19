@extends('admin.admin_app', ['title' => 'Admin Dashboard', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Admin Dashboard','sub_title' => 'Admin'])

<h1>Dashboard Admin</h1>

@endsection
