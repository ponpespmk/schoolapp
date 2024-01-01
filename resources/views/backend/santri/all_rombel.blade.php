@extends('admin.admin_app', ['title' => 'AllRombel', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Select2 css -->
    <link href="/backend/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Datepicker css -->
    <link href="/backend/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Datatables css -->
    <link href="/backend/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" ustadz="text/css" />
    <link href="/backend/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="/backend/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="/backend/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('content')
@include('admin.shared/page-title',['page_title' => 'Rombongan Belajar','sub_title' => 'Rombel'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('add.rombel') }}" class="btn btn-info">
                    <i class="ri-add-circle-line me-1 fs-16"></i>
                    <span>Tambah Rombel</span> </a>
                <form action="{{ route('all.rombel') }}" method="get" id="filterForm" class="filter-form">
                    @csrf
                    <div class="col-lg-3 mt-2">
                        <select class="form-select" name="tapel" id="tapelSelect" aria-label="Floating label select example">
                            <option value="">Select</option>
                            @foreach($tapels as $tapel)
                                <option value="{{ $tapel->id }}" {{ $selectedTapel == $tapel->id ? 'selected' : '' }}>
                                    {{ $tapel->tahun }} - {{ $tapel->semester }}
                                </option>
                                @endforeach
                        </select>
                    </div> <!-- end col -->
                </form>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA ROMBEL</th>
                            <th>TINGKAT</th>
                            <th>WALI KELAS</th>
                            <th>NAMA RUANGAN</th>
                            <th>KURIKULUM</th>
                            <th>JUMLAH SANTRI</th>
                            <th>STATUS NAIK/KELULUSAN</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rombels as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->nama_rombel }}</td>
                            <td>{{ $item->tingkat }}</td>
                            {{-- <td>{{ $item->ustadz->nama }}</td> --}}
                            {{-- <td>{{ optional($item->ustadz)->nama ?? '<span class="badge bg-danger fs-13">Belum Lengkap</span>' }}</td> --}}
                            <td>{!! optional($item->ustadz)->nama_ustadz ?? '<span class="badge bg-warning fs-13">Belum ada WALAS</span>' !!}</td>
                            <td>{{ $item->nama_ruangan }}</td>
                            <td>{{ $item->kurikulum }}</td>
                            <td>{{ $item->kurikulum }}</td>
                            <td>{{ $item->kurikulum }}</td>
                            <td>
                                @if (Auth::user()->can('ustadz.view'))
                                <a href="#" class="btn btn-info btn-sm" title="Lihat Detil">
                                    <i class="ri-contacts-book-2-line"></i>
                                </a>
                                @endif

                                @if (Auth::user()->can('rombel.edit'))
                                <a href="{{ route('edit.rombel',$item->id) }}" class="btn btn-warning btn-sm" title="Ubah Data">
                                    <i class="ri-edit-2-line"></i>
                                </a>
                                @endif

                                @if (Auth::user()->can('rombel.delete'))
                                <a href="{{ route('delete.rombel',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Hapus">
                                    <i class="ri-delete-bin-line "></i>
                                </a>
                                @endif
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

<!--  Select2 Plugin Js -->
<script src="/backend/assets/vendor/select2/js/select2.min.js"></script>

<!-- Bootstrap Datepicker Plugin js -->
<script src="/backend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="/backend/assets/js/code/validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tapelSelect = document.getElementById('tapelSelect');

        tapelSelect.addEventListener('change', function () {
            document.getElementById('filterForm').submit();
        });
    });
</script>



@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection
