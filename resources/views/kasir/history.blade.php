@extends('layouts.master')

@section('content')
    <div class="row">
       <div class="card">
           <div class="card-head">
               <h3 class="mt-3">History</h3>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-striped"  id="history">
                       <thead>
                       <tr>
                           <th width="5%" class="text-center">No</th>
                           <th>No Meja</th>
                           <th>Sub Total</th>
                           <th  width="5%" class="text-center">Detail</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach($history as $key => $data)
                           <tr>
                               <td class="text-center">{{$key+1}}</td>
                               <td>{{$data->detail_order[0]->table->name}}</td>
                               <td>Rp {{number_format($data->sub_total)}}</td>
                               <td class="text-center"><a href="" class="btn btn-success btn-sm">Detail</a> </td>
                           </tr>
                       @endforeach
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
    <script>
        $(document).ready(function () {
            $('#history').DataTable();
        })
    </script>
@endpush
