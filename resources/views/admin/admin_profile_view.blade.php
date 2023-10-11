@extends('admin.admin_app', ['title' => 'Starter Page', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    @include('admin.shared/page-title', ['sub_title' => 'Admin', 'page_title' => 'Profile'])

    <h1>Admin Profile</h1>
@endsection
