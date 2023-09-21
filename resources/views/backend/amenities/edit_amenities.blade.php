@extends('admin.admin_dashboard', [
    'title'     => 'Amenities',
    'titlepage' => 'Edit Amenities',
    ])
@section('admin_content')

<div class="row">
    <div class="col-md-12 col-xl-8">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-0 menu-title">Edit Amenities</h2>

                <!-- Tab panes -->
                <div class="p-3 text-muted">
                    <form id="myForm" method="POST" action="{{ route('update.amenitie') }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="id" value="{{ $amenities->id }}">

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="amenitis_name">Amenities Name</label>
                                    <input type="text" name="amenitis_name" id="amenitis_name" class="form-control" value="{{ $amenities->amenitis_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Save Shanges
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>


</div>

@endsection

<!-- Styles .css -->
@push('cssStyle')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endpush

<!-- Script .js -->
@push('jsScript')
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                amenitis_name: {
                    required : true,
                },

            },
            messages :{
                amenitis_name: {
                    required : 'Please Enter Amenities Name',
                },


            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
@endpush
