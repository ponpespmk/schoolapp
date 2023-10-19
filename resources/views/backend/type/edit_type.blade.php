@extends('admin.admin_app', ['title' => 'Edit Type', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
@include('admin.shared/page-title',['page_title' => 'Edit Type','sub_title' => 'Type'])

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
                <div class="card-body">
                    <form method="POST" action="{{ route('update.type') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $types->id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- <h5 class="mb-3">Type Name</h5> --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="type_name" id="type_name" @error('type_name') is-invalid @enderror" value="{{ $types->type_name }}">
                                    <label for="type_name">Type Name</label>
                                    @error('type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <h5 class="mb-3">Type Icon</h5> --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="type_icon" id="type_icon" @error('type_icon') is-invalid @enderror" value="{{ $types->type_icon }}">
                                    <label for="type_icon">Type Icon</label>
                                    @error('type_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">

                            </div>
                            <div class="col-9 mt-2">
                                <button type="submit" class="btn btn-info">Save Shanges</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

@endsection
