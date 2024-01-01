@extends('admin.admin_app', ['title' => 'AllSantri', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Datatables css -->
    <link href="/backend/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" ustadz="text/css" />
    <link href="/backend/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@include('admin.shared/page-title',['page_title' => 'Data Santri','sub_title' => 'Santri'])
@include('sweetalert::alert')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <p class="mb-3">
                        <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseTambahSantri" aria-expanded="true" aria-controls="collapseTambahSantri"
                        onclick="toggleClass('icon')" id="btntambah">
                        <i id="icon" class="ri-corner-left-up-fill me-1 fs-16"></i> Tambah Santri Baru
                        </a>
                    </p>
                    <div class="collapse" id="collapseTambahSantri" style="">
                        <form action="{{ route('store.santri') }}" method="POST" id="myFormSantri">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select @error('apddk_diikuti') is-invalid @enderror" name="apddk_diikuti" id="apddk_diikuti">
                                            <option disabled selected=""></option>
                                                <optgroup label="SD Sederajat">
                                                    <option class="text-success fst-italic" value="1" {{ old('apddk_diikuti') == '1' ? 'selected' : '' }}>MIS-Alfalah</option>
                                                </optgroup>
                                                <optgroup label="SMP Sederajat">
                                                    <option class="text-success fst-italic" value="2" {{ old('apddk_diikuti') == '2' ? 'selected' : '' }}>Salafiyah</option>
                                                    <option class="text-success fst-italic" value="3" {{ old('apddk_diikuti') == '3' ? 'selected' : '' }}>MTSs-Alfalah</option>
                                                </optgroup>
                                                <optgroup label="SMA Sederajat">
                                                    <option class="text-success fst-italic" value="4" {{ old('apddk_diikuti') == '4' ? 'selected' : '' }}>MAS-Alfalah</option>
                                                </optgroup>
                                        </select>
                                        <label for="apddk_diikuti">PENDIDIKAN YANG DIIKUTI</label>
                                        @error('apddk_diikuti')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <input type="text"
                                               class="form-control @error('nisn') is-invalid @enderror"
                                               value="{{ old('nisn') }}"
                                               name="nisn"
                                               id="nisn"
                                               placeholder="amenityname"
                                               autocomplete="off"
                                               oninput="nisnCount(this)"
                                               maxlength="10"
                                        >
                                        <label for="nisn" id="nisnCount">NISN | <span class="text-info" style="font-weight: normal;">Inputan Hanya Berupa Angka.!</span></label>
                                        @error('nisn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control @error('nama_santri') is-invalid @enderror" value="{{ old('nama_santri') }}" name="nama_santri" id="nama_santri" autocomplete="off">
                                        <label for="nama_santri">NAMA LENGKAP</label>
                                        @error('nama_santri')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select @error('jenkel') is-invalid @enderror" name="jenkel" id="jenkel">
                                            <option selected=""></option>
                                            <option value="l" {{ old('jenkel') == 'l' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="p" {{ old('jenkel') == 'p' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        <label for="jenkel">JENIS KELAMIN</label>
                                        @error('jenkel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" name="tempat_lahir" id="tempat_lahir" autocomplete="off">
                                        <label for="tempat_lahir">TEMPAT LAHIR</label>
                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2" id="date_tgl_lahir">
                                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off" value="{{ old('tgl_lahir') }}">
                                        <label for="tgl_lahir">Tanggal Lahir<strong class="text-danger"> *</strong></label>
                                        @error('tgl_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                            <option selected=""></option>
                                            <option value="yatim" {{ old('kategori') == 'yatim' ? 'selected' : '' }}>Yatim</option>
                                            <option value="piatu" {{ old('kategori') == 'piatu' ? 'selected' : '' }}>Piatu</option>
                                            <option value="yatim piatu" {{ old('kategori') == 'yatim piatu' ? 'selected' : '' }}>Yatim Piatu</option>
                                            <option value="mualaf" {{ old('kategori') == 'mualaf' ? 'selected' : '' }}>Mualaf</option>
                                            <option value="duafa" {{ old('kategori') == 'duafa' ? 'selected' : '' }}>Duafa</option>
                                            <option value="mampu" {{ old('kategori') == 'mampu' ? 'selected' : '' }}>Mampu</option>
                                        </select>
                                        <label for="kategori">KATEGORI</label>
                                        @error('kategori')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <input type="date" class="form-control" name="tgl_aktif" id="tgl_aktif" autocomplete="off" value="{{ old('tgl_aktif') }}">
                                        <label for="tgl_aktif">TANGGAL DITERIMA<strong class="text-danger"> *</strong></label>
                                        @error('tgl_aktif')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 mt-2 d-flex flex-wrap">
                                <button type="submit" class="btn btn-primary" name="confirmButton"><i class="ri-save-line me-1 fs-16 lh-1"></i>Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
                <hr class="border-success">

                <div class="mt-4">
                    <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>NISN</th>
                                <th>TEMPAT/TGL.LAHIR</th>
                                <th>NAMA SAPEND</th>
                                <th>NAMA ASRAMA</th>
                                <th>TINGKAT-ROMBEL</th>
                                <th>KATEGORI</th>
                                <th>BANSOS</th>
                                <th>PIP</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santris as $key => $santri)
                            <tr @if($santri->status_keaktifan == 'nonaktif') class="text-merah"
                                @elseif($santri->status_keaktifan == 'alumni') class="text-hijau"
                                @elseif($santri->status_keaktifan == 'mutasi') class="text-kuning"
                                @endif>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td>{{ strtoupper($santri->nama_santri) }}</td>
                                <td>{{ $santri->nisn }}</td>
                                <td>{{ $santri->tempat_lahir }}, {{ $santri->tgl_lahir }}</td>
                                <td>{{ strtoupper($santri->apddk_diikuti) }}</td>
                                {{-- <td>{{ optional($santri->asrama)->nama_asrama }}</td> --}}

                                <td>
                                    @if(optional($santri->asrama)->nama_asrama === null)

                                    <span class="badge bg-danger fs-13" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Silahkan edit data santri untuk memilih ASRAMA..!" title="Penting !">Belum ada Asrama</span>
                                    @else
                                        {{ optional($santri->asrama)->nama_asrama }}
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if(optional($santri->rombel)->tingkat === null)

                                    <span class="badge bg-danger fs-13" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Silahkan edit data santri untuk memilih TINGKAT/KELAS..!" title="Penting !">Belum ada Kelas</span>
                                    @else
                                        {{ optional($santri->rombel)->tingkat }}
                                    @endif
                                </td>

                                <td class="text-center">
                                    <span class="badge {{
                                        $santri->kategori === 'mampu' ? 'bg-success' : (
                                        $santri->kategori === 'duafa' ? 'bg-purple' : 'bg-warning'
                                        ) }} fs-12">
                                        {{ strtoupper($santri->kategori) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($santri->bansos === 'ya')
                                        <i class="mdi mdi-check-bold text-info fs-19 me-2"></i>
                                    @else
                                        <i class="mdi mdi-close-thick text-danger fs-19 me-2"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($santri->pip === 'ya')
                                        <i class="mdi mdi-check-bold text-info fs-19"></i>
                                    @else
                                        <i class="mdi mdi-close-thick text-danger fs-19"></i>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->can('santri.view'))
                                    <a href="#" class="btn btn-info btn-sm" title="Lihat Detil">
                                        <i class="ri-contacts-book-2-line"></i>
                                    </a>
                                    @endif

                                    @if (Auth::user()->can('santri.edit'))
                                    <a href="{{ route('edit.santri',$santri->id) }}" class="btn btn-warning btn-sm" title="Edit Data">
                                        <i class="ri-edit-2-line"></i>
                                    </a>
                                    @endif

                                    @if (Auth::user()->can('santri.delete'))
                                    <a href="{{ route('delete.santri',$santri->id) }}" class="btn btn-danger btn-sm" id="delete" title="Hapus">
                                        <i class="ri-delete-bin-line "></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
<script src="/backend/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="/backend/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Datatable Demo Aapp js -->
<script src="/backend/assets/js/pages/datatable.init.js"></script>

<script src="/backend/assets/js/code/validate.min.js"></script>

<script>
    function nisnCount(input) {
        // Hanya izinkan angka
        input.value = input.value.replace(/\D/g, '');

        // Update jumlah karakter
        var nisnCount = document.getElementById('nisnCount');
        var currentNisnCount = input.value.length;

        nisnCount.innerHTML = 'NISN      |  <span class="text-primary" style="font-weight: normal;">Max : 10 angka. sisa </span><span class="text-danger">' + (10 - currentNisnCount) + '</span><span class="text-primary" style="font-weight: normal;"> angka</span>';
    }
</script>

<script>
    // Fungsi untuk menunjukkan collapse jika terdapat pesan kesalahan
    function showCollapseOnError() {
        const errorsExist = @json($errors->any());
        const collapseElement = document.getElementById('collapseTambahSantri');

        if (errorsExist) {
            collapseElement.classList.add('show');
        }
    }

    // Panggil fungsi showCollapseOnError saat halaman dimuat
    window.addEventListener('load', showCollapseOnError);
</script>

<script>
    // script untuk Icon Tombol Tambah Santri
    function toggleClass(elementId) {
        var icon = document.getElementById(elementId);

        // Periksa apakah kelas sudah ada
        if (icon.classList.contains('ri-corner-left-up-fill')) {
            // Jika iya, tambahkan ri-corner-left-down-fill dan hapus ri-corner-left-up-fill
            icon.classList.remove('ri-corner-left-up-fill');
            icon.classList.add('ri-corner-left-down-fill');

            btntambah.classList.remove('btn-success');
            btntambah.classList.add('btn-warning');
            btntambah.classList.add('rounded-pill');
        } else {
            // Jika tidak, tambahkan ri-corner-left-up-fill dan hapus ri-corner-left-down-fill
            icon.classList.remove('ri-corner-left-down-fill');
            icon.classList.add('ri-corner-left-up-fill');

            btntambah.classList.remove('btn-warning');
            btntambah.classList.remove('rounded-pill');
            btntambah.classList.add('btn-success');

            // Membersihkan nilai input form
            $('#myFormSantri')[0].reset();

            // Menghilangkan semua kelas is-invalid pada input
            $('#myFormSantri .is-invalid').removeClass('is-invalid');
        }
    }
</script>

<script>
    @if(Session::has('swal'))
        var swalData = @json(Session::get('swal'));

        Swal.fire({
            icon: swalData.type,
            title: swalData.message,
            showCancelButton: true,
            confirmButtonText: swalData.options.confirmButtonText,
            cancelButtonText: swalData.options.cancelButtonText,
            reverseButtons: swalData.options.reverseButtons,
            text: 'Segera Lengkapi Data Santri Ini.!', // Menambahkan teks tambahan
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('edit.santri', ['id' => $santri->id]) }}";
            } else {
                window.location.href = "{{ route('all.santri') }}";
            }
        });
    @endif
</script>

<script>
    $(document).ready(function () {
        // Inisialisasi jQuery Validation pada formulir
        $('#myFormSantri').validate({
            rules: {
                apddk_diikuti   : { required : true },
                nisn            : { required : true },
                nama_santri     : { required : true },
                jenkel          : { required : true },
                tempat_lahir    : { required : true },
                tgl_lahir       : { required : true },
                kategori        : { required : true },
                tgl_aktif       : { required : true }
            },
            messages :{
                apddk_diikuti   : { required : 'aktifitas pendidikan tidak boleh kosong.!' },
                nisn            : { required : 'nisn tidak boleh kosong.!' },
                nama_santri     : { required : 'nama santri tidak boleh kosong.!' },
                jenkel          : { required : 'jenis kelamin tidak boleh kosong.!' },
                tempat_lahir    : { required : 'tempat lahir tidak boleh kosong.!' },
                tgl_lahir       : { required : 'tanggal lahir tidak boleh kosong.!' },
                kategori        : { required : 'kategori tidak boleh kosong.!' },
                tgl_aktif       : { required : 'tanggal diterima tidak boleh kosong.!' }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-floating').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

<script>
    @if(Session::has('toastr'))
        var type = "{{ Session::get('toastr.type', 'info') }}";
        var message = "{{ Session::get('toastr.message') }}";
        toastr[type](message);

        // Tampilkan SweetAlert dengan pilihan
        Swal.fire({
            icon: 'question',
            title: 'Pilih Aksi',
            showCancelButton: true,
            confirmButtonText: 'Edit Sekarang',
            cancelButtonText: 'Edit Nanti',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ Session::get('redirect.edit_now') }}";
            } else {
                window.location.href = "{{ Session::get('redirect.edit_later') }}";
            }
        });
    @endif
</script>

<script>
    $(document).ready(function () {
        // Daftar ID input yang ingin diperiksa
        var inputIdsToCheck = ['nisn', 'nama_santri', 'jenkel', 'tempat_lahir', 'tgl_lahir', 'kategori', 'tgl_aktif'];

        // Loop melalui daftar dan cek serta nonaktifkan elemen jika value kosong
        inputIdsToCheck.forEach(function (inputId) {
            checkAndDisableIfEmpty(inputId);
        });

        function checkAndDisableIfEmpty(inputId) {
            var inputValue = $('#' + inputId).val();
            if (inputValue === '') {
                // Nonaktifkan elemen kecuali ustadz_id
                $('#' + inputId).prop('disabled', true);
            }
        }

        $('#apddk_diikuti, #nisn, #nama_santri, #jenkel, #tempat_lahir, #tgl_lahir, #kategori, #tgl_aktif').on('change input', function () {
            if (this.id === 'apddk_diikuti') {
                $('#nisn').prop('disabled', $(this).val() === '').focus();
            } else if (this.id === 'nisn') {
                $('#nama_santri').prop('disabled', $(this).val() === '');
            } else if (this.id === 'nama_santri') {
                $('#jenkel').prop('disabled', $(this).val() === '');
            } else if (this.id === 'jenkel') {
                $('#tempat_lahir').prop('disabled', $(this).val() === '').focus();
            } else if (this.id === 'tempat_lahir') {
                $('#tgl_lahir').prop('disabled', $(this).val() === '');
            } else if (this.id === 'tgl_lahir') {
                $('#kategori').prop('disabled', $(this).val() === '');
            } else if (this.id === 'kategori') {
                $('#tgl_aktif').prop('disabled', $(this).val() === '').focus();
            }
        });
    });
</script>




@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection
