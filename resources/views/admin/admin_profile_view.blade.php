@extends('admin.admin_app', ['title' => 'Admin Profile', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    {{-- @include('admin.shared/page-title', ['sub_title' => 'Admin', 'page_title' => 'Profile']) --}}

    <!-- start page title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="profile-bg-picture"
                style="background-image:url('/backend/assets/images/bg-profile.jpg')">
                <span class="picture-bg-overlay"></span>
                <!-- overlay -->
            </div>
            <!-- meta -->
            <div class="profile-user-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="profile-user-img"><img src="{{ (!empty($profileData->photo)) ? url('upload/images_admin/'.$profileData->photo) : url('upload/no_image.png') }}" alt=""
                                class="avatar-lg rounded-circle"></div>
                        <div class="">
                            <h4 class="mt-4 fs-17 ellipsis">{{ $profileData->name }}</h4>
                            <p class="font-13"> {{ $profileData->role }}</p>
                            <p class="text-muted mb-0"><small>{{ $profileData->address }}</small></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <button type="button" class="btn btn-soft-danger">
                                <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                Edit Profile
                            </button>
                            <a class="btn btn-soft-info" href="#"> <i class="ri-check-double-fill fs-18 me-1 lh-1"></i> Following</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card p-0">
                <div class="card-body">
                    <form method="POST" id="addAdminForm" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- <h5 class="mb-3">Type Name</h5> --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" value="{{ $profileData->username }}">
                                    <label for="username">User Name</label>
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name" value="{{ $profileData->name }}">
                                    <label for="name">Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{ $profileData->email }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="phone" data-toggle="input-mask" data-mask-format="+62 000-0000-0000" maxlength="17" value="{{ $profileData->phone }}">
                                    <label for="phone">Phone</label>
                                    <span class="fs-13 text-muted">Ketikkan Tanpa Angka "0" di Awal</span>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="address" value="{{ $profileData->address }}">
                                    <label for="address">Address</label>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" name="photo" id="image" placeholder="photo">
                                    <label for="image">Photo</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <img id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/images_admin/'.$profileData->photo) : url('upload/no_image.png') }}" alt="image" class="img-fluid rounded" width="120">

                                </div>
                            </div>

                            <div class="col-9 mt-2">
                                <button type="submit" class="btn btn-info"><i class="ri-save-line me-1 fs-16 lh-1"></i>Save Shanges</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    </div>
    <!-- end row -->

@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection

@section('script')
<!-- Input Mask Plugin js -->
<script src="/backend/assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

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
