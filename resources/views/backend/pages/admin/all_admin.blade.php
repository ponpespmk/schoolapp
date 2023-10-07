@extends('admin.admin_dashboard', [
    'title'     => 'Admin',
    'titlepage' => 'All Admin',
    ])
@section('admin_content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="col-lg-12 mb-3 button-items">
                    <a href="{{ route('add.admin') }}" class="btn btn-info waves-effect waves-light">
                        <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i>
                        Add Admin
                    </a>
                </div>

                <table id="datatable" class="table table-bordered nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alladmin as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="
                                {{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/no_image.png') }}
                                " alt="" class="rounded-circle avatar-sm"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                @foreach ($item->roles as $role)
                                    <span class="badge rounded-pill bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td style="width: 15%; text-align: center;">
                                <a href="{{ route('edit.admin',$item->id) }}" class="btn btn-outline-warning btn-sm edit mt-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('delete.admin',$item->id) }}" class="btn btn-outline-danger btn-sm edit mt-1" title="Delete" id="delete">
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

