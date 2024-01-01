@extends('admin.admin_app', ['title' => 'EditSantri', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')

@endsection

@section('content')
@include('admin.shared/page-title',['page_title' => 'Edit Data Santri ','sub_title' => 'Santri'])
<div class="row">
    <div class="col-md-12">
        <div class="card text-bg-secondary">
            <div class="card-body">
                @php
                $tglAktif = \Carbon\Carbon::parse($santris->tgl_aktif);
                $selisih = $tglAktif->diff(\Carbon\Carbon::now());
                @endphp
                <h3>{{ strtoupper($santris->nama_santri) }}</h3>
                <p class="card-text">Tanggal Aktif : {{ \Carbon\Carbon::parse($santris->tgl_aktif)->isoFormat('DD MMMM YYYY') }} | Lama Mondok : {{ $selisih->y }} tahun, {{ $selisih->m }} bulan, {{ $selisih->d }} hari
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
                        <li class="nav-item" role="presentation"><a class="nav-link active" data-bs-toggle="tab" data-bs-target="#santri" type="button" role="tab" aria-controls="home" aria-selected="false" href="#santri" tabindex="-1">DATA SANTRI</a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#user-activities" type="button" role="tab" aria-controls="home" aria-selected="false" href="#user-activities" tabindex="-1">Activities</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="home" aria-selected="true" href="#edit-profile">Settings</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="home" aria-selected="false" href="#projects" tabindex="-1">Projects</a></li>
                    </ul>

                    <div class="tab-content m-0 p-4">
                        <div class="tab-pane active show" id="santri" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="profile-desk">
                                <div class="alert alert-info" role="alert">Kolom dengan tanda (<strong class="text-danger">*</strong>) adalah kolom wajib diisi, kolom tnpa tanda (<strong class="text-danger">*</strong>) opsional yang tidak wajib diisi. Foto bisa langsung Klick Gambar untuk menggantinya.
                                </div>
                                <form method="POST" action="{{ route('update.santri', $santris->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row align-items-center my-2">
                                        {{-- <input type="hidden" name="id" value="{{ $santris->id }}"> --}}
                                        <div class="row">
                                            <div class="col-lg-2 mt-2 text-center position-relative">
                                                <input type="file" name="pas_foto" id="pas_foto" style="display: none;" accept="image/*">
                                                <!-- Container untuk gambar profil -->
                                                <div class="profile-picture-container">
                                                    <label for="pas_foto" style="cursor: pointer;">
                                                        <img id="previewFoto" src="{{ (!empty($santris->pas_foto) && file_exists(public_path('upload/images_santri/foto/'.str_replace(' ', '_', $santris->pas_foto)))) ? url('upload/images_santri/foto/'.str_replace(' ', '_', $santris->pas_foto)) : ($santris->jenkel == 'l' ? url('upload/male_noimage.png') : url('upload/female_noimage.png')) }}" alt="image" class="img-fluid avatar-xl">

                                                    </label>
                                                    <!-- Tombol untuk memilih foto baru -->
                                                    <div class="upload-button">
                                                        <label for="pas_foto" class="upload-icon">
                                                            <i class="ri-camera-fill position-absolute"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control @error('nama_santri') is-invalid @enderror" name="nama_santri" id="nama_santri" autocomplete="off" placeholder="nama_santri" value="{{ old('nama_santri', $santris->nama_santri) }}">
                                                            <label for="nama_santri">Nama Lengkap<strong class="text-danger"> *</strong></label>
                                                            @error('nama_santri')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" autocomplete="off" placeholder="nisn" value="{{ old('nisn', $santris->nisn) }}" maxlength="10">
                                                            <label for="nisn" id="nisnCount">NISN<strong class="text-danger"> *</strong> | <span class="text-info" style="font-weight: normal;">Inputan Hanya Berupa Angka.!</span></label>
                                                            @error('nisn')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control @error('nism') is-invalid @enderror" name="nism" id="nism" autocomplete="off" placeholder="nism" value="{{ old('nism', $santris->nism) }}" maxlength="18">
                                                            <label for="nism" id="nismCount">NISM<strong class="text-danger"> *</strong> | <span class="text-info" style="font-weight: normal;">Inputan Hanya Berupa Angka.!</span></label>
                                                            @error('nism')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" autocomplete="off" placeholder="nik" value="{{ old('nik', $santris->nik) }}" maxlength="16">
                                                            <label for="nik" id="nikCount">NIK<strong class="text-danger"> *</strong> | <span class="text-info" style="font-weight: normal;">Inputan Hanya Berupa Angka.!</span></label>
                                                            @error('nik')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" id="no_kk" autocomplete="off" placeholder="no_kk" value="{{ old('no_kk', $santris->no_kk) }}" maxlength="16">
                                                            <label for="no_kk" id="no_kkCount">NO_KK<strong class="text-danger"> *</strong> | <span class="text-info" style="font-weight: normal;">Inputan Hanya Berupa Angka.!</span></label>
                                                            @error('no_kk')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control @error('no_kip') is-invalid @enderror" name="no_kip" id="no_kip" autocomplete="off" placeholder="no_kip" value="{{ old('no_kip', $santris->no_kip) }}" maxlength="16">
                                                            <label for="no_kip" id="no_kipCount">No.KIP</label>
                                                            @error('no_kip')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-gray-100">
                                    <div class="row align-items-center">
                                        <h5 class="text-uppercase fs-17 text-dark">JENIS KELAMIN<strong class="text-danger"> *</strong></h5>
                                        <div class="col-lg-4">
                                            <div class="mt-1">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="jenkel1" name="jenkel" class="form-check-input" value="l" {{ old('jenkel', $santris->jenkel) == 'l' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="jenkel1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="jenkel2" name="jenkel" class="form-check-input" value="p" {{ old('jenkel', $santris->jenkel) == 'p' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="jenkel2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 mt-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" autocomplete="off" placeholder="tempat_lahir" value="{{ old('tempat_lahir', $santris->tempat_lahir) }}">
                                                <label for="tempat_lahir">Tempat Lahir<strong class="text-danger"> *</strong></label>
                                                @error('tempat_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-floating mt-2">
                                                <input
                                                    type="date"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    name="tgl_lahir"
                                                    id="tgl_lahir"
                                                    value="{{ old('tgl_lahir') ?: (is_null($santris->tgl_lahir) ? '' : \Carbon\Carbon::parse($santris->tgl_lahir)->format('Y-m-d')) }}"
                                                >
                                                <label for="tgl_lahir">Tanggal Lahir<strong class="text-danger"> *</strong></label>
                                                @error('tgl_lahir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('jml_saudara') is-invalid @enderror" name="jml_saudara" id="jml_saudara" autocomplete="off" placeholder="jml_saudara" value="{{ old('jml_saudara', $santris->jml_saudara) }}" maxlength="2">
                                                <label for="jml_saudara">Jml. Saudara | <span class="text-info" style="font-weight: normal;">Inputan Hanya Angka.!</span></label>
                                                <label id="jml_saudaraCount" hidden></label>
                                                @error('jml_saudara')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke" id="anak_ke" autocomplete="off" placeholder="anak_ke" value="{{ old('anak_ke', $santris->anak_ke) }}" maxlength="2">
                                                <label for="anak_ke">Anak Ke | <span class="text-info" style="font-weight: normal;">Inputan Hanya Angka.!</span></label>
                                                <label id="anak_keCount" hidden></label>
                                                @error('anak_ke')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-floating mt-2">
                                                <select class="form-select @error('kwn') is-invalid @enderror" name="kwn" id="kwn">
                                                    <option selected=""></option>
                                                    <option value="wni" {{ old('kwn', $santris->kwn) == 'wni' ? 'selected' : '' }}>WNI</option>
                                                    <option value="wna" {{ old('kwn', $santris->kwn) == 'wna' ? 'selected' : '' }}>WNA</option>
                                                </select>
                                                <label for="kwn">Kewarganegaraan<strong class="text-danger"> *</strong></label>
                                                @error('kwn')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-floating mt-2">
                                                <select class="form-select @error('cita_cita') is-invalid @enderror" name="cita_cita" id="cita_cita">
                                                    <option selected=""></option>
                                                    <option value="agamawan" {{ old('cita_cita', $santris->cita_cita) == 'agamawan' ? 'selected' : '' }}>Agamawan</option>
                                                    <option value="wiraswasta" {{ old('cita_cita', $santris->cita_cita) == 'wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                    <option value="guru/dosen" {{ old('cita_cita', $santris->cita_cita) == 'guru/dosen' ? 'selected' : '' }}>Guru/Dosen</option>
                                                    <option value="tni/polri" {{ old('cita_cita', $santris->cita_cita) == 'tni/polri' ? 'selected' : '' }}>TNI/Polri</option>
                                                    <option value="ilmuwan" {{ old('cita_cita', $santris->cita_cita) == 'ilmuwan' ? 'selected' : '' }}>Ilmuwan</option>
                                                    <option value="dokter" {{ old('cita_cita', $santris->cita_cita) == 'dokter' ? 'selected' : '' }}>Dokter</option>
                                                    <option value="seniman/artis" {{ old('cita_cita', $santris->cita_cita) == 'seniman/artis' ? 'selected' : '' }}>Seniman/Artis</option>
                                                    <option value="pns" {{ old('cita_cita', $santris->cita_cita) == 'pns' ? 'selected' : '' }}>PNS</option>
                                                    <option value="lainnya" {{ old('cita_cita', $santris->cita_cita) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                                <label for="cita_cita">Cita-Cita<strong class="text-danger"> *</strong></label>
                                                @error('cita_cita')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-floating mt-2">
                                                <select class="form-select @error('hobi') is-invalid @enderror" name="hobi" id="hobi">
                                                    <option selected=""></option>
                                                    <option value="olahraga" {{ old('hobi', $santris->hobi) == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                                                    <option value="kesenian" {{ old('hobi', $santris->hobi) == 'kesenian' ? 'selected' : '' }}>Kesenian</option>
                                                    <option value="membaca" {{ old('hobi', $santris->hobi) == 'membaca' ? 'selected' : '' }}>Membaca</option>
                                                    <option value="menulis" {{ old('hobi', $santris->hobi) == 'menulis' ? 'selected' : '' }}>Menulis</option>
                                                    <option value="jalan-jalan" {{ old('hobi', $santris->hobi) == 'jalan-jalan' ? 'selected' : '' }}>Jalan-jalan</option>
                                                    <option value="lainnya" {{ old('hobi', $santris->hobi) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                                <label for="hobi">Hobi<strong class="text-danger"> *</strong></label>
                                                @error('hobi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-floating mt-2">
                                                <select class="form-select @error('keb_khusus') is-invalid @enderror" name="keb_khusus" id="keb_khusus">
                                                    <option selected=""></option>
                                                    <option value="1" {{ old('keb_khusus', $santris->keb_khusus) == '1' ? 'selected' : '' }}>Tidak Ada</option>
                                                    <option value="2" {{ old('keb_khusus', $santris->keb_khusus) == '2' ? 'selected' : '' }}>Lamban Belajar</option>
                                                    <option value="3" {{ old('keb_khusus', $santris->keb_khusus) == '3' ? 'selected' : '' }}>Kesulitan Belajar Spesifik</option>
                                                    <option value="4" {{ old('keb_khusus', $santris->keb_khusus) == '4' ? 'selected' : '' }}>Gangguan Komunikasi</option>
                                                    <option value="5" {{ old('keb_khusus', $santris->keb_khusus) == '5' ? 'selected' : '' }}>Berbakat/Memiliki Kemampuan dan Kecerdasan Luar Biasa</option>
                                                    <option value="6" {{ old('keb_khusus', $santris->keb_khusus) == '6' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                                <label for="keb_khusus">Kebutuhan Khusus<strong class="text-danger"> *</strong></label>
                                                @error('hobi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-floating mt-2">
                                                <select class="form-select @error('keb_disabilitas') is-invalid @enderror" name="keb_disabilitas" id="keb_disabilitas">
                                                    <option selected=""></option>
                                                    <option value="1" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '1' ? 'selected' : '' }}>Tidak Ada</option>
                                                    <option value="2" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '2' ? 'selected' : '' }}>Tuna Netra</option>
                                                    <option value="3" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '3' ? 'selected' : '' }}>Tuna Rungu</option>
                                                    <option value="4" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '4' ? 'selected' : '' }}>Tuna Daksa</option>
                                                    <option value="5" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '5' ? 'selected' : '' }}>Tuna Grahita</option>
                                                    <option value="6" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '6' ? 'selected' : '' }}>Tuna Laras</option>
                                                    <option value="7" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '7' ? 'selected' : '' }}>Tuna Wicara</option>
                                                    <option value="8" {{ old('keb_disabilitas', $santris->keb_disabilitas) == '8' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                                <label for="keb_disabilitas">Kebutuhan Disabilitas<strong class="text-danger"> *</strong></label>
                                                @error('hobi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-start mt-3">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkPhone" {{ old('no_hp', $santris->no_hp) == '+62' || empty(old('no_hp', $santris->no_hp)) ? 'checked=""' : '' }}>
                                                    <label class="form-check-label" for="checkPhone" style="margin-left: 10px;">Tidak memiliki nomor handphone</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="no_hp" data-toggle="input-mask" data-mask-format="+62 000-0000-0000" maxlength="17" value="{{ old('no_hp', $santris->no_hp) }}" autocomplete="off" oninput="checkOperator()">
                                                <label for="nik" id="nikCount">No.HP/WA | <span class="text-info" style="font-weight: normal;">Mengetik dari Angka "8" tanpa "0" di Awal</span></label>
                                                <span class="text-success position-absolute bottom-0 end-0 px-2" id="operator"></span>
                                                @error('no_hp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mt-2">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autocomplete="off" placeholder="email" value="{{ old('email', $santris->email) }}">
                                                <label for="email">Alamat Email</label>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <h5 class="text-uppercase fs-17 text-dark">PENDIDIKAN DAN ASRAMA<strong class="text-danger"> *</strong></h5>
                                        <div class="col-lg-2 mb-2">
                                            <div class="form-floating">
                                                <input
                                                    type="date"
                                                    class="form-control @error('tgl_aktif') is-invalid @enderror"
                                                    name="tgl_aktif"
                                                    id="tgl_aktif"
                                                    value="{{ old('tgl_aktif') ?: (is_null($santris->tgl_aktif) ? '' : \Carbon\Carbon::parse($santris->tgl_aktif)->format('Y-m-d')) }}"
                                                >
                                                <label for="tgl_aktif">Tanggal Diterima<strong class="text-danger"> *</strong></label>
                                                @error('tgl_aktif')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-floating mb-2">
                                                <select class="form-select @error('apddk_diikuti') is-invalid @enderror" name="apddk_diikuti" id="apddk_diikuti">
                                                    <option disabled selected=""></option>
                                                    <optgroup label="SD Sederajat">
                                                        <option class="text-success fst-italic" value="1" {{ old('apddk_diikuti', $santris->apddk_diikuti) == '1' ? 'selected' : '' }}>MIS-Alfalah</option>
                                                    </optgroup>
                                                    <optgroup label="SMP Sederajat">
                                                        <option class="text-success fst-italic" value="2" {{ old('apddk_diikuti', $santris->apddk_diikuti) == '2' ? 'selected' : '' }}>Salafiyah</option>
                                                        <option class="text-success fst-italic" value="3" {{ old('apddk_diikuti', $santris->apddk_diikuti) == '3' ? 'selected' : '' }}>MTSs-Alfalah</option>
                                                    </optgroup>
                                                    <optgroup label="SMA Sederajat">
                                                        <option class="text-success fst-italic" value="4" {{ old('apddk_diikuti', $santris->apddk_diikuti) == '4' ? 'selected' : '' }}>MAS-Alfalah</option>
                                                    </optgroup>
                                                </select>
                                                <label for="apddk_diikuti">Aktivitas Pendidikan yang Diikuti<strong class="text-danger"> *</strong></label>
                                                @error('apddk_diikuti')
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
                                                    <option value="yatim"       {{ old('kategori', $santris->kategori) == 'yatim' ? 'selected' : '' }}>Yatim</option>
                                                    <option value="piatu"       {{ old('kategori', $santris->kategori) == 'piatu' ? 'selected' : '' }}>Piatu</option>
                                                    <option value="yatim piatu" {{ old('kategori', $santris->kategori) == 'yatim piatu' ? 'selected' : '' }}>Yatim Piatu</option>
                                                    <option value="mualaf"      {{ old('kategori', $santris->kategori) == 'mualaf' ? 'selected' : '' }}>Mualaf</option>
                                                    <option value="duafa"       {{ old('kategori', $santris->kategori) == 'duafa' ? 'selected' : '' }}>Duafa</option>
                                                    <option value="mampu"       {{ old('kategori', $santris->kategori) == 'mampu' ? 'selected' : '' }}>Mampu</option>
                                                </select>
                                                <label for="kategori">KATEGORI</label>
                                                @error('kategori')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-floating mb-2">
                                                <select class="form-select @error('bansos') is-invalid @enderror" name="bansos" id="bansos">
                                                    <option selected=""></option>
                                                    <option class="text-primary"  value="ya" {{ old('bansos', $santris->bansos) == 'ya' ? 'selected' : '' }}>Ya</option>
                                                    <option class="text-danger" value="tidak" {{ old('bansos', $santris->bansos) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                                </select>
                                                <label for="bansos">Penerima BANSOS</label>
                                                @error('bansos')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-floating mb-2">
                                                <select class="form-select @error('pip') is-invalid @enderror" name="pip" id="pip">
                                                    <option selected=""></option>
                                                    <option class="text-primary"  value="ya" {{ old('pip', $santris->pip) == 'ya' ? 'selected' : '' }}>Ya</option>
                                                    <option class="text-danger" value="tidak" {{ old('pip', $santris->pip) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                                </select>
                                                <label for="pip">Penerima PIP</label>
                                                @error('pip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <h5 class="text-uppercase fs-17 text-dark">STATUS KEAKTIFAN<strong class="text-danger"> *</strong></h5>
                                            <div class="col-lg-5">
                                                <div class="form-check form-check-inline form-radio-success">
                                                    <input type="radio" id="status_keaktifan1" name="status_keaktifan" class="form-check-input" value="aktif" {{ old('status_keaktifan', $santris->status_keaktifan) == 'aktif' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status_keaktifan1">Aktif</label>
                                                </div>
                                                <div class="form-check form-check-inline form-radio-danger">
                                                    <input type="radio" id="status_keaktifan2" name="status_keaktifan" class="form-check-input" value="nonaktif" {{ old('status_keaktifan', $santris->status_keaktifan) == 'nonaktif' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status_keaktifan2">NON Aktif</label>
                                                </div>
                                                <div class="form-check form-check-inline form-radio-primary">
                                                    <input type="radio" id="status_keaktifan3" name="status_keaktifan" class="form-check-input" value="alumni" {{ old('status_keaktifan', $santris->status_keaktifan) == 'alumni' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status_keaktifan3">Alumni</label>
                                                </div>
                                                <div class="form-check form-check-inline form-radio-warning">
                                                    <input type="radio" id="status_keaktifan4" name="status_keaktifan" class="form-check-input" value="mutasi" {{ old('status_keaktifan', $santris->status_keaktifan) == 'mutasi' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status_keaktifan4">Mutasi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-2" id="nonaktifContainer">
                                                <div class="form-floating">
                                                    <input
                                                        type="date"
                                                        class="form-control @error('tgl_nonaktif') is-invalid @enderror"
                                                        name="tgl_nonaktif"
                                                        id="tgl_nonaktif"
                                                        value="{{ old('tgl_nonaktif') ?: (is_null($santris->tgl_nonaktif) ? '' : \Carbon\Carbon::parse($santris->tgl_nonaktif)->format('Y-m-d')) }}"
                                                        required
                                                    >
                                                    <label for="tgl_nonaktif">Tanggal NON Aktif<strong class="text-danger"> *</strong></label>
                                                    @error('tgl_nonaktif')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2" id="lulusContainer">
                                                <div class="form-floating">
                                                    <input
                                                        type="date"
                                                        class="form-control @error('tgl_lulus') is-invalid @enderror"
                                                        name="tgl_lulus"
                                                        id="tgl_lulus"
                                                        value="{{ old('tgl_lulus') ?: (is_null($santris->tgl_lulus) ? '' : \Carbon\Carbon::parse($santris->tgl_lulus)->format('Y-m-d')) }}"
                                                        required
                                                    >
                                                    <label for="tgl_lulus">Tanggal LULUS<strong class="text-danger"> *</strong></label>
                                                    @error('tgl_lulus')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2" id="mutasiContainer">
                                                <div class="form-floating">
                                                    <input
                                                        type="date"
                                                        class="form-control @error('tgl_mutasi') is-invalid @enderror"
                                                        name="tgl_mutasi"
                                                        id="tgl_mutasi"
                                                        value="{{ old('tgl_mutasi') ?: (is_null($santris->tgl_mutasi) ? '' : \Carbon\Carbon::parse($santris->tgl_mutasi)->format('Y-m-d')) }}"
                                                        required
                                                    >
                                                    <label for="tgl_mutasi">Tanggal MUTASI<strong class="text-danger"> *</strong></label>
                                                    @error('tgl_mutasi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4" id="nadanmContainer">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control @error('alasan_nadanm') is-invalid @enderror" name="alasan_nadanm" id="alasan_nadanm" autocomplete="off" placeholder="alasan_nadanm" value="{{ old('alasan_nadanm', $santris->alasan_nadanm) }}">
                                                    <label for="alasan_nadanm">Alasan Nonaktif/Mutasi</label>
                                                    @error('alasan_nadanm')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9 mt-2 d-flex flex-wrap gap-2 mt-3">
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-line me-1 fs-16 lh-1"></i>Simpan</button>
                                        <a href="{{ route('all.santri') }}" class="btn btn-warning"><i class="ri-delete-back-2-line me-1 fs-16"></i> <span>Kembali</span> </a>
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
                                        <img src="/backend/assets/images/small/small-3.jpg" alt="" height="40" width="60" class="rounded-1">
                                        <img src="/backend/assets/images/small/small-4.jpg" alt="" height="40" width="60" class="rounded-1">
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
                                        <img src="/backend/assets/images/small/small-2.jpg" alt="" height="40" width="60" class="rounded-1">
                                        <img src="/backend/assets/images/small/small-1.jpg" alt="" height="40" width="60" class="rounded-1">
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
                                            <label class="form-label" for="santrizz">About Me</label>
                                            <textarea style="height: 125px;" id="santrizz" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
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
<!-- Input Mask Plugin js -->
<script src="/backend/assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

<script>
    // Mendapatkan nilai radio button yang dipilih saat halaman dimuat
    var selectedValue = $('input[name="status_keaktifan"]:checked').val();

    // Menangani tampilan input sesuai dengan nilai radio button saat halaman dimuat
    if (selectedValue === 'aktif') {
        $('#tgl_nonaktif, #tgl_lulus, #tgl_mutasi, #alasan_nadanm').removeAttr('required');
    } else if (selectedValue === 'nonaktif') {
        $('#tgl_nonaktif, #alasan_nadanm').attr('required', 'required');
        $('#tgl_lulus').removeAttr('required');
    } else if (selectedValue === 'alumni') {
        $('#tgl_lulus, #alasan_nadanm').attr('required', 'required');
        $('#tgl_nonaktif').removeAttr('required');
    } else if (selectedValue === 'mutasi') {
        $('#tgl_mutasi, #alasan_nadanm').attr('required', 'required');
        $('#tgl_nonaktif, #tgl_lulus').removeAttr('required');
    }

    // Mengatur event listener untuk perubahan nilai radio button
    $('input[name="status_keaktifan"]').change(function () {
        // Mendapatkan nilai radio button yang dipilih setelah perubahan
        var selectedValue = $(this).val();

        // Menangani tampilan input sesuai dengan nilai radio button setelah perubahan
        if (selectedValue === 'aktif') {
            $('#tgl_nonaktif, #tgl_lulus, #tgl_mutasi, #alasan_nadanm').removeAttr('required');
        } else if (selectedValue === 'nonaktif') {
            $('#tgl_nonaktif, #alasan_nadanm').attr('required', 'required');
            $('#tgl_lulus, #tgl_mutasi').removeAttr('required');
        } else if (selectedValue === 'alumni') {
            $('#tgl_lulus').attr('required', 'required');
            $('#tgl_nonaktif, #tgl_mutasi, #alasan_nadanm').removeAttr('required');
        } else if (selectedValue === 'mutasi') {
            $('#tgl_mutasi, #alasan_nadanm').attr('required', 'required');
            $('#tgl_nonaktif, #tgl_lulus').removeAttr('required');
        }
    });

</script>

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

    function updateNumberInput(inputId, maxLength) {
        var input = document.getElementById(inputId);
        var countElement = document.getElementById(inputId + 'Count');

        // Hanya izinkan angka
        var sanitizedValue = input.value.replace(/\D/g, '');
        input.value = sanitizedValue;

        // Update jumlah karakter (kecuali untuk jml_saudara dan anak_ke)
        var currentCount = (inputId !== 'jml_saudara' && inputId !== 'anak_ke') ? sanitizedValue.length : '';

        // Hapus elemen dengan ID jml_saudaraCount dan anak_keCount
        if (inputId === 'jml_saudara' || inputId === 'anak_ke') {
            countElement.style.display = 'none';
        } else {
            // Tampilkan JML_SAUDARA* dan ANAK_KE* hanya jika currentCount tidak kosong
            var label = currentCount ? inputId.toUpperCase() + '<strong class="text-danger"> *</strong>' : inputId.toUpperCase();
            var remainingCount = currentCount ? (maxLength - currentCount) : maxLength; // Hitung sisa karakter
            var additionalText = currentCount ? ' | <span class="text-primary" style="font-weight: normal;">Sisa </span><span class="text-danger">' + remainingCount + '</span><span class="text-primary" style="font-weight: normal;"> dari max ' + maxLength + ' angka</span>' : '';

            // Ganti innerHTML hanya jika countElement masih terlihat (tidak disembunyikan)
            if (countElement.style.display !== 'none') {
                countElement.innerHTML = label + additionalText;
            }
        }
    }

    // Panggil fungsi ini pada event seperti oninput atau onchange pada elemen input
    document.getElementById('nisn').addEventListener('input', function() {
        updateNumberInput('nisn', 10);
    });

    document.getElementById('nism').addEventListener('input', function() {
        updateNumberInput('nism', 18);
    });

    document.getElementById('nik').addEventListener('input', function() {
        updateNumberInput('nik', 16);
    });

    document.getElementById('no_kk').addEventListener('input', function() {
        updateNumberInput('no_kk', 16);
    });

    document.getElementById('jml_saudara').addEventListener('input', function() {
        updateNumberInput('jml_saudara');
    });

    document.getElementById('anak_ke').addEventListener('input', function() {
        updateNumberInput('anak_ke');
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkPhone = document.getElementById('checkPhone');
        var noHpInput = document.getElementById('no_hp');
        // Ambil elemen radio button
        var statusKeaktifan = document.getElementsByName('status_keaktifan');

        // Fungsi untuk menangani perubahan status checkbox
        function handleCheckPhoneChange() {
            if (checkPhone.checked) {
                // Jika checkbox checked, disable input dan reset nilainya
                noHpInput.disabled = true;
                noHpInput.value = '';
            } else {
                // Jika checkbox unchecked, aktifkan kembali input
                noHpInput.disabled = false;
            }
        }

        // Tambahkan event listener pada checkbox
        checkPhone.addEventListener('change', handleCheckPhoneChange);

        // Panggil fungsi untuk menangani status awal checkbox
        handleCheckPhoneChange();


        // Tambahkan event listener untuk setiap radio button Status Keaktifan
        statusKeaktifan.forEach(function (radio) {
            radio.addEventListener('change', function () {
                // Periksa nilai radio button yang dipilih
                if (radio.value === 'aktif') {
                    // Jika AKTIF, sembunyikan input keduanya
                    document.getElementById('nonaktifContainer').style.display = 'none';
                    document.getElementById('lulusContainer').style.display = 'none';
                    document.getElementById('mutasiContainer').style.display = 'none';
                    document.getElementById('nadanmContainer').style.display = 'none';
                    document.getElementById('tgl_nonaktif').value = '';
                    document.getElementById('tgl_lulus').value = '';
                    document.getElementById('tgl_mutasi').value = '';
                    document.getElementById('alasan_nadanm').value = '';
                } else if (radio.value === 'nonaktif') {
                    // Jika NON Aktif, tampilkan input tgl_nonaktif dan sembunyikan tgl_lulus
                    document.getElementById('nonaktifContainer').style.display = 'block';
                    document.getElementById('nadanmContainer').style.display = 'block';
                    document.getElementById('lulusContainer').style.display = 'none';
                    document.getElementById('mutasiContainer').style.display = 'none';
                    document.getElementById('tgl_lulus').value = '';
                    document.getElementById('tgl_mutasi').value = '';
                    document.getElementById('alasan_nadanm').value = '';
                } else if (radio.value === 'alumni') {
                    // Jika bukan AKTIF atau NON Aktif, tampilkan tgl_lulus dan sembunyikan tgl_nonaktif
                    document.getElementById('lulusContainer').style.display = 'block';
                    document.getElementById('nonaktifContainer').style.display = 'none';
                    document.getElementById('mutasiContainer').style.display = 'none';
                    document.getElementById('nadanmContainer').style.display = 'none';
                    document.getElementById('tgl_nonaktif').value = '';
                    document.getElementById('tgl_mutasi').value = '';
                    document.getElementById('alasan_nadanm').value = '';
                } else {
                    // Jika bukan AKTIF atau NON Aktif, tampilkan tgl_lulus dan sembunyikan tgl_nonaktif
                    document.getElementById('mutasiContainer').style.display = 'block';
                    document.getElementById('nadanmContainer').style.display = 'block';
                    document.getElementById('nonaktifContainer').style.display = 'none';
                    document.getElementById('lulusContainer').style.display = 'none';
                    document.getElementById('tgl_nonaktif').value = '';
                    document.getElementById('tgl_lulus').value = '';
                }
            });
        });
        // Inisialisasi kondisi awal
        if (document.getElementById('status_keaktifan1').checked) {
            document.getElementById('nonaktifContainer').style.display = 'none';
            document.getElementById('lulusContainer').style.display = 'none';
            document.getElementById('mutasiContainer').style.display = 'none';
            document.getElementById('nadanmContainer').style.display = 'none';
        } else if (document.getElementById('status_keaktifan2').checked) {
            document.getElementById('nonaktifContainer').style.display = 'block';
            document.getElementById('mutasiContainer').style.display = 'block';
            document.getElementById('lulusContainer').style.display = 'none';
            document.getElementById('mutasiContainer').style.display = 'none';
        } else if (document.getElementById('status_keaktifan3').checked) {
            document.getElementById('lulusContainer').style.display = 'block';
            document.getElementById('nonaktifContainer').style.display = 'none';
            document.getElementById('mutasiContainer').style.display = 'none';
            document.getElementById('nadanmContainer').style.display = 'none';
        } else {
            document.getElementById('mutasiContainer').style.display = 'block';
            document.getElementById('nadanmContainer').style.display = 'block';
            document.getElementById('lulusContainer').style.display = 'none';
            document.getElementById('nonaktifContainer').style.display = 'none';
        }
    });
</script>

@endsection

@section('toast-script')
    @include('admin.shared.toast-scripts')
@endsection
