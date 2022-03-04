@extends('layouts.master')
@section('content')
    <div class="row mt-4">
        <div class="col-7">
            <div class="col-sm-12">
                <div class="card radius-25">
                    <div class="card-body">
                        <h4 class="mb-5">Orders</h4>
                        <div class="table-responsive">
                            <table class="display table table-striped" id="manager">
                                <thead>
                                <tr >
                                    <th width="3%">No</th>
                                    <th>Name Table</th>
                                    <th>Status</th>
                                    <th width="50%" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $key => $data)
                               <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$data->meja->name}}</td>
                                   <td>
                                       <span class="badge badge-info" id="waiting">Waiting</span>
                                       <span class="badge badge-warning" id="process">Process</span>
                                   </td>
                                   <td class="text-center">
                                       <button type="button" class="btn btn-primary btn-sm" onclick="check({{$data->table_id}})"><i class="fa fa-check"></i></button>
                                   </td>
                               </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="col-sm-12"id="order">
                <div class="card radius-25">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6"><h4 class="mb-2">Order</h4></div>
                            <div class="col-6"><h5 class="float-end tablename"></h5></div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="display table " id="kasir">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th width="50%" class="text-center">price</th>
                                    <th width="50%" class="text-center">subtotal</th>
                                </tr>
                                </thead>

                                <tbody id="orders">
                                </tbody>
                            </table>
                            <div class="mb-3 mt-3">
                                <strong>Total</strong>
                                <strong class="float-end" id="totalOrder">Rp 0</strong>
                            </div>
                            <div class="card-footer">
                               <form method="post" action="">
                                @csrf
                                   <input type="hidden" name="table_id" id="table_id">
                                   <button type="submit">Checkout</button>
                               </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('head')

@endpush
@push('js')
    <script>
        function check(id){
            $.get("{{url('kasir/get-order')}}/"+id, function (data) {
                $('#orders').html('');
                data[0].map(function (v) {
                   $('#orders').append(' <tr>\n' +
                       '                                        <td class="text-center">'+v.menu.name+'</td>\n' +
                       '                                        <td class="text-center">'+v.qty+'</td>\n' +
                       '                                        <td class="text-center">Rp '+v.menu.price+'</td>\n' +
                       '                                        <td class="text-center">Rp '+v.subtotal+'</td>\n' +
                       '                                    </tr>')
                });
                $('#totalOrder').html('Rp ' + data[1])
                $('.tablename').html(data[2].name);
                document.getElementById('table_id').value = data[2].id

            })
        }

    </script>
@endpush
