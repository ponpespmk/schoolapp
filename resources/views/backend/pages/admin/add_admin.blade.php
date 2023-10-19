@extends('admin.admin_app', ['title' => 'Add Admin', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Add Admin','sub_title' => 'Admin'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="header-title">Floating labels</h4>
                    <p class="text-muted mb-0">
                        Wrap a pair of <code>&lt;input class="form-control"&gt;</code> and
                        <code>&lt;label&gt;</code> elements in <code>.form-floating</code> to enable
                        floating labels with Bootstrap’s textual form fields. A <code>placeholder</code>
                        is required on each <code>&lt;input&gt;</code> as our method of CSS-only
                        floating labels uses the <code>:placeholder-shown</code> pseudo-element. Also
                        note that the <code>&lt;input&gt;</code> must come first so we can utilize a
                        sibling selector (e.g., <code>~</code>).
                    </p>
                </div> --}}
                <div class="card-body">
                    <form method="POST" id="addAdminForm" action="{{ route('store.admin') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- <h5 class="mb-3">Type Name</h5> --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username">
                                    <label for="username">User Name</label>
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name">
                                    <label for="name">Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="phone" data-toggle="input-mask" data-mask-format="+62 000-0000-0000" maxlength="17">
                                    <label for="phone">Phone</label>
                                    <span class="fs-13 text-muted">Ketikkan Tanpa Angka "0" di Awal</span>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="address">
                                    <label for="address">Address</label>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <h5 class="mb-3">Selects</h5> --}}
                                <div class="form-floating">
                                    <select class="form-select" name="roles" id="role_id" aria-label="Floating label select example">
                                        <option selected="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    </select>
                                    <label for="role_id">Role Name</label>
                                </div>
                            </div>

                            <div class="col-9 mt-2">
                                <button type="submit" class="btn btn-info"><i class="ri-save-line me-1 fs-16 lh-1"></i>Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

@endsection

@section('script')

    <!-- Input Mask Plugin js -->
    <script src="/backend/assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

    <script src="/backend/assets/js/code/validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#addPermissionForm').validate({
                rules: {
                    name: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter Permission Name',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-floating').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

@endsection
