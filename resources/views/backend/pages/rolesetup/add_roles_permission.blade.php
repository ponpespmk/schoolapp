@extends('admin.admin_app', ['title' => 'Add Roles in Permission', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Add Roles in Permission','sub_title' => 'Role & Permission'])

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
                <div class="card-header">
                <form method="POST" id="addPermissionForm" action="{{ route('role.permission.store') }}">
                    @csrf
                        <div class="col-lg-6">
                            {{-- <h5 class="mb-3">Selects</h5> --}}
                            <div class="form-floating">
                                <select class="form-select" name="role_id" id="role_id" aria-label="Floating label select example">
                                    <option selected="">Select Group</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <label for="role_id">Roles Name</label>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="form-check form-checkbox-success mb-2">
                                <input type="checkbox" class="form-check-input" id="checkmain">
                                <label class="form-check-label" for="checkmain">Permission All</label>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    @foreach ($permission_groups as $group)
                    <div class="row">
                        <div class="col-lg-3">

                            <div class="form-check form-checkbox-warning mb-2 text-capitalize">
                                <input type="checkbox" class="form-check-input" id="{{ $group->group_name }}chec" >
                                <label class="form-check-label" for="{{ $group->group_name }}chec">{{ $group->group_name }}</label>
                            </div>
                        </div>
                        <div class="col-lg-9">

                            @php
                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
                            @endphp

                            @foreach ($permissions as $permission)
                            <div class="form-check form-checkbox-info mb-2 text-capitalize">
                                <input type="checkbox" name="permission[]" class="form-check-input" value="{{ $permission->id }}" id="check{{ $permission->id }}">
                                <label class="form-check-label" for="check{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                        <div class="col-9 mt-2">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                </div> <!-- end card-body -->
                </form>
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

    <script type="text/javascript">

        $('#checkmain').click(function() {

            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked',true);
            } else {
                $('input[type=checkbox]').prop('checked',false);
            }
        });

    </script>

@endsection
