@extends('admin.admin_app', ['title' => 'AllUstadz', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Datatables css -->
    <link href="/backend/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" ustadz="text/css" />
    <link href="/backend/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@include('admin.shared/page-title',['page_title' => 'Daftar Ustad/Ustadzah','sub_title' => 'UstadUstadzah'])


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <p class="mb-3">
                        <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseTambahUstadz" aria-expanded="true" aria-controls="collapseTambahUstadz"
                        onclick="toggleClass('icon')" id="btntambah">
                        <i id="icon" class="ri-corner-left-up-fill me-1 fs-16"></i> Tambah Data Ustad/Ustadzah
                        </a>
                    </p>
                    <div class="collapse mb-4" id="collapseTambahUstadz" style="">
                        <form action="{{ route('store.ustadz') }}" method="POST" id="myFormUstadz">
                            @csrf
                            <div class="row align-ustadzs-center">
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control @error('nama_ustadz') is-invalid @enderror" name="nama_ustadz" id="nama_ustadz" autocomplete="off" placeholder="nama_ustadz" value="{{ old('nama_ustadz') }}">
                                        <label for="nama_ustadz" id="nama_ustadzCount">Nama Lengkap<strong class="text-danger"> *</strong> | <span class="text-info" style="font-weight: normal;">Tanpa Gelar.!</span></label>
                                        @error('nama_ustadz')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-2">
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
                                <div class="col-lg-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" autocomplete="off" placeholder="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                        <label for="tempat_lahir" id="tempat_lahirCount">Tempat Lahir<strong class="text-danger"> *</strong></label>
                                        @error('tempat_lahir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-2">
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
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" autocomplete="off" placeholder="nik" value="{{ old('nik') }}" maxlength="16">
                                        <label for="nik" id="nikCount">NIK<strong class="text-danger"> *</strong> | <span class="text-info" style="font-weight: normal;">Inputan Hanya Berupa Angka.!</span></label>
                                        @error('nik')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2" id="date_tgl_gabung">
                                        <input type="date" class="form-control" name="tgl_gabung" id="tgl_gabung" autocomplete="off" value="{{ old('tgl_gabung') }}">
                                        <label for="tgl_gabung">Tanggal Bergabung<strong class="text-danger"> *</strong></label>
                                        @error('tgl_gabung')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select @error('satminkal') is-invalid @enderror" name="satminkal" id="satminkal">
                                            <option selected=""></option>
                                            <option value="Yayaysan" {{ old('satminkal') == 'Yayaysan' ? 'selected' : '' }}>Yayaysan</option>
                                            <option value="Pondok" {{ old('satminkal') == 'Pondok' ? 'selected' : '' }}>Pondok</option>
                                            <option value="Panti" {{ old('satminkal') == 'Panti' ? 'selected' : '' }}>Panti</option>
                                            <option value="Salafiyah" {{ old('satminkal') == 'Salafiyah' ? 'selected' : '' }}>Salafiyah</option>
                                            <option value="MTSs" {{ old('satminkal') == 'MTSs' ? 'selected' : '' }}>MTSs</option>
                                            <option value="MA" {{ old('satminkal') == 'MA' ? 'selected' : '' }}>MA</option>
                                            <option value="MI" {{ old('satminkal') == 'MI' ? 'selected' : '' }}>MI</option>
                                            <option value="RQA" {{ old('satminkal') == 'RQA' ? 'selected' : '' }}>RQA</option>
                                            <option value="Zizwaf" {{ old('satminkal') == 'Zizwaf' ? 'selected' : '' }}>Zizwaf</option>
                                            <option value="UEP" {{ old('satminkal') == 'UEP' ? 'selected' : '' }}>UEP</option>
                                        </select>
                                        <label for="satminkal">SATMINKAL</label>
                                        @error('satminkal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select @error('jabatan_utama') is-invalid @enderror" name="jabatan_utama" id="jabatan_utama">
                                            <option selected=""></option>
                                            <option value="IT" {{ old('jabatan_utama') == 'IT' ? 'selected' : '' }}>IT</option>
                                            <option value="Kepala" {{ old('jabatan_utama') == 'Kepala' ? 'selected' : '' }}>Kepala</option>
                                            <option value="Wakil Kepala" {{ old('jabatan_utama') == 'Wakil Kepala' ? 'selected' : '' }}>Wakil Kepala</option>
                                            <option value="Sekretaris" {{ old('jabatan_utama') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                                            <option value="Wakil Sekretaris" {{ old('jabatan_utama') == 'Wakil Sekretaris' ? 'selected' : '' }}>Wakil Sekretaris</option>
                                            <option value="Bendahara" {{ old('jabatan_utama') == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                            <option value="Wakil Bendahara" {{ old('jabatan_utama') == 'Wakil Bendahara' ? 'selected' : '' }}>Wakil Bendahara</option>
                                            <option value="Tata Usaha" {{ old('jabatan_utama') == 'Tata Usaha' ? 'selected' : '' }}>Tata Usaha</option>
                                            <option value="Operator" {{ old('jabatan_utama') == 'Operator' ? 'selected' : '' }}>Operator</option>
                                            <option value="Keuangan" {{ old('jabatan_utama') == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                            <option value="Waka Kurikulum" {{ old('jabatan_utama') == 'Waka Kurikulum' ? 'selected' : '' }}>Waka Kurikulum</option>
                                            <option value="Waka Kesiswaan" {{ old('jabatan_utama') == 'Waka Kesiswaan' ? 'selected' : '' }}>Waka Kesiswaan</option>
                                            <option value="Waka Sarpras" {{ old('jabatan_utama') == 'Waka Sarpras' ? 'selected' : '' }}>Waka Sarpras</option>
                                            <option value="Bimbingan Konseling" {{ old('jabatan_utama') == 'Bimbingan Konseling' ? 'selected' : '' }}>Bimbingan Konseling</option>
                                            <option value="Pengasuhan Putra" {{ old('jabatan_utama') == 'Pengasuhan Putra' ? 'selected' : '' }}>Pengasuhan Putra</option>
                                            <option value="Pengasuhan Putri" {{ old('jabatan_utama') == 'Pengasuhan Putri' ? 'selected' : '' }}>Pengasuhan Putri</option>
                                            <option value="Wali Asrama" {{ old('jabatan_utama') == 'Wali Asrama' ? 'selected' : '' }}>Wali Asrama</option>
                                            <option value="Pendamping Wali Asrama" {{ old('jabatan_utama') == 'Pendamping Wali Asrama' ? 'selected' : '' }}>Pendamping Wali Asrama</option>
                                            <option value="Guru" {{ old('jabatan_utama') == 'Guru' ? 'selected' : '' }}>Guru</option>
                                        </select>
                                        <label for="jabatan_utama">Jabatan Utama</label>
                                        @error('jabatan_utama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="no_hp" data-toggle="input-mask" data-mask-format="+62 000-0000-0000" maxlength="17" value="{{ old('no_hp') }}" autocomplete="off" oninput="checkOperator()">
                                        <label for="nik" id="nikCount">No.HP/WA | <span class="text-info" style="font-weight: normal;">Ketik dari "8" tanpa "0" diawal</span></label>
                                        <span class="text-success position-absolute bottom-0 end-0 px-2" id="operator"></span>
                                        @error('no_hp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 mt-2 d-flex flex-wrap">
                                <button type="submit" class="btn btn-primary" name="confirmButton"><i class="ri-save-line me-1 fs-16 lh-1"></i>Simpan</button>
                            </div>
                        </form>
                    </div>

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
                            @foreach ($ustadzs as $key => $ustadz)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $ustadz->nik }}</td>
                                <td>{{ strtoupper($ustadz->nama_ustadz) }} {{ ', ' . $ustadz->gelar_belakang }}</p>
                                <td>{{ $ustadz->tgl_gabung }}</td>
                                <td>{{ $ustadz->jabatan_utama }}</td>
                                <td>
                                    @if(isset($ustadz) && !empty($ustadz->alamat) && !empty($ustadz->pddk_terakhir) && !empty($ustadz->ibu_kandung) && !empty($ustadz->jabatan_utama) && !empty($ustadz->no_sk))
                                        <span class="badge bg-primary fs-13" data-bs-toggle="popover"
                                        data-bs-trigger="hover"
                                        data-bs-content="Terima kasih sudah melengkapi data ustad/ustadzah!"
                                        title="Data Sudah Lengkap !"><i class="ri-checkbox-circle-fill me-1 fs-16"></i>Sudah Lengkap</span>
                                    @else
                                        <span class="badge bg-danger fs-13" data-bs-toggle="popover"
                                        data-bs-trigger="hover"
                                        data-bs-content="Data wajib dilengkapi"
                                        title="Penting !"><i class=" ri-close-circle-line me-1 fs-16"></i>Belum Lengkap</span>@endif
                                </td>
                                <td>
                                    @if (Auth::user()->can('ustadz.view'))
                                    <a href="#" class="btn btn-info btn-sm" title="Lihat Detil">
                                        <i class="ri-contacts-book-2-line"></i>
                                    </a>
                                    @endif

                                    @if (Auth::user()->can('ustadz.edit'))
                                    <a href="{{ route('edit.ustadz',$ustadz->id) }}" class="btn btn-warning btn-sm" title="Ubah Data">
                                        <i class="ri-edit-2-line"></i>
                                    </a>
                                    @endif

                                    @if (Auth::user()->can('ustadz.delete'))
                                    <a href="{{ route('delete.ustadz',$ustadz->id) }}" class="btn btn-danger btn-sm" id="delete" title="Hapus">
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

<!-- Input Mask Plugin js -->
<script src="/backend/assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>


<!-- Datatable Demo Aapp js -->
<script src="/backend/assets/js/pages/datatable.init.js"></script>

<script src="/backend/assets/js/code/validate.min.js"></script>

<script>
    // Fungsi untuk membatasi input NISN
    function nisnCount(input) {
        // Hanya izinkan angka
        input.value = input.value.replace(/\D/g, '');

        // Update jumlah karakter
        var nisnCount = document.getElementById('nisnCount');
        var currentNisnCount = input.value.length;

        nisnCount.innerHTML = 'NISN      |  <span class="text-primary" style="font-weight: normal;">Max : 10 angka. sisa </span><span class="text-danger">' + (10 - currentNisnCount) + '</span><span class="text-primary" style="font-weight: normal;"> angka</span>';
    }

    // Fungsi untuk Tombol Memunculkan collapse jika terdapat pesan kesalahan
    function showCollapseOnError() {
        const errorsExist = @json($errors->any());
        const collapseElement = document.getElementById('collapseTambahUstadz');

        if (errorsExist) {
            collapseElement.classList.add('show');
        }
    }

    // Panggil fungsi showCollapseOnError saat halaman dimuat
    window.addEventListener('load', showCollapseOnError);

    // Fungsi untuk membatasi input NIK
    function updateNikInput() {
        var input = document.getElementById('nik');
        var sanitizedValue = input.value.replace(/\D/g, '');
        input.value = sanitizedValue;

        var currentCount = sanitizedValue.length;
        var maxLength = 16;

        var countElement = document.getElementById('nikCount');
        countElement.innerHTML = 'NIK<strong class="text-danger"> *</strong> | <span class="text-primary" style="font-weight: normal;">Sisa </span><span class="text-danger">' + (maxLength - currentCount) + '</span><span class="text-primary" style="font-weight: normal;"> dari max ' + maxLength + ' angka</span>';

        countElement.style.display = currentCount ? 'inline-block' : 'none'; // Menggunakan 'inline-block' untuk memastikan tidak ada geser yang terlihat
    }

    // Panggil fungsi updateNikInput saat input NIK diubah
    document.getElementById('nik').addEventListener('input', updateNikInput);

    // Fungsi untuk menangani toggle class dan reset form
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
            $('#myFormUstadz')[0].reset();

            // Menghilangkan semua kelas is-invalid pada input
            $('#myFormUstadz .is-invalid').removeClass('is-invalid');
        }
    }

    // Cek dan nonaktifkan elemen jika value kosong
    function checkAndDisableIfEmpty(inputId) {
        var inputValue = $('#' + inputId).val();
        if (inputValue === '') {
            $('#' + inputId).prop('disabled', true);
        }
    }

    // Daftar ID input yang ingin diperiksa
    var inputIdsToCheck = ['jenkel', 'tempat_lahir', 'tgl_lahir', 'nik', 'tgl_gabung', 'satminkal', 'jabatan_utama', 'no_hp'];

    // Loop melalui daftar dan cek serta nonaktifkan elemen jika value kosong
    inputIdsToCheck.forEach(function (inputId) {
        checkAndDisableIfEmpty(inputId);
    });

    // Fungsi untuk memeriksa dan menonaktifkan elemen jika value kosong
    $('#nama_ustadz, #jenkel, #tempat_lahir, #tgl_lahir, #nik, #tgl_gabung, #satminkal, #jabatan_utama, #no_hp').on('change input', function () {
        if (this.id === 'nama_ustadz') {
            $('#jenkel').prop('disabled', $(this).val() === '');
        } else if (this.id === 'jenkel') {
            $('#tempat_lahir').prop('disabled', $(this).val() === '').focus();
        } else if (this.id === 'tempat_lahir') {
            $('#tgl_lahir').prop('disabled', $(this).val() === '');
        } else if (this.id === 'tgl_lahir') {
            $('#nik').prop('disabled', $(this).val() === '').focus();
        } else if (this.id === 'nik') {
            $('#tgl_gabung').prop('disabled', $(this).val() === '');
        } else if (this.id === 'tgl_gabung') {
            $('#satminkal').prop('disabled', $(this).val() === '');
        } else if (this.id === 'satminkal') {
            $('#jabatan_utama').prop('disabled', $(this).val() === '');
        } else if (this.id === 'jabatan_utama') {
            $('#no_hp').prop('disabled', $(this).val() === '').focus();
        }
    });

    // Validasi form menggunakan jQuery Validation
    $(document).ready(function () {
        $('#myFormUstadz').validate({
            rules: {
                satminkal: { required: true },
                nama_ustadz: { required: true },
                no_kk: { required: true },
                nik: { required: true },
                tempat_lahir: { required: true },
                tgl_lahir: { required: true },
                jenkel: { required: true },
                no_hp: { required: true },
                tgl_gabung: { required: true }
            },
            messages: {
                satminkal: { required: 'satminkal tidak boleh kosong.!' },
                nama_ustadz: { required: 'nama tidak boleh kosong.!' },
                no_kk: { required: 'no.kk tidak boleh kosong.!' },
                nik: { required: 'nik tidak boleh kosong.!' },
                tempat_lahir: { required: 'tempat lahir tidak boleh kosong.!' },
                tgl_lahir: { required: 'tanggal lahir tidak boleh kosong.!' },
                jenkel: { required: 'jenis kelamin tidak boleh kosong.!' },
                no_hp: { required: 'jenis kelamin tidak boleh kosong.!' },
                tgl_gabung: { required: 'tanggal bergabung tidak boleh kosong.!' }
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

    // Menampilkan Toastr dan SweetAlert jika ada sesi toastr
   @if(Session::has('swal'))
        var swalData = @json(Session::get('swal'));

        Swal.fire({
            icon: swalData.type,
            title: swalData.message,
            showCancelButton: true,
            confirmButtonText: swalData.options.confirmButtonText,
            cancelButtonText: swalData.options.cancelButtonText,
            reverseButtons: swalData.options.reverseButtons,
            text: 'Segera Lengkapi Data Ustad/Ustadzah Ini.!', // Menambahkan teks tambahan
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('edit.ustadz', ['id' => $ustadz->id]) }}";
            } else {
                window.location.href = "{{ route('all.ustadz') }}";
            }
        });
    @endif
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



@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection
