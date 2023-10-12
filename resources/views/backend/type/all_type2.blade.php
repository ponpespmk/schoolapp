@extends('admin.admin_dashboard', [
    'title'     => 'Home',
    'titlepage' => 'All Type',
    ])
@section('admin_content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="col-lg-6 mb-3">
                    <a href="{{ route('add.type') }}" class="btn btn-info waves-effect waves-light">
                        <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i>
                        Add Property Type
                    </a>
                </div>

                <h4 class="card-title">Property Type All</h4>
                <p class="card-title-desc">
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Type Name</th>
                            <th>Type Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($types as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->type_name }}</td>
                            <td>{{ $item->type_icon }}</td>
                            <td>
                                <a href="{{ route('edit.type',$item->id) }}" class="btn btn-sm btn-rounded btn-warning waves-effect waves-light">
                                    <i class="bx bxs-edit-alt font-size-16 align-middle me-2"></i>
                                    Edit
                                </a>
                                <a href="{{ route('delete.type',$item->id) }}" class="btn btn-sm btn-rounded btn-danger waves-effect waves-light" id="delete">
                                    <i class="bx bxs-trash font-size-16 align-middle me-2"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection


<!-- Styles .css -->
@push('cssStyle')

    <!-- DataTables -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

<!-- Script .js -->
@push('jsScript')
    <!-- Start Required datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>
    <!-- End DataTable -->
@endpush
