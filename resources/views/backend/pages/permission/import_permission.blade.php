@extends('admin.admin_app', ['title' => 'Addtype', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Add Property Type','sub_title' => 'AddType'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="header-title">Floating labels</h4>
                    <p class="text-muted mb-0">
                        Wrap a pair of <code>&lt;input class="form-control"&gt;</code> and
                        <code>&lt;label&gt;</code> elements in <code>.form-floating</code> to enable
                        floating labels with Bootstrap’s textual form fields. A <code>placeholder</code>
                        is required on each <code>&lt;input&gt;</code> as our method of CSS-only
                        floating labels uses the <code>:placeholder-shown</code> pseudo-element. Also
                        note that the <code>&lt;input&gt;</code> must come first so we can utilize a
                        sibling selector (e.g., <code>~</code>).
                    </p>
                </div> --}}
                <div class="card-header">
                    <a href="{{ route('export') }}" class="btn btn-primary"><i class="ri-download-2-line me-1"></i>
                        <span>Download Xlsx</span>
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="example-fileinput" class="form-label">Xlsx File Import</label>
                                <input type="file" name="import_file" id="import_file" class="form-control">
                            </div>
                            <div class="col-9 mt-2">
                                <button type="submit" class="btn btn-info"><i class="ri-upload-cloud-2-line me-1"></i>Upload</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

@endsection
