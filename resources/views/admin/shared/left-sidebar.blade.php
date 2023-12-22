<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="#" class="logo logo-light">
        <span class="logo-lg">
            <img src="/backend/assets/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/backend/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="#" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/backend/assets/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="/backend/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    {{-- <span class="badge bg-success float-end">5+</span> --}}
                    <span> Dashboard </span>
                </a>
            </li>

<!--- LETTER -->
            @if (Auth::user()->can('labelletter.menu'))
            <li class="side-nav-title">MANAJEMEN SURAT</li>
            @endif

            <!--- Surat -->
            @if (Auth::user()->can('letter.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#letters" aria-expanded="false" aria-controls="letters"
                        class="side-nav-link">
                        <i class="ri-mail-send-fill"></i>
                        <span> Transaksi Surat </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="letters">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('in.letter'))
                            <li>
                                <a href="{{ route('all.type') }}">Surat Masuk</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('out.letter'))
                            <li>
                                <a href="{{ route('add.type') }}">Surat Keluar</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Surat -->

            <!--- Buku Agenda -->
            @if (Auth::user()->can('agendabook.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#agendabook" aria-expanded="false" aria-controls="agendabook"
                        class="side-nav-link">
                        <i class="ri-book-mark-line"></i>
                        <span> Buku Agenda </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="agendabook">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('in.agendabook'))
                            <li>
                                <a href="{{ route('add.type') }}">Agenda Surat Masuk</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('out.agendabook'))
                            <li>
                                <a href="{{ route('add.type') }}">Agenda Surat Keluar</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Buku Agenda -->

            <!--- Galeri File -->
            @if (Auth::user()->can('fileletter.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#fileletters" aria-expanded="false" aria-controls="fileletters"
                        class="side-nav-link">
                        <i class="ri-folder-5-line"></i>
                        <span> Galeri File </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="fileletters">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('in.fileletter'))
                            <li>
                                <a href="{{ route('add.type') }}">File Surat Masuk</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('out.fileletter'))
                            <li>
                                <a href="{{ route('add.type') }}">File Surat Keluar</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Galeri File -->

            <!--- Klasifikasi -->
            @if (Auth::user()->can('klasifikasi.menu'))
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="ri-refresh-line"></i>
                        <span> Klasifikasi </span>
                    </a>
                </li>
            @endif
            <!--- End Klasifikasi -->
<!--- END LETTER -->

<!--- FINANCE -->
            @if (Auth::user()->can('labelfinence.menu'))
            <li class="side-nav-title">MANAJEMEN KEUANGAN</li>
            @endif

            <!--- Payment -->
            @if (Auth::user()->can('payment.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#payments" aria-expanded="false" aria-controls="payments"
                        class="side-nav-link">
                        <i class="ri-paypal-fill"></i>
                        <span> Pembayaran </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="payments">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('detil.payment'))
                            <li>
                                <a href="{{ route('all.type') }}">Rincian Tagihan</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('transaction.payment'))
                            <li>
                                <a href="{{ route('add.type') }}">Transaksi Pembayaran</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Payment -->

            <!--- Savings Student -->
            @if (Auth::user()->can('savings.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#savingstudents" aria-expanded="false" aria-controls="savingstudents"
                        class="side-nav-link">
                        <i class="ri-wallet-3-line"></i>
                        <span> Tabungan Siswa </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="savingstudents">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('credit.savings'))
                            <li>
                                <a href="{{ route('all.type') }}">Kredit</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('debet.savings'))
                            <li>
                                <a href="{{ route('add.type') }}">Debit</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

            @endif
            <!--- End Savings Student -->

            <!--- School Finances -->
            @if (Auth::user()->can('schoolfinance.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#schoolfinance" aria-expanded="false" aria-controls="schoolfinance"
                        class="side-nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span> Keuangan Sekolah </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="schoolfinance">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('income'))
                            <li>
                                <a href="{{ route('all.type') }}">Pemasukan</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('expenditure'))
                            <li>
                                <a href="{{ route('add.type') }}">Pengeluaran</a>
                            </li>
                            @endif
                            @if (Auth::user()->can('loan'))
                            <li>
                                <a href="{{ route('add.type') }}">Pinjaman</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

            @endif
            <!--- End School Finances -->

            <!--- Cetak Laporan -->
            @if (Auth::user()->can('financereport.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#financereport" aria-expanded="false" aria-controls="financereport"
                        class="side-nav-link">
                        <i class="ri-printer-line"></i>
                        <span> Cetak Laporan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="financereport">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('paymenttransaction.report'))
                            <li>
                                <a href="{{ route('all.type') }}">Transaksi Pembayaran</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('depositwithdrawal.report'))
                            <li>
                                <a href="{{ route('add.type') }}">Setor & Tarik Tunai</a>
                            </li>
                            @endif
                            @if (Auth::user()->can('schoolfinance.report'))
                            <li>
                                <a href="{{ route('add.type') }}">Keuangan Sekolah</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

            @endif
            <!--- End Cetak Laporan -->
<!--- END FINANCE -->

<!--- KELOLA DATA -->
            @if (Auth::user()->can('labelmanagedata.menu'))
            <li class="side-nav-title">KELOLA DATA</li>
            @endif

            <!--- Kelembagaan -->
            @if (Auth::user()->can('institutional.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#institutionals" aria-expanded="false" aria-controls="institutionals"
                        class="side-nav-link">
                        <i class="ri-building-line"></i>
                        <span> Kelembagaan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="institutionals">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('profil.institutional'))
                            <li>
                                <a href="{{ route('all.type') }}">Profil</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('leader.institutional'))
                            <li>
                                <a href="{{ route('add.type') }}">Mudir / Pimpinan</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Kelembagaan -->

            <!--- Ustad / Ustadzah -->
            @if (Auth::user()->can('ustadz.menu'))
                <li class="side-nav-item">
                    <a href="{{ route('all.ustadz') }}" class="side-nav-link">
                        <i class="ri-group-2-fill"></i>
                        <span class="badge bg-success float-end">{{DB::table('ustadzs')->count()}}</span>
                        <span> Ustad / Ustadzah </span>
                    </a>
                </li>
            @endif
            <!--- End Ustad / Ustadzah -->

            <!--- Santri -->
            @if (Auth::user()->can('students.menu'))
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                        <i class="ri-map-pin-user-line"></i>
                        <span> Santri </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultiLevel">
                        <ul class="side-nav-second-level">

                            @if (Auth::user()->can('list.students'))
                            <li>
                                <a href="javascript: void(0);">Data Santri</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('mutation.students'))
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">
                                    <span> Mutasi </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarSecondLevel">
                                    <ul class="side-nav-third-level">
                                        <li>
                                            <a href="javascript: void(0);">Mutasi Masuk</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Mutasi Keluar</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endif

                            @if (Auth::user()->can('academic.students'))
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                                    <span> Akademik </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarThirdLevel">
                                    <ul class="side-nav-third-level">
                                        <li>
                                            <a href="javascript: void(0);">Kenaikan Kelas</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Kelulusan</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Daftar Alumni</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endif

                            @if (Auth::user()->can('rombel.students'))
                            <li>
                                <a href="javascript: void(0);">Rombongan Belajar</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Santri -->
<!--- END KELOLA DATA -->

            <!--- Type -->
            @if (Auth::user()->can('type.menu'))

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages"
                        class="side-nav-link">
                        <i class="ri-pages-line"></i>
                        <span> Property Type </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPages">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('all.type'))
                            <li>
                                <a href="{{ route('all.type') }}">All Type</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('add.type'))
                            <li>
                                <a href="{{ route('add.type') }}">Add Type</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

            @endif
            <!--- End Type -->

            <!--- End Amenities -->
            @if (Auth::user()->can('amenities.menu'))

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false"
                        aria-controls="sidebarPagesAuth" class="side-nav-link">
                        <i class="ri-group-2-line"></i>
                        <span> Amenities </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPagesAuth">
                        <ul class="side-nav-second-level">
                            @if (Auth::user()->can('all.amenities'))
                            <li>
                                <a href="{{ route('all.amenitie') }}">All Amenities</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('add.amenities'))
                            <li>
                                <a href="{{ route('add.amenitie') }}">Add Amenities</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

            @endif
            <!--- End Amenities -->

            <!--- Role & Permission -->
            @if (Auth::user()->can('rolespermission.menu'))

                <li class="side-nav-title" id="label">ROLE & PERMISSION</li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI"
                        class="side-nav-link">
                        <i class="ri-shield-keyhole-line"></i>
                        <span>Role & Permission</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseUI">
                        <ul class="side-nav-second-level">
                            <li>
                                <li><a href="{{ route('all.permission') }}">All Permission</a></li>
                                <li><a href="{{ route('all.roles') }}">All Roles</a></li>
                                <li><a href="{{ route('add.roles.permission') }}">Roles In Permission</a></li>
                                <li><a href="{{ route('all.roles.permission') }}">All Roles In Permission</a></li>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Role & Permission -->

            <!--- Admin -->
            @if (Auth::user()->can('admin.menu'))

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                        aria-controls="sidebarExtendedUI" class="side-nav-link">
                        <i class="ri-fingerprint-fill"></i>
                        <span>Manage Admin User</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExtendedUI">
                        <ul class="side-nav-second-level">
                            <li>
                                @if (Auth::user()->can('all.admin'))
                                <li><a href="{{ route('all.admin') }}">All Admin</a></li>
                                @endif

                                @if (Auth::user()->can('add.admin'))
                                <li><a href="{{ route('add.admin') }}">Add Admin</a></li>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Admin -->

            <!--- Super Admin -->
            @if (Auth::user()->can('superadmin.menu'))

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                        aria-controls="sidebarExtendedUI" class="side-nav-link">
                        <i class=" ri-user-star-line"></i>
                        <span>Manage Super Admin</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExtendedUI">
                        <ul class="side-nav-second-level">
                            <li>
                                @if (Auth::user()->can('all.superadmin'))
                                <li><a href="{{ route('all.superadmin') }}">All Super Admin</a></li>
                                @endif

                                @if (Auth::user()->can('add.superadmin'))
                                <li><a href="{{ route('add.superadmin') }}">Add Super Admin</a></li>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <!--- End Super Admin -->

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>

{{-- @section('script')

    <script>
        window.addEventListener('load', function () {
            $('#label').validate({
                    $(element).addClass('text-warning');
            });
        })
    </script>

@endsection --}}
<!-- ========== Left Sidebar End ========== -->
