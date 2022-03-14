@extends('layouts.master')
@section('content')


    <div class="col-sm-12">
        <div class="card radius-25">
            <div class="card-body">
                <button type="button" class="btn btn-primary float-end" onclick="addTable()"><i class="fa fa-plus"></i></button>
                <h4 class="mb-5">List Account</h4>
                <div class="table-responsive">
                    <table class="display table table-striped" id="listTable">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Name</th>
                            <th>User ID</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

{{--                        @foreach($tables as $key => $data)--}}

{{--                                    <tr>--}}
{{--                                        <td>{{$key+1}}</td>--}}
{{--                                        <td>{{$data->name}}</td>--}}
{{--                                        <td>{{$data->email}}</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <a href="{{route('admin.account.edit', $data->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit pe-1"></i></a>--}}
{{--                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash pe-1"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}

{{--                        @endforeach--}}
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('head')
    <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/datatables.css')}}">
@endpush

@push('js')
    <script src="{{URL::to('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::to('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{URL::to('assets/js/tooltip-init.js')}}"></script>
    <script>
        $(document).ready(function () {
            Data();
        })
        function Data(){
            $("#listTable").dataTable().fnDestroy();
            $.get(window.location.pathname, function (data) {
                var res = [];
                data.map(function (v, key) {
                    res.push([
                        key+1,
                        v.name,
                        v.email,
                        '<div class="text-center">' +
                        '<a href="javascript:void(0)" onclick="editTables('+v.id+')" class="btn btn-sm btn-info text-center me-3"><i class="fa fa-edit"></i> Edit</a>' +
                        '<a href="javascript:void(0)" onclick="deleteTables('+v.id+')" class="btn btn-sm btn-danger text-center"><i class="fa fa-times"></i> Delete</a>' +
                        '</div>'
                    ])
                })
                $('#listTable').dataTable({data:res});
            })
        }

    </script>

    <script>
        function editTables(id) {
            $.get("{{url('admin/tables/edit')}}/"+id, function (data) {
                $('#modalTable').modal('show');
                document.getElementById('name').value = data.name
                document.getElementById('id').value = data.id
            })
        }

        function deleteTables(id) {

            if (confirm("Want to delete?")) {
                $.get("{{url('admin/tables/delete')}}/"+id, function (data) {
                    Data();
                    alert(data);
                })
            }

        }
        function addTable() {
            $('#modalTable').modal('show')
            removeValue()
        }


            $('#formTable').on('submit', function (event) {
                event.preventDefault();
                var id = $('#id').val();
                var url, method;
                if(id === ''){
                    url = "{{url('admin/tables')}}";
                    method = "post"
                } else {
                    url = "{{url('admin/tables')}}/"+id;
                    method = "patch"
                }
                $.ajax({
                    type: method,
                    url: url,
                    dataType: "json",
                    data: $('#formTable').serialize(),
                    success: function(data){
                        Data()
                        $('#modalTable').modal('hide');

                        alert('Success')
                    },
                    error: function(data){
                        alert("Error")
                    }
                });
            })
        function removeValue() {
            document.getElementById('name').value = ''
            document.getElementById('id').value = ''
        }

    </script>


@endpush

<div class="modal fade" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="formTable">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <label class="form-label mt-3">Name</label>
                <input type="text" name="name" id="name" class="form-control">

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>




