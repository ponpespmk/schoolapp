@extends('admin.admin_dashboard', [
    'title'     => 'Home',
    'titlepage' => 'Add Type',
    ])
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="row">
    <div class="col-md-12 col-xl-8">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-0 menu-title">Add Property Type</h2>

                <!-- Tab panes -->
                <div class="p-3 text-muted">
                    <form method="POST" action="{{ route('store.type') }}" class="form-horizontal">
                        @csrf

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="type_name">Type Name</label>
                                    <input type="text" name="type_name" id="type_name" class="form-control @error('type_name') is-invalid @enderror">
                                    @error('type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="type_icon">Type Icon</label>
                                    <input type="text" name="type_icon" id="type_icon" class="form-control @error('type_icon') is-invalid @enderror">
                                    @error('type_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
