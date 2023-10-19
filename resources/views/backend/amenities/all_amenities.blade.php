@extends('admin.admin_app', ['title' => 'All Amenities', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
@include('admin.shared/page-title',['page_title' => 'All Amenities','sub_title' => 'Amenities'])


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
                <a href="{{ route('add.amenitie') }}" class="btn btn-info">
                    <i class="ri-add-circle-line me-1"></i>
                    <span>Add Amenities</span> </a>
            </div>
            <div class="card-body">

                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Amenities Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($amenities as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->amenitis_name }}</td>
                            <td>
                                <a href="{{ route('edit.amenitie',$item->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="ri-edit-2-line"></i>
                                </a>
                                <a href="{{ route('delete.amenitie',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete">
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
