@extends('admin.admin_dashboard', [
    'title'     => 'Role & Permission',
    'titlepage' => 'All Role Permission',
    ])
@section('admin_content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="col-lg-12 mb-3 button-items">
                    <a href="{{ route('add.permission') }}" class="btn btn-info waves-effect waves-light">
                        <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i>
                        Add Permission
                    </a>
                    <a href="{{ route('import.permission') }}" class="btn btn-rounded btn-outline-success waves-effect waves-light">
                        <i class="bx bx-import font-size-16 align-middle me-2"></i>
                        Import
                    </a>
                    <a href="{{ route('export') }}" class="btn btn-rounded btn-outline-warning waves-effect waves-light">
                        <i class="bx bx-export font-size-16 align-middle me-2"></i>
                        Export
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Permission Name</th>
                                <th>Permission</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @foreach ($item->permissions as $prem)
                                        <span class="badge bg-info-subtle text-info">{{ $prem->name }}</span>
                                    @endforeach
                                </td>
                                <td style="width: 15%; text-align: center;">
                                    <a href="{{ route('admin.edit.roles',$item->id) }}" class="btn btn-outline-warning btn-sm edit mt-1" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('admin.delete.roles',$item->id) }}" class="btn btn-outline-danger btn-sm edit mt-1" title="Delete" id="delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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

