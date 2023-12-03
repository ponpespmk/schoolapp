@extends('admin.admin_app', ['title' => 'All Permission', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Datatables css -->
    <link href="/backend/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@include('admin.shared/page-title',['page_title' => 'All Permission','sub_title' => 'Permission'])


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h4 class="header-title">Scroll - Horizontal</h4>
                <p class="text-muted mb-0">
                    DataTables has the ability to show tables with horizontal scrolling, which is
                    very useful for when you have a wide
                    table, but want to constrain it to a limited horizontal display area.
                </p><br> --}}
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('add.permission') }}" class="btn btn-info"><i class="ri-add-circle-line"></i> Add Permission </a>
                    <a href="{{ route('import.permission') }}" class="btn btn-outline-success"><i class="ri-file-excel-2-line"></i> Exel Import </a>
                    <a href="{{ route('export') }}" class="btn btn-outline-success"><i class="ri-file-excel-2-line"></i> Exel Export</a>
                </div>
            </div>
            <div class="card-body">

                <table id="alternative-page-datatable" class="table table-striped w-100">
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
                                </a>
                                <a href="{{ route('admin.edit.roles',$item->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="ri-edit-2-line"></i>
                                </a>
                                <a href="{{ route('admin.delete.roles',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete">
                                    <i class="ri-delete-bin-line "></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection

@section('script')
<!-- Datatables js -->
<script src="/backend/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
{{-- <script src="/backend/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> --}}
<script src="/backend/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Datatable Demo Aapp js -->
<script src="/backend/assets/js/pages/datatable.init.js"></script>

@endsection
