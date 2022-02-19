@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Account</h4>
        </div>
        <form action="{{$url}}" method="post">
            @csrf
            @isset($menu)
                @method('PUT')
            @endif

            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Name Menu</label>
                    {!! Form::text('name', isset($menu) ? $menu->name : null, ['class' => 'form-control ', 'placeholder' => '--Event Name--', 'required']) !!}

                </div>

                <div>
                    <label class="form-label" for="validationCustomUsername">Category</label>
                    {!! Form::select('category_id',$categories,  isset($menu) ? $menu->cat->id : null, ['class' => 'js-example-basic-single col-sm-12 ', 'placeholder' => '--Category Name--', 'required']) !!}
                </div>

                <div class="form-group mt-4">
                    <label class="form-label">Price</label>
                    <span class="input-group">
                        <i class="f-12 btn btn-primary ">Rp.</i>
                    {!! Form::number('price', isset($menu) ? $menu->price : null, ['class' => 'form-control ', 'placeholder' => '--Event Name--', 'required']) !!}

                </div>


                <div class="form-group mt-2">
                    <label class="form-label">Discription</label>
                    {!! Form::textarea('description', isset($menu) ? $menu->description : null, ['class' => 'form-control mb-3', 'placeholder' => '--Event Name--', 'required']) !!}
                </div>
                <div class="form-group">
                    <label class="form-label">Image</label>
                    <div class="preview-zone hidden">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                                        <i class="fa fa-times"></i> Reset The Field
                                    </button>
                                </div>
                            </div>
                            <div class="box-body mt-3 mb-3">
                                @if(isset($menu))
                                <img src="{{asset('images/products/'. $menu->image )}}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="dropzone-wrapper">
                        <div class="dropzone-desc">
                            <i class="glyphicon glyphicon-download-alt"></i>
                            <p>Choose an image file or drag it here.</p>
                        </div>
                        <input type="file" name="image" accept="image/*" class="dropzone">
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
@push('head')
    <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/coba1.css')}}">


@endpush

@push('js')
    <script src="{{URL::to('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{URL::to('assets/js/select2/select2-custom.js')}}"></script>
    <script>
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var htmlPreview =
                        '<img width="200" src="' + e.target.result + '" />' +
                        '<p>' + input.files[0].name + '</p>';
                    var wrapperZone = $(input).parent();
                    var previewZone = $(input).parent().parent().find('.preview-zone');
                    var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                    wrapperZone.removeClass('dragover');
                    previewZone.removeClass('hidden');
                    boxZone.empty();
                    boxZone.append(htmlPreview);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function reset(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
        }

        $(".dropzone").change(function () {
            readFile(this);
        });

        $('.dropzone-wrapper').on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        $('.dropzone-wrapper').on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });

        $('.remove-preview').on('click', function () {
            var boxZone = $(this).parents('.preview-zone').find('.box-body');
            var previewZone = $(this).parents('.preview-zone');
            var dropzone = $(this).parents('.form-group').find('.dropzone');
            boxZone.empty();
            previewZone.addClass('hidden');
            reset(dropzone);
        });
    </script>
@endpush
