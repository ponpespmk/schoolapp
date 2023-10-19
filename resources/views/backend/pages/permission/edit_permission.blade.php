@extends('admin.admin_app', ['title' => 'Edit Permission', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Edit Permission','sub_title' => 'Permission'])

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
                    <form method="POST" id="editPermissionForm" action="{{ route('update.permission') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $permission->id }}">

                        <div class="row">
                            <div class="col-lg-6">
                                {{-- <h5 class="mb-3">Type Name</h5> --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="permissionname" value="{{ $permission->name }}">
                                    <label for="name">Permission Name</label>
                                </div>

                                {{-- <h5 class="mb-3">Selects</h5> --}}
                                <div class="form-floating">
                                    <select class="form-select" name="group_name" id="group_name" aria-label="Floating label select example">
                                        <option value="agent" {{ $permission->group_name == 'agent' ? 'selected' : '' }}>Agent</option>
                                        <option value="amenities" {{ $permission->group_name == 'amenities' ? 'selected' : '' }}>Amenities</option>
                                        <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}>Category</option>
                                        <option value="comment" {{ $permission->group_name == 'comment' ? 'selected' : '' }}>Comment</option>
                                        <option value="history" {{ $permission->group_name == 'history' ? 'selected' : '' }}>History</option>
                                        <option value="post" {{ $permission->group_name == 'post' ? 'selected' : '' }}>Post</option>
                                        <option value="property" {{ $permission->group_name == 'property' ? 'selected' : '' }}>Property</option>
                                        <option value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>Role & Permission</option>
                                        <option value="site" {{ $permission->group_name == 'site' ? 'selected' : '' }}>Site</option>
                                        <option value="smtp" {{ $permission->group_name == 'smtp' ? 'selected' : '' }}>STTP</option>
                                        <option value="state" {{ $permission->group_name == 'state' ? 'selected' : '' }}>State</option>
                                        <option value="Testimonials" {{ $permission->group_name == 'Testimonials' ? 'selected' : '' }}>Testimonials</option>
                                        <option value="type" {{ $permission->group_name == 'type' ? 'selected' : '' }}>Property Type</option>
                                    </select>
                                    <label for="group_name">Group Name</label>
                                </div>
                            </div>

                            <div class="col-9 mt-2">
                                <button type="submit" class="btn btn-info">Save Shanges</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

@endsection

@section('script')

    <script src="/backend/assets/js/code/validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#editPermissionForm').validate({
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
