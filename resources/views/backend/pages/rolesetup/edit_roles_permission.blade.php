@extends('admin.admin_dashboard', [
    'title'     => 'Roles in Permission',
    'titlepage' => 'Edit Roles in Permission',
    ])
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="row">
    <div class="col-md-12 col-xl-12">

        <div class="card text-bg-dark mb-3">
            <div class="card-body">

                <!-- Tab panes -->
                <div class="p-3 text-muted">
                    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="form-horizontal">
                        @csrf

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label text-light" for="role_id">Roles Name</label>
                                    <h3 class="text-warning text-uppercase">{{ $role->name }}</h3>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="checkmain">
                                        <label class="form-check-label text-light" for="checkmain">
                                            Permission All
                                        </label>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- start table --}}

                        <div class="table-responsive">
                            <table class="table mb-0 table-dark text-capitalize">


                        @foreach ($permission_groups as $group)
                                <tbody>
                                    <tr>
                                        <td>
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
                                            @endphp
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" {{ App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $group->group_name }}
                                            </label>
                                        </td>


                                        <td colspan="4">
                                            @foreach ($permissions as $permission)
                                            <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permission[]" id="check{{ $permission->id }}"{{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{-- end table --}}


                        <div class="mt-3">
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

<script type="text/javascript">

    $('#checkmain').click(function() {

        if ($(this).is(':checked')) {
            $('input[type=checkbox]').prop('checked',true);
        } else {
            $('input[type=checkbox]').prop('checked',false);
        }
    });

</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endpush
