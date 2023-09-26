@extends('admin.admin_dashboard', [
    'title'     => 'Admin Change Password',
    'titlepage' => 'Change Password',
    ])
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="row">
    <div class="col-md-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="profile-widgets py-3">

                    <div class="text-center">
                        <div class="">
                            <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" alt=""
                                class="avatar-lg mx-auto img-thumbnail rounded-circle">
                            <div class="online-circle"><i class="fas fa-circle text-success"></i>
                            </div>
                        </div>

                        <div class="mt-3 ">
                            <a href="#" class="text-reset fw-medium font-size-16">{{ $profileData->name }}</a>
                            <p class="text-body mt-1 mb-1">{{ $profileData->role }}</p>

                            <span class="badge bg-success">Follow Me</span>
                            <span class="badge bg-danger">Message</span>
                        </div>

                        <div class="mt-4">

                            <ui class="list-inline social-source-list">
                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle">
                                            <i class="mdi mdi-facebook"></i>
                                        </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-info">
                                            <i class="mdi mdi-twitter"></i>
                                        </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-danger">
                                            <i class="mdi mdi-google-plus"></i>
                                        </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-pink">
                                            <i class="mdi mdi-instagram"></i>
                                        </span>
                                    </div>
                                </li>
                            </ui>

                        </div>

                        <div class="mt-3 text-start">
                            <p class="font-size-12 text-muted mb-1">Email Address</p>
                            <h6 class="">idsytech@gmail.com</h6>
                        </div>

                        <div class="mt-3 text-start">
                            <p class="font-size-12 text-muted mb-1">Phone number</p>
                            <h6 class="">+62 8126 6583 335</h6>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="col-md-12 col-xl-8">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-0 menu-title">Admin Change Password</h2>

                <!-- Tab panes -->
                <div class="p-3 text-muted">
                    <form method="POST" action="{{ route('admin.update.password') }}" class="form-horizontal">
                        @csrf

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="old_password">Old Password</label>
                                    <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" autocomplete="off">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="new_password">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" autocomplete="off">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Save Shanges
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>


</div>

@endsection

<!-- Styles .css -->
@push('cssStyle')

@endpush

<!-- Script .js -->
@push('jsScript')

@endpush
