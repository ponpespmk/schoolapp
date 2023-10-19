@extends('admin.admin_app', ['title' => 'Add Permission', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Add Permission','sub_title' => 'Permission'])

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
                    <form method="POST" id="addPermissionForm" action="{{ route('store.permission') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- <h5 class="mb-3">Type Name</h5> --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="permissionname">
                                    <label for="name">Permission Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <h5 class="mb-3">Selects</h5> --}}
                                <div class="form-floating">
                                    <select class="form-select" name="group_name" id="group_name" aria-label="Floating label select example">
                                        <option selected="">Select Group</option>
                                        <option value="agent">Agent</option>
                                        <option value="amenities">Amenities</option>
                                        <option value="category">Category</option>
                                        <option value="comment">Comment</option>
                                        <option value="history">History</option>
                                        <option value="post">Post</option>
                                        <option value="property">Property</option>
                                        <option value="role">Role & Permission</option>
                                        <option value="site">Site</option>
                                        <option value="smtp">STTP</option>
                                        <option value="state">State</option>
                                        <option value="Testimonials">Testimonials</option>
                                        <option value="type">Property Type</option>
                                    </select>
                                    <label for="group_name">Group Name</label>
                                </div>
                            </div>

                            <div class="col-9 mt-2">
                                <button type="submit" class="btn btn-info">Save</button>
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
