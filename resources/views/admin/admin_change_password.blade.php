@extends('admin.admin_app', ['title' => 'Admin Change Password', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    {{-- @include('admin.shared/page-title', ['sub_title' => 'Admin', 'page_title' => 'Change Password']) --}}

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
                        <div class="profile-user-img"><img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" alt=""
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
                    <form method="POST" id="addChangePasswordForm" action="{{ route('admin.update.password') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password" placeholder="old_password">
                                    <label for="old_password">Old Password</label>
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" placeholder="new_password">
                                    <label for="new_password">New Password</label>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="new_password_confirmation">
                                    <label for="new_password_confirmation">Confirm New Password</label>
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
