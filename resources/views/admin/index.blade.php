@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Dashboard tes</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Selamat Datang di Dashboard Admin</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm font-size-20 me-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-tag-plus-outline"></i>
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2">New Orders</div>
                        </div>
                    </div>
                    <h4 class="mt-4">1,368</h4>
                    <div class="row">
                        <div class="col-7">
                            <p class="mb-0"><span class="text-success me-2"> 0.28% <i
                                        class="mdi mdi-arrow-up"></i> </span></p>
                        </div>
                        <div class="col-5 align-self-center">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 62%"
                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm font-size-20 me-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-account-multiple-outline"></i>
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2">New Users</div>

                        </div>
                    </div>
                    <h4 class="mt-4">2,456</h4>
                    <div class="row">
                        <div class="col-7">
                            <p class="mb-0"><span class="text-success me-2"> 0.16% <i
                                        class="mdi mdi-arrow-up"></i> </span></p>
                        </div>
                        <div class="col-5 align-self-center">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sales Report</h4>

                    <div id="line-chart" class="apex-charts"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Revenue</h4>

                    <div id="column-chart" class="apex-charts"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Inbox</h4>

                    <ul class="inbox-wid list-unstyled">
                        <li class="inbox-list-item">
                            <a href="#">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}" alt=""
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Paul</h5>
                                        <p class="text-truncate mb-0">Hey! there I'm available</p>
                                    </div>
                                    <div class="font-size-12 ms-auto">
                                        05 min
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="inbox-list-item">
                            <a href="#">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}" alt=""
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Mary</h5>
                                        <p class="text-truncate mb-0">This theme is awesome!</p>
                                    </div>
                                    <div class="font-size-12 ms-auto">
                                        12 min
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="inbox-list-item">
                            <a href="#">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="{{ asset('backend/assets/images/users/avatar-5.jpg') }}" alt=""
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Cynthia</h5>
                                        <p class="text-truncate mb-0">Nice to meet you</p>
                                    </div>
                                    <div class="font-size-12 ms-auto">
                                        18 min
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="inbox-list-item">
                            <a href="#">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="{{ asset('backend/assets/images/users/avatar-6.jpg') }}" alt=""
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Darren</h5>
                                        <p class="text-truncate mb-0">I've finished it! See you so</p>
                                    </div>
                                    <div class="font-size-12 ms-auto">
                                        2hr ago
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="text-center">
                        <a href="#" class="btn btn-primary btn-sm">Load more</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Transactions</h4>

                    <div class="table-responsive">
                        <table class="table table-centered">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Id no.</th>
                                    <th scope="col">Billing Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col" colspan="2">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15/01/2020</td>
                                    <td>
                                        <a href="#" class="text-body fw-medium">#SK1235</a>
                                    </td>
                                    <td>Werner Berlin</td>
                                    <td>$ 125</td>
                                    <td><span class="badge badge-soft-success font-size-12">Paid</span>
                                    </td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                                <tr>
                                    <td>16/01/2020</td>
                                    <td>
                                        <a href="#" class="text-body fw-medium">#SK1236</a>
                                    </td>
                                    <td>Robert Jordan</td>
                                    <td>$ 118</td>
                                    <td><span class="badge bg-danger-subtle text-danger font-size-12">Chargeback</span>
                                    </td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                                <tr>
                                    <td>17/01/2020</td>
                                    <td>
                                        <a href="#" class="text-body fw-medium">#SK1237</a>
                                    </td>
                                    <td>Daniel Finch</td>
                                    <td>$ 115</td>
                                    <td><span class="badge badge-soft-success font-size-12">Paid</span>
                                    </td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                                <tr>
                                    <td>18/01/2020</td>
                                    <td>
                                        <a href="#" class="text-body fw-medium">#SK1238</a>
                                    </td>
                                    <td>James Hawkins</td>
                                    <td>$ 121</td>
                                    <td><span class="badge bg-warning-subtle text-warning  font-size-12">Refund</span>
                                    </td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <ul class="pagination pagination-rounded justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection
