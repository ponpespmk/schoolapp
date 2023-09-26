@extends('admin.admin_dashboard', [
    'title'     => 'Permission',
    'titlepage' => 'All Permission',
    ])
@section('admin_content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="col-lg-6 mb-3">
                    <a href="{{ route('add.permission') }}" class="btn btn-info waves-effect waves-light">
                        <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i>
                        Add Permission
                    </a>
                </div>

                <h4 class="card-title">Permission All</h4>
                <p class="card-title-desc">
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Permission Name</th>
                            <th>Group Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->group_name }}</td>
                            <td>
                                <a href="{{ route('edit.permission',$item->id) }}" class="btn btn-sm btn-rounded btn-warning waves-effect waves-light">
                                    <i class="bx bxs-edit-alt font-size-16 align-middle me-2"></i>
                                    Edit
                                </a>
                                <a href="{{ route('delete.permission',$item->id) }}" class="btn btn-sm btn-rounded btn-danger waves-effect waves-light" id="delete">
                                    <i class="bx bxs-trash font-size-16 align-middle me-2"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection
