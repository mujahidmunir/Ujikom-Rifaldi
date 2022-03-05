@extends('layouts.master')
@section('content')
    <div class="row mt-4">
        <div class="col-lg-4">
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
                                    <th width="50%" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $key => $data)
                               <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$data->meja->name}}</td>
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
        <div class="col-lg-8">
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
                                    <th width="30">Name</th>
                                    <th width="10%" class="text-center">Qty</th>
                                    <th width="30%" class="text-end">Price</th>
                                    <th  width="30%" class="text-end">Subtotal</th>
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
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success d-grid checkout disabled">Checkout</button>
                                    </div>
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
            let Rupiah = Intl.NumberFormat('id-ID');
            $.get("{{url('kasir/get-order')}}/"+id, function (data) {
                $('#orders').html('');
                data[0].map(function (v) {
                   $('#orders').append(' <tr>\n' +
                       '                                        <td class="text-left">'+v.menu.name+'</td>\n' +
                       '                                        <td class="text-center">'+v.qty+'</td>\n' +
                       '                                        <td class="text-end">Rp '+Rupiah.format(v.menu.price)+'</td>\n' +
                       '                                        <td class="text-end">Rp '+Rupiah.format(v.subtotal)+'</td>\n' +
                       '                                    </tr>')
                });
                $('#totalOrder').html('Rp ' + Rupiah.format(data[1]))
                $('.tablename').html(data[2].name);
                document.getElementById('table_id').value = data[2].id

            })
            $('.checkout').removeClass('disabled')
        }

    </script>
@endpush
