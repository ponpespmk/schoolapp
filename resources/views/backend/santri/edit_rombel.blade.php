@extends('admin.admin_app', ['title' => 'EditRombel', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@endsection

@section('content')
@include('admin.shared/page-title',['page_title' => 'ROMBEL ','sub_title' => 'UstadUstadzah'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="text-uppercase fs-17 text-dark">EDIT ROMBONGAN BELAJAR</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update.rombel', $rombels->id) }}" method="POST" id="myFormRombel">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="form-floating mb-2">
                                <select class="form-select @error('tapel_id') is-invalid @enderror" name="tapel_id" id="tapel_id" aria-label="Floating label select example">
                                    <option value="" disabled selected>Pilih Tahun Ajaran</option>
                                    @foreach($tapels as $tapel)
                                        <option value="{{ $tapel->id }}" {{ (old('tapel_id') == $tapel->id) ? 'selected' : '' }} {{ ($rombels->tapel_id == $tapel->id) ? 'selected' : '' }}>
                                            {{ $tapel->tahun }} - {{ $tapel->semester }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="tapel_id">Tahun Ajaran</label>
                                @error('tapel_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-2">
                                <select class="form-select @error('tingkat') is-invalid @enderror" name="tingkat" id="tingkat" aria-label="Floating label select example">
                                    <option selected=""></option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ (old('tingkat') == $i) ? 'selected' : '' }} {{ ($rombels->tingkat == $i) ? 'selected' : '' }}>
                                            Kelas {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                <label for="tingkat">Tingkat Kelas</label>
                                @error('tingkat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('nama_rombel') is-invalid @enderror" value="{{ old('nama_rombel') }} {{ $rombels->nama_rombel }}" name="nama_rombel" id="nama_rombel" placeholder="amenityname" autocomplete="off">
                                <label for="nama_rombel">Nama Rombel</label>
                                @error('nama_rombel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-2">
                                <select class="form-select @error('ustadz_id') is-invalid @enderror" value="{{ old('ustadz_id') }}" name="ustadz_id" id="ustadz_id" aria-label="Floating label select example">
                                    <option selected=""></option>
                                    @foreach($ustadzs as $ustadz)
                                    <option value="{{ $ustadz->id }}" {{ old('ustadz_id') == $ustadz->id ? 'selected' : '' }} {{ ($rombels->ustadz_id == $ustadz->id) ? 'selected' : '' }}>{{ $ustadz->nama_ustadz }}</option>
                                    @endforeach
                                </select>
                                <label for="ustadz_id">Wali Kelas</label>
                                @error('ustadz_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" value="{{ old('nama_ruangan') }} {{ $rombels->nama_ruangan }}" name="nama_ruangan" id="nama_ruangan" placeholder="amenityname" autocomplete="off">
                                <label for="nama_ruangan">Nama Ruangan</label>
                                @error('nama_ruangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-2">
                                <select class="form-select @error('kurikulum') is-invalid @enderror" name="kurikulum" id="kurikulum" aria-label="Floating label select example">
                                    <option selected=""></option>
                                    <option value="Kurikulum 2013" {{ old('kurikulum') == 'Kurikulum 2013' ? 'selected' : '' }} {{ ($rombels->kurikulum == 'Kurikulum 2013') ? 'selected' : '' }}>Kurikulum 2013</option>
                                    <option value="Kurikulum Mandiri" {{ old('kurikulum') == 'Kurikulum Mandiri' ? 'selected' : '' }} {{ ($rombels->kurikulum == 'Kurikulum Mandiri') ? 'selected' : '' }}>Kurikulum Mandiri</option>
                                    <option value="Merdeka Belajar" {{ old('kurikulum') == 'Merdeka Belajar' ? 'selected' : '' }} {{ ($rombels->kurikulum == 'Merdeka Belajar') ? 'selected' : '' }}>Merdeka Belajar</option>
                                </select>
                                <label for="kurikulum">Kurikulum</label>
                                @error('kurikulum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-9 mt-2 d-flex flex-wrap gap-2 mt-3">
                        <button type="submit" class="btn btn-primary" id="submitBtn"><i class="ri-save-line me-1 fs-16 lh-1"></i>Simpan</button>
                        <a href="{{ route('all.rombel') }}" class="btn btn-warning"><i class="ri-delete-back-2-line me-1 fs-16"></i> <span>Kembali</span> </a>
                    </div>
                </form>


            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->

@endsection

@section('script')

<script>
    $(document).ready(function () {
        // Daftar ID input yang ingin diperiksa
        var inputIdsToCheck = ['tingkat', 'nama_rombel', 'ustadz_id', 'nama_ruangan', 'kurikulum', /* tambahkan input lainnya */];

        // Loop melalui daftar dan cek serta nonaktifkan elemen jika value kosong
        inputIdsToCheck.forEach(function (inputId) {
            checkAndDisableIfEmpty(inputId);
        });

        function checkAndDisableIfEmpty(inputId) {
            var inputValue = $('#' + inputId).val();
            if (inputValue === '' && inputId !== 'ustadz_id') {
                // Nonaktifkan elemen kecuali ustadz_id
                $('#' + inputId).prop('disabled', true);
            }
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#tapel_id, #tingkat, #nama_rombel, #ustadz_id, #nama_ruangan').on('change input', function () {
            if (this.id === 'tingkat') {
                $('#nama_rombel').prop('disabled',  $(this).val() === '').focus();
            } else if (this.id === 'nama_rombel') {
                $('#ustadz_id').prop('disabled',    $(this).val() === '').focus();
            } else if (this.id === 'ustadz_id') {
                $('#nama_ruangan').prop('disabled', $(this).val() === '').focus();
            } else if (this.id === 'nama_ruangan') {
                $('#kurikulum').prop('disabled',    $(this).val() === '');
            }
        });
    });
</script>

@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection
