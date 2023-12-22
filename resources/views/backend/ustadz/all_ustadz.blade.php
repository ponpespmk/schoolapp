@extends('admin.admin_app', ['title' => 'AllUstadz', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
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
@include('admin.shared/page-title',['page_title' => 'Daftar Ustad/Ustadzah','sub_title' => 'UstadUstadzah'])


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
                <a href="{{ route('add.ustadz') }}" class="btn btn-info">
                    <i class="ri-add-circle-line me-1 fs-16"></i>
                    <span>Tambah Ustadz / Ustadzah</span> </a>
                    <button  type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info-header-modal"><i class="ri-add-circle-line me-1 fs-16"></i>Tambah Ustadz / Ustadzah</button>
            </div>
            <div class="card-body">

                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIK</th>
                            <th>NAMA LENGKAP</th>
                            <th>TGL. BERGABUNG</th>
                            <th>JABATAN UTAMA</th>
                            <th>STATUS DATA</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ustadz as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ strtoupper($item->nama) }} {{ $item->gelar_belakang }}</p>
                            <td>{{ $item->tgl_gabung }}</td>
                            <td>{{ $item->jabatan_utama }}</td>
                            <td data-bs-toggle="popover"
                            data-bs-trigger="hover"
                            data-bs-content="Data wajib dilengkapi jika status masih belum lengkap"
                            title="Penting !">
                                @if(isset($item) && !empty($item->alamat) && !empty($item->pddk_terakhir) && !empty($item->ibu_kandung) && !empty($item->ibu_kandung) && !empty($item->jabatan_utama) && !empty($item->no_sk) && !empty($item->no_rek) && !empty($item->pas_foto))
                                    <p>Semua field sudah terisi.</p>
                                    <span class="badge bg-primary fs-13">Sudah Lengkap</span>
                                @else
                                    <span class="badge bg-danger fs-13">Belum Lengkap</span>@endif
                            </td>
                            <td>
                                @if (Auth::user()->can('ustadz.view'))
                                <a href="#" class="btn btn-info btn-sm" title="Lihat Detil">
                                    <i class="ri-contacts-book-2-line"></i>
                                </a>
                                @endif

                                @if (Auth::user()->can('ustadz.edit'))
                                <a href="{{ route('edit.ustadz',$item->id) }}" class="btn btn-warning btn-sm" title="Ubah Data">
                                    <i class="ri-edit-2-line"></i>
                                </a>
                                @endif

                                @if (Auth::user()->can('ustadz.delete'))
                                <a href="#" class="btn btn-danger btn-sm" id="delete" title="Hapus">
                                    <i class="ri-delete-bin-line "></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Info Header Modal -->
                <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">TAMBAH USTAD / USTADZAH</h4>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" id="myForm" action="{{ route('store.ustadz') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-2">
                                                        <select class="form-select" name="satminkal" id="satminkal" aria-label="Floating label select example">
                                                            <option selected="">Pilih</option>
                                                            <option value="Yayaysan">Yayaysan</option>
                                                            <option value="Pondok">Pondok</option>
                                                            <option value="Panti">Panti</option>
                                                            <option value="Salafiyah">Salafiyah</option>
                                                            <option value="MTSs">MTSs</option>
                                                            <option value="MA">MA</option>
                                                            <option value="MI">MI</option>
                                                            <option value="RQA">RQA</option>
                                                            <option value="Zizwaf">Zizwaf</option>
                                                            <option value="UEP">UEP</option>
                                                        </select>
                                                        <label for="satminkal">SATMINKAL</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <select class="form-select" name="jabatan_utama" id="jabatan_utama" aria-label="Floating label select example">
                                                            <option selected="">Pilih</option>
                                                            <option value="IT">IT</option>
                                                            <option value="Kepala">Kepala</option>
                                                            <option value="Wakil Kepala">Wakil Kepala</option>
                                                            <option value="Sekretaris">Sekretaris</option>
                                                            <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                                                            <option value="Bendahara">Bendahara</option>
                                                            <option value="Wakil Bendahara">Wakil Bendahara</option>
                                                            <option value="Tata Usaha">Tata Usaha</option>
                                                            <option value="Operator">Operator</option>
                                                            <option value="Keuangan">Keuangan</option>
                                                            <option value="Waka Kurikulum">Waka Kurikulum</option>
                                                            <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                                                            <option value="Waka Sarpras">Waka Sarpras</option>
                                                            <option value="Bimbingan Konseling">Bimbingan Konseling</option>
                                                            <option value="Pengasuhan Putra">Pengasuhan Putra</option>
                                                            <option value="Pengasuhan Putri">Pengasuhan Putri</option>
                                                            <option value="Wali Asrama">Wali Asrama</option>
                                                            <option value="Pendamping Wali Asrama">Pendamping Wali Asrama</option>
                                                            <option value="Guru">Guru</option>
                                                        </select>
                                                        <label for="jabatan_utama">Jabatan Utama</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="amenityname" autocomplete="off">
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="amenityname" autocomplete="off">
                                                        <label for="nik">NIK</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="amenityname" autocomplete="off">
                                                        <label for="tempat_lahir">Tempat Laahir</label>
                                                    </div>
                                                    <div class="form-floating mb-2" id="tgl_lahir">
                                                        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Select Date"
                                                        data-provide="datepicker" data-date-autoclose="true"
                                                        data-date-container="#tgl_lahir" autocomplete="off">
                                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <select class="form-select" name="jenkel" id="jenkel" aria-label="Floating label select example">
                                                            <option selected="">Pilih</option>
                                                            <option value="l">Laki-laki</option>
                                                            <option value="p">Perempuan</option>
                                                        </select>
                                                        <label for="jenkel">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="amenityname">
                                                        <label for="no_hp">No.HP/WA</label>
                                                    </div>
                                                    <div class="form-floating" id="tgl_gabung">
                                                        <input type="text" class="form-control" name="tgl_gabung" id="tgl_gabung" placeholder="Select Date"
                                                        data-provide="datepicker" data-date-autoclose="true"
                                                        data-date-container="#tgl_gabung" autocomplete="off">
                                                        <label for="tgl_gabung">Tanggal Bergabung</label>
                                                    </div>
                                                </div>
                                            </div>

                                    </div> <!-- end card-body -->
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="ri-save-line me-1 fs-16 lh-1"></i>Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ri-delete-back-2-line me-1 fs-16"></i> <span>Batal</span></button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

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

<!-- Bootstrap Datepicker Plugin js -->
<script src="/backend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="/backend/assets/js/code/validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    nama: {
                        required : true,
                    },
                    no_kk: {
                        required : true,
                    },
                    nik: {
                        required : true,
                    },
                    tempat_lahir: {
                        required : true,
                    },
                    tgl_lahir: {
                        required : true,
                    },
                    jenkel: {
                        required : true,
                    },
                    no_hp: {
                        required : true,
                    },
                    tgl_gabung: {
                        required : true,
                    },

                },
                messages :{
                    nama: {
                        required : 'nama tidak boleh kosong.!',
                    },
                    no_kk: {
                        required : 'no.kk tidak boleh kosong.!',
                    },
                    nik: {
                        required : 'nik tidak boleh kosong.!',
                    },
                    tempat_lahir: {
                        required : 'tempat lahir tidak boleh kosong.!',
                    },
                    tgl_lahir: {
                        required : 'tanggal lahir tidak boleh kosong.!',
                    },
                    jenkel: {
                        required : 'jenis kelamin tidak boleh kosong.!',
                    },
                    no_hp: {
                        required : 'jenis kelamin tidak boleh kosong.!',
                    },
                    tgl_gabung: {
                        required : 'tanggal bergabung tidak boleh kosong.!',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-floating').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>



@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection
