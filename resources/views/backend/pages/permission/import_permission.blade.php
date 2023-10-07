@extends('admin.admin_dashboard', [
    'title'     => 'Role & Permission',
    'titlepage' => 'Import Permission',
    ])
@section('admin_content')

<div class="row">
    <div class="col-md-12 col-xl-8">

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 mb-3 button-items">
                    <a href="{{ route('export') }}" class="btn btn-rounded btn-outline-warning waves-effect waves-light">
                        <i class="bx bx-cloud-download font-size-16 align-middle me-2"></i>
                        Download Xlsx
                    </a>
                </div>

                <!-- Tab panes -->
                <div class="p-3 text-muted">
                    <form method="POST" action="{{ route('import') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="import_file">Xlsx File Import</label>
                                    <input type="file" name="import_file" id="import_file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Upload
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
