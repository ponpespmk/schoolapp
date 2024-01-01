@extends('admin.admin_app', ['title' => 'EditUstadz', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Bootstrap Datepicker css -->
    <link href="/backend/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@include('admin.shared/page-title',['page_title' => 'Edit Data Ustad/Ustadzah ','sub_title' => 'UstadUstadzah'])
<div class="row">
    <div class="col-md-12">
        <div class="card border-success border">
            <div class="card-body">
                @php
                $tglGabung = \Carbon\Carbon::parse($ustadzs->tgl_gabung);
                $selisih = $tglGabung->diff(\Carbon\Carbon::now());
                @endphp
                <h3 class="text-success">{{ strtoupper($ustadzs->nama_ustadz) }}, {{ $ustadzs->gelar_belakang }}</h3>
                <p class="card-text">Tanggal Bergabung : {{ \Carbon\Carbon::parse($ustadzs->tgl_gabung)->isoFormat('DD MMMM YYYY') }} | Lama Mengabdi : {{ $selisih->y }} tahun, {{ $selisih->m }} bulan, {{ $selisih->d }} hari
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card p-0">
            <div class="card-body p-0">
                <div class="profile-content">
                    <ul class="nav nav-underline nav-justified gap-0" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ustadz" type="button" role="tab" aria-controls="home" aria-selected="false" href="#ustadz" tabindex="-1">DATA USTADZ</a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#user-activities" type="button" role="tab" aria-controls="home" aria-selected="false" href="#user-activities" tabindex="-1">Activities</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="home" aria-selected="true" href="#edit-profile">Settings</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="home" aria-selected="false" href="#projects" tabindex="-1">Projects</a></li>
                    </ul>

                    <div class="tab-content m-0 p-4">
                        <div class="tab-pane active show" id="ustadz" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="profile-desk">
                                <div class="alert alert-info" role="alert">Kolom dengan tanda (<strong class="text-danger">*</strong>) adalah kolom wajib diisi, kolom tnpa tanda (<strong class="text-danger">*</strong>) opsional yang tidak wajib diisi. <br>Untuk Photo Profil bisa langsung Klick Gambar untuk menggantinya.
                                </div>
                                <form method="POST" action="{{ route('update.ustadz', $ustadzs->id) }}" enctype="multipart/form-data">
                                    <h5 class="text-uppercase fs-17 text-dark">DATA DIRI</h5>
                                    @csrf
                                    <div class="row align-items-center my-2">
                                        <div class="col-lg-2 mt-2 text-center">
                                            <input type="file" name="pas_foto" id="pas_foto" style="display: none;" accept="image/*">
                                            <!-- Container untuk gambar profil -->
                                            <div class="profile-picture-container">
                                                <label for="pas_foto" style="cursor: pointer;">
                                                    <img id="previewFoto" src="{{ (!empty($ustadzs->pas_foto) && file_exists(public_path('upload/images_santri/foto/'.str_replace(' ', '_', $ustadzs->pas_foto)))) ? url('upload/images_santri/foto/'.str_replace(' ', '_', $ustadzs->pas_foto)) : ($ustadzs->jenkel == 'l' ? url('upload/male_noimage.png') : url('upload/female_noimage.png')) }}" alt="image" class="img-fluid avatar-xl">

                                                </label>
                                                <!-- Tombol untuk memilih foto baru -->
                                                <div class="upload-button">
                                                    <label for="pas_foto" class="upload-icon">
                                                        <i class="ri-camera-fill position-absolute"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('gelar_depan') is-invalid @enderror" name="gelar_depan" id="gelar_depan" autocomplete="off" placeholder="gelar_depan" value="{{ $ustadzs->gelar_depan }}">
                                                <label for="gelar_depan">Gelar Depan</label>
                                                <span class="text-light-emphasis">Contoh : Prof. Dr.</span>
                                                @error('gelar_depan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('nama_ustadz') is-invalid @enderror" name="nama_ustadz" id="nama_ustadz" autocomplete="off" placeholder="nama_ustadz" value="{{ $ustadzs->nama_ustadz }}">
                                                <label for="nama_ustadz">Nama Lengkap<strong class="text-danger"> *</strong></label>
                                                <span class="text-white"> a</span>
                                                @error('nama_ustadz')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('gelar_belakang') is-invalid @enderror" name="gelar_belakang" id="gelar_belakang" autocomplete="off" placeholder="gelar_belakang" value="{{ $ustadzs->gelar_belakang }}">
                                                <label for="gelar_belakang">Gelar Belakang</label>
                                                <span class="text-light-emphasis">Contoh : S.Pd M.Pd</span>
                                                @error('gelar_belakang')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-4">
                                        <h5 class="text-uppercase fs-17 text-dark">STATUS KEPEGAWAIAN <strong class="text-danger">*</strong></h5>
                                        <div class="col-lg-4">
                                            <div class="mt-1">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="status_kepegawaian1" name="status_kepegawaian" class="form-check-input" value="PNS" @if($ustadzs->status_kepegawaian == 'PNS') checked @endif>
                                                    <label class="form-check-label" for="status_kepegawaian1">PNS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="status_kepegawaian2" name="status_kepegawaian" class="form-check-input" value="Non PNS" @if($ustadzs->status_kepegawaian == 'Non PNS') checked @endif>
                                                    <label class="form-check-label" for="status_kepegawaian2">Non PNS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="status_kepegawaian3" name="status_kepegawaian" class="form-check-input" value="PPPK" @if($ustadzs->status_kepegawaian == 'PPPK') checked @endif>
                                                    <label class="form-check-label" for="status_kepegawaian3">PPPK</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4" id="nipContainer">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" autocomplete="off" placeholder="nip" value="{{ $ustadzs->nip }}">
                                                <label for="nip">NIP<strong class="text-danger"> *</strong></label>
                                                @error('nip')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4" id="nipppkContainer">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('nipppk') is-invalid @enderror" name="nipppk" id="nipppk" autocomplete="off" placeholder="nipppk" value="{{ $ustadzs->nipppk }}">
                                                <label for="nipppk">NIPPPK<strong class="text-danger"> *</strong></label>
                                                @error('nipppk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" autocomplete="off" placeholder="nik" value="{{ $ustadzs->nik }}">
                                                <label for="nik">NIK<strong class="text-danger"> *</strong></label>
                                                @error('nik')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('npk') is-invalid @enderror" name="npk" id="npk" autocomplete="off" placeholder="npk" value="{{ $ustadzs->npk }}">
                                                <label for="npk">NPK</label>
                                                @error('npk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('nuptk') is-invalid @enderror" name="nuptk" id="nuptk" autocomplete="off" placeholder="nuptk" value="{{ $ustadzs->nuptk }}">
                                                <label for="nuptk">NUPTK</label>
                                                @error('nuptk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" autocomplete="off" placeholder="no_hp" value="{{ $ustadzs->no_hp }}">
                                                <label for="no_hp">No.HP/WA<strong class="text-danger"> *</strong></label>
                                                @error('no_hp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autocomplete="off" placeholder="email" value="{{ $ustadzs->email }}">
                                                <label for="email">Email</label>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" id="npwp" autocomplete="off" placeholder="npwp" value="{{ $ustadzs->npwp }}">
                                                <label for="npwp">NPWP</label>
                                                @error('npwp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-4">
                                        <h5 class="text-uppercase fs-17 text-dark">JENIS KELAMIN<strong class="text-danger"> *</strong></h5>
                                        <div class="col-lg-4">
                                            <div class="mt-1">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="jenkel1" name="jenkel" class="form-check-input" value="L" @if($ustadzs->jenkel == 'L') checked @endif>
                                                    <label class="form-check-label" for="jenkel1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="jenkel2" name="jenkel" class="form-check-input" value="P" @if($ustadzs->jenkel == 'P') checked @endif>
                                                    <label class="form-check-label" for="jenkel2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" autocomplete="off" placeholder="tempat_lahir" value="{{ $ustadzs->tempat_lahir }}">
                                                <label for="tempat_lahir">Tempat Lahir<strong class="text-danger"> *</strong></label>
                                                @error('tempat_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2" id="tgl_lahir">
                                                <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Select Date"
                                                       data-provide="datepicker" data-date-autoclose="true"
                                                       data-date-container="#tgl_lahir" autocomplete="off"
                                                       value="{{ \Carbon\Carbon::parse($ustadzs->tgl_lahir)->format('m/d/Y') }}">
                                                <label for="tgl_lahir">Tanggal Lahir<strong class="text-danger"> *</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <select class="form-select" name="gol_darah" id="gol_darah" aria-label="Floating label select example">
                                                    <option value="-" {{ $ustadzs->gol_darah == '-' ? 'selected' : '' }}>Belum Tau</option>
                                                    <option value="A+" {{ $ustadzs->gol_darah == 'A+' ? 'selected' : '' }}>A+</option>
                                                    <option value="B+" {{ $ustadzs->gol_darah == 'B+' ? 'selected' : '' }}>B+</option>
                                                    <option value="AB+" {{ $ustadzs->gol_darah == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                    <option value="O+" {{ $ustadzs->gol_darah == 'O+' ? 'selected' : '' }}>O+</option>
                                                    <option value="A-" {{ $ustadzs->gol_darah == 'A-' ? 'selected' : '' }}>A-</option>
                                                    <option value="B-" {{ $ustadzs->gol_darah == 'B-' ? 'selected' : '' }}>B-</option>
                                                    <option value="AB-" {{ $ustadzs->gol_darah == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                    <option value="O-" {{ $ustadzs->gol_darah == 'O-' ? 'selected' : '' }}>O-</option>
                                                </select>
                                                <label for="gol_darah">Golongan Darah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                {{-- <input type="text" class="form-control @error('pddk_terakhir') is-invalid @enderror" name="pddk_terakhir" id="pddk_terakhir" autocomplete="off" placeholder="pddk_terakhir" value="{{ $ustadzs->pddk_terakhir }}">
                                                <label for="pddk_terakhir">Pendidikan Terakhir<strong class="text-danger"> *</strong></label>
                                                @error('pddk_terakhir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror --}}

                                                <select class="form-select @error('pddk_terakhir') is-invalid @enderror" name="pddk_terakhir" id="pddk_terakhir" aria-label="Floating label select example">
                                                    <option selected=""></option>
                                                    <option value="SD" {{ old('pddk_terakhir') == 'SD' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'SD') ? 'selected' : '' }}>SD/Sederajat</option>
                                                    <option value="SMP" {{ old('pddk_terakhir') == 'SMP' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'SMP') ? 'selected' : '' }}>SMP/Sederajat</option>
                                                    <option value="SMA" {{ old('pddk_terakhir') == 'SMA' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'SMA') ? 'selected' : '' }}>SMA/Sederajat</option>
                                                    <option value="D1" {{ old('pddk_terakhir') == 'D1' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'D1') ? 'selected' : '' }}>D1</option>
                                                    <option value="D2" {{ old('pddk_terakhir') == 'D2' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'D2') ? 'selected' : '' }}>D2</option>
                                                    <option value="D4" {{ old('pddk_terakhir') == 'D4' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'D4') ? 'selected' : '' }}>D4/S1</option>
                                                    <option value="S2" {{ old('pddk_terakhir') == 'S2' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'S2') ? 'selected' : '' }}>S2</option>
                                                    <option value="S3" {{ old('pddk_terakhir') == 'S3' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'S3') ? 'selected' : '' }}>S3</option>
                                                    <option value="M1" {{ old('pddk_terakhir') == 'M1' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'M1') ? 'selected' : '' }}>M1</option>
                                                    <option value="M2" {{ old('pddk_terakhir') == 'M2' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'M2') ? 'selected' : '' }}>M2</option>
                                                    <option value="M3" {{ old('pddk_terakhir') == 'M3' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == 'M3') ? 'selected' : '' }}>M3</option>
                                                    <option value="-" {{ old('pddk_terakhir') == '-' ? 'selected' : '' }} {{ ($ustadzs->pddk_terakhir == '-') ? 'selected' : '' }}>Tidak Memiliki Pendidikan Formal</option>
                                                </select>
                                                <label for="pddk_terakhir">Pendidikan Terakhir</label>
                                                @error('pddk_terakhir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" id="prodi" autocomplete="off" placeholder="prodi" value="{{ $ustadzs->prodi }}">
                                                <label for="prodi">Prodi Terakhir</label>
                                                @error('prodi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2" id="tgl_ijazah">
                                                <input type="text" class="form-control" name="tgl_ijazah" id="tgl_ijazah" placeholder="Select Date"
                                                       data-provide="datepicker" data-date-autoclose="true"
                                                       data-date-container="#tgl_ijazah" autocomplete="off"
                                                       value="{{ \Carbon\Carbon::parse($ustadzs->tgl_ijazah)->format('m/d/Y') }}">
                                                <label for="tgl_ijazah">Tanggal Ijazah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-4">
                                        <h5 class="text-uppercase fs-17 text-dark">INFORMASI KELUARGA<strong class="text-danger">*</strong></h5>
                                        <div class="col-lg-4 mt-1">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('ibu_kandung') is-invalid @enderror" name="ibu_kandung" id="ibu_kandung" autocomplete="off" placeholder="ibu_kandung" value="{{ $ustadzs->ibu_kandung }}">
                                                <label for="ibu_kandung">Nama Ibu Kandung<strong class="text-danger"> *</strong></label>
                                                @error('ibu_kandung')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-4">
                                        <h5 class="text-uppercase fs-17 text-dark">STATUS PERKAWINAN<strong class="text-danger"> *</strong></h5>
                                        <div class="col-lg-4">
                                            <div class="mt-1">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="status_perkawinan1" name="status_perkawinan" class="form-check-input" value="Kawin" @if($ustadzs->status_perkawinan == 'Kawin') checked @endif>
                                                    <label class="form-check-label" for="status_perkawinan1">Kawin</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="status_perkawinan2" name="status_perkawinan" class="form-check-input" value="Belum Kawin" @if($ustadzs->status_perkawinan == 'Belum Kawin') checked @endif>
                                                    <label class="form-check-label" for="status_perkawinan2">Belum Kawin</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="status_perkawinan3" name="status_perkawinan" class="form-check-input" value="Duda/Janda" @if($ustadzs->status_perkawinan == 'Duda/Janda') checked @endif>
                                                    <label class="form-check-label" for="status_perkawinan3">Duda/Janda</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 " id="nama_suami_istriContainer">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('nama_suami_istri') is-invalid @enderror" name="nama_suami_istri" id="nama_suami_istri" autocomplete="off" placeholder="nama_suami_istri" value="{{ $ustadzs->nama_suami_istri }}">
                                                <label for="nama_suami_istri">Nama Suami/Istri</label>
                                                @error('nama_suami_istri')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4" id="jml_anakContainer">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('jml_anak') is-invalid @enderror" name="jml_anak" id="jml_anak" autocomplete="off" placeholder="jml_anak" value="{{ $ustadzs->jml_anak }}">
                                                <label for="jml_anak">Jumlah Anak</label>
                                                @error('jml_anak')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4" id="no_kkContainer">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" id="no_kk" autocomplete="off" placeholder="no_kk" value="{{ $ustadzs->no_kk }}">
                                                <label for="no_kk">Nomor KK<strong class="text-danger"> *</strong></label>
                                                @error('no_kk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-4">
                                        <h5 class="text-uppercase fs-17 text-dark">DATA BANK</h5>
                                        <div class="col-lg-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('no_rek') is-invalid @enderror" name="no_rek" id="no_rek" autocomplete="off" placeholder="no_rek" value="{{ $ustadzs->no_rek }}">
                                                <label for="no_rek">Nomor Rekening</label>
                                                @error('no_rek')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('nama_rek') is-invalid @enderror" name="nama_rek" id="nama_rek" autocomplete="off" placeholder="nama_rek" value="{{ $ustadzs->nama_rek }}">
                                                <label for="nama_rek">Nama Rekening</label>
                                                @error('nama_rek')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" id="nama_bank" autocomplete="off" placeholder="nama_bank" value="{{ $ustadzs->nama_bank }}">
                                                <label for="nama_bank">Nama BANK</label>
                                                @error('nama_bank')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('cabang_bank') is-invalid @enderror" name="cabang_bank" id="cabang_bank" autocomplete="off" placeholder="cabang_bank" value="{{ $ustadzs->cabang_bank }}">
                                                <label for="cabang_bank">Cabang BANK</label>
                                                @error('cabang_bank')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9 mt-2 d-flex flex-wrap gap-2 mt-3">
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-line me-1 fs-16 lh-1"></i>Simpan</button>
                                        <a href="{{ route('all.ustadz') }}" class="btn btn-warning"><i class="ri-delete-back-2-line me-1 fs-16"></i> <span>Kembali</span> </a>
                                    </div>
                                </form>
                            </div> <!-- end profile-desk -->
                        </div> <!-- about-me -->

                        <!-- Activities -->
                        <div id="user-activities" class="tab-pane" role="tabpanel">
                            <div class="timeline-2">
                                <div class="time-item">
                                    <div class="item-info ms-3 mb-3">
                                        <div class="text-muted">5 minutes ago</div>
                                        <p><strong><a href="#" class="text-info">John
                                                    Doe</a></strong>Uploaded a photo</p>
                                        <img src="assets/images/small/small-3.jpg" alt="" height="40" width="60" class="rounded-1">
                                        <img src="assets/images/small/small-4.jpg" alt="" height="40" width="60" class="rounded-1">
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info ms-3 mb-3">
                                        <div class="text-muted">30 minutes ago</div>
                                        <p><a href="" class="text-info">Lorem</a> commented your
                                            post.
                                        </p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit.
                                                Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                        </p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info ms-3 mb-3">
                                        <div class="text-muted">59 minutes ago</div>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting
                                            with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit.
                                                Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                        </p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info ms-3 mb-3">
                                        <div class="text-muted">5 minutes ago</div>
                                        <p><strong><a href="#" class="text-info">John
                                                    Doe</a></strong> Uploaded 2 new photos</p>
                                        <img src="assets/images/small/small-2.jpg" alt="" height="40" width="60" class="rounded-1">
                                        <img src="assets/images/small/small-1.jpg" alt="" height="40" width="60" class="rounded-1">
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info ms-3 mb-3">
                                        <div class="text-muted">30 minutes ago</div>
                                        <p><a href="" class="text-info">Lorem</a> commented your
                                            post.
                                        </p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit.
                                                Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                        </p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info ms-3 mb-3">
                                        <div class="text-muted">59 minutes ago</div>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting
                                            with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit.
                                                Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- settings -->
                        <div id="edit-profile" class="tab-pane" role="tabpanel">
                            <div class="user-profile-content">
                                <form>
                                    <div class="row row-cols-sm-2 row-cols-1">
                                        <div class="mb-2">
                                            <label class="form-label" for="FullName">Full
                                                Name</label>
                                            <input type="text" value="John Doe" id="FullName" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="Email">Email</label>
                                            <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="web-url">Website</label>
                                            <input type="text" value="Enter website url" id="web-url" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="Username">Username</label>
                                            <input type="text" value="john" id="Username" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="Password">Password</label>
                                            <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="RePassword">Re-Password</label>
                                            <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label" for="ustadz">About Me</label>
                                            <textarea style="height: 125px;" id="ustadz" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i class="ri-save-line me-1 fs-16 lh-1"></i> Save</button>
                                </form>
                            </div>
                        </div>

                        <!-- profile -->
                        <div id="projects" class="tab-pane" role="tabpanel">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Velonic Admin</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-info">Work
                                                            in Progress</span></td>
                                                    <td>Techzaa</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Velonic Frontend</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-success">Pending</span>
                                                    </td>
                                                    <td>Techzaa</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Velonic Admin</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-pink">Done</span>
                                                    </td>
                                                    <td>Techzaa</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Velonic Frontend</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-purple">Work
                                                            in Progress</span></td>
                                                    <td>Techzaa</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Velonic Admin</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-warning">Coming
                                                            soon</span></td>
                                                    <td>Techzaa</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end row -->

@endsection

@section('script')

<!-- Bootstrap Datepicker Plugin js -->
<script src="/backend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- JavaScript untuk menangani perubahan pada input file -->
<script>
    // Ambil elemen input file, elemen gambar, dan form
    var inputFotoBaru = document.getElementById('pas_foto');
    var previewFoto = document.getElementById('previewFoto');
    var formGantiFoto = document.getElementById('formGantiFoto');

    // Tambahkan event listener untuk perubahan pada input file
    inputFotoBaru.addEventListener('change', function() {
        // Cek apakah ada file yang dipilih
        if (inputFotoBaru.files && inputFotoBaru.files[0]) {
            // Baca file dan set sebagai sumber gambar
            var reader = new FileReader();
            reader.onload = function(e) {
                previewFoto.src = e.target.result;
            };
            reader.readAsDataURL(inputFotoBaru.files[0]);
        }
    });
</script>

<script>
    const exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = `New message to ${recipient}`
        modalBodyInput.value = recipient
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen radio button
        var statusKepegawaian = document.getElementsByName('status_kepegawaian');
        var statusPerkawinan = document.getElementsByName('status_perkawinan');
        // Ambil elemen input nama_suami_istri dan jml_anak
        var namaSuamiIstriInput = document.getElementById('nama_suami_istri');
        var jmlAnakInput = document.getElementById('jml_anak');

        // Tambahkan event listener untuk setiap radio button Status Kepegawaian
        statusKepegawaian.forEach(function (radio) {
            radio.addEventListener('change', function () {
                // Periksa nilai radio button yang dipilih
                if (radio.value === 'PNS') {
                    // Jika PNS dipilih, tampilkan input NIP dan sembunyikan input NIPPPK
                    document.getElementById('nipContainer').style.display = 'block';
                    document.getElementById('nipppkContainer').style.display = 'none';
                } else if (radio.value === 'PPPK') {
                    // Jika PPPK dipilih, tampilkan input NIPPPK dan sembunyikan input NIP
                    document.getElementById('nipContainer').style.display = 'none';
                    document.getElementById('nipppkContainer').style.display = 'block';
                } else {
                    // Jika bukan PNS atau PPPK, sembunyikan keduanya
                    document.getElementById('nipContainer').style.display = 'none';
                    document.getElementById('nipppkContainer').style.display = 'none';
                }
            });
        });

        // Tambahkan event listener untuk setiap radio button Status Perkawinan
        statusPerkawinan.forEach(function (radio) {
            radio.addEventListener('change', function () {
                // Periksa nilai radio button yang dipilih
                if (radio.value === 'Belum Kawin') {
                    // Jika Belum Kawin dipilih, sembunyikan input Nama Suami & Jumlah Anak
                    document.getElementById('nama_suami_istriContainer').style.display = 'none';
                    document.getElementById('jml_anakContainer').style.display = 'none';

                    // Hapus nilai dari input Nama Suami/Istri dan Jumlah Anak
                    namaSuamiIstriInput.value = '';
                    jmlAnakInput.value = '';
                } else {
                    // Jika bukan Belum Kawin munculkan keduanya
                    document.getElementById('nama_suami_istriContainer').style.display = 'block';
                    document.getElementById('jml_anakContainer').style.display = 'block';
                }
            });
        });

        // Inisialisasi kondisi awal
        if (document.getElementById('status_perkawinan2').checked) {
            document.getElementById('nama_suami_istriContainer').style.display = 'none';
            document.getElementById('jml_anakContainer').style.display = 'none';
            // Hapus nilai dari input Nama Suami/Istri dan Jumlah Anak
            namaSuamiIstriInput.value = '';
            jmlAnakInput.value = '';
        } else {
            document.getElementById('nama_suami_istriContainer').style.display = 'block';
            document.getElementById('jml_anakContainer').style.display = 'block';
        }

        // Inisialisasi kondisi awal
        if (document.getElementById('status_kepegawaian1').checked) {
            document.getElementById('nipContainer').style.display = 'block';
            document.getElementById('nipppkContainer').style.display = 'none';
        } else if (document.getElementById('status_kepegawaian3').checked) {
            document.getElementById('nipContainer').style.display = 'none';
            document.getElementById('nipppkContainer').style.display = 'block';
        } else {
            document.getElementById('nipContainer').style.display = 'none';
            document.getElementById('nipppkContainer').style.display = 'none';
        }
    });
</script>
@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection
