@extends('admin.admin_dashboard', [
    'title'     => 'Role & Permission',
    'titlepage' => 'Add Permission',
    ])
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="row">
    <div class="col-md-12 col-xl-8">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-0 menu-title">Add Permission</h2>

                <!-- Tab panes -->
                <div class="p-3 text-muted">
                    <form method="POST" action="{{ route('update.permission') }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="id" value="{{ $permission->id }}">

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Permission Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="group_name">Group Name</label>
                                    <select name="group_name" class="form-select" aria-label="Default">
                                        <option selected="">Select Group</option>
                                        <option value="amenities" {{ $permission->group_name == 'amenities' ? 'selected' : '' }}="">Amenities</option>
                                        <option value="type" {{ $permission->group_name == 'type' ? 'selected' : '' }}>Property Type</option>
                                        <option value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>Role & Permission</option>
                                    </select>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endpush