@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Account</h4>
        </div>
        <form action="{{$url}}" method="post">
            @csrf
            @isset($user)
                @method('PUT')
            @endif

            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{isset($user) ? $user->name : null }}" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">email</label>
                    <input type="text" name="email" value="{{isset($user) ? $user->email : null }}"
                           class="form-control">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="validationCustomUsername">Category</label>
                    <select class="js-example-basic-single col-sm-12" name="role">
                        <optgroup label="Developer">
                            <option hidden>---Select---</option>
                            @foreach($role as $data)
                                <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label class="form-label">phone</label>
                    <span class="input-group">
                        <i class="f-12 btn btn-primary ">+62</i>
                        <input type="number" name="phone" value="{{isset($user) ? $user->phone : null }}" class="form-control">
                    </span>
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
@endpush

@push('js')
    <script src="{{URL::to('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{URL::to('assets/js/select2/select2-custom.js')}}"></script>
@endpush
