@extends('admin.admin_app', ['title' => 'Edit Roles in Permission', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Edit Roles in Permission','sub_title' => 'Role & Permission'])

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
                <form method="POST" id="updatePermissionForm" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                        <div class="col-lg-6 mt-2">
                            <h3 class="list-group-item active text-success"><i class="ri-customer-service-2-line me-1"></i> {{ $role->name }}</h3>
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
                                @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
                                @endphp
                                <input class="form-check-input" type="checkbox" value="" id="{{ $group->group_name }}chec" {{ App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $group->group_name }}chec">
                                    {{ $group->group_name }}
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-9">

                            @foreach ($permissions as $permission)
                            <div class="form-check form-checkbox-info mb-2 text-capitalize">
                                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permission[]" id="check{{ $permission->id }}"{{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="check{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label><br>
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
