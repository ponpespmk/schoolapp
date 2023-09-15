@extends('admin.admin_dashboard')
@section('admin')
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

                        <div class="mt-3 text-start">
                            <p class="font-size-12 text-muted mb-1">Email Address</p>
                            <h6 class="">idsytech@gmail.com</h6>
                        </div>

                        <div class="mt-3 text-start">
                            <p class="font-size-12 text-muted mb-1">Phone number</p>
                            <h6 class="">+62 8126 6583 335</h6>
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
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="col-md-12 col-xl-8">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-0 menu-title">Update Admin Profile</h2>

                <!-- Tab panes -->
                <div class="p-3 text-muted">
                    <form method="POST" action="{{ route('admin.profile.store') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        value="{{ $profileData->username }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ $profileData->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ $profileData->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone</label>
                                    <input type="phone" name="phone" class="form-control" id="phone"
                                        value="{{ $profileData->phone }}">
                                </div>
                            </div><!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ $profileData->address }}"></input>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="photo">Photo</label>
                                    <input type="file" class="form-control" name="photo" id="image"></input>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" class="avatar-lg img-thumbnail rounded">
                                </div>
                            </div>
                            <!-- end col -->
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
