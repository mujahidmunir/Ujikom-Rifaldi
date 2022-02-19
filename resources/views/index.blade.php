@extends('layouts.master-user')

@section('tab-menu')
    @include('user.tab-menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Breakfast" role="tabpanel" aria-labelledby="Breakfast-tab">
                    <div class="row menus"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        function starter(){
            detailCart()
            menus();
        }
        $(document).ready(function () {
            starter();
        })
    </script>

    <script>
        function menus() {
            let Rupiah = Intl.NumberFormat('id-ID');
            $.get("{{url('/')}}/" , function (data) {
                $('.menus').html('')
                data.map(function (v) {
                    $('.menus').append('' +
                    '<div class="col-lg-3 col-sm-6">\n' +
                    '<div class="single_product">\n' +
                    '     <div class="menu_product_img">\n' +
                    '         <img src="{{asset('images/products')}}/'+v.image+'" alt="menu_item1">\n' +
                    '            <div class="action_btn"><a href="javascript:void(0)" onclick="addCart('+v.id+')" class="btn btn-white">Add To Cart</a></div>\n' +
                    '     </div>\n' +
                    '     <div class="menu_product_info">\n' +
                    '          <div class="title">\n' +
                    '              <h5>'+v.name+'</h5>\n' +
                    '          </div>\n' +
                    '          <p>'+v.description+'</p>\n' +
                    '     </div>\n' +
                    '     <div class="menu_footer">\n' +
                    '           <div class="">\n' +
                    '               <div class="" style="width:0%"></div>\n' +
                    '           </div>\n' +
                    '           <div class="price">\n' +
                    '                <span>Rp '+Rupiah.format(v.price)+'</span>\n' +
                    '           </div>\n' +
                    '     </div>\n' +
                    '</div>\n' +
                    '</div>')
                });

            });
        }
    </script>

    <script>
        function detailCart(){
            let Rupiah = Intl.NumberFormat('id-ID');
            $.get("{{route('test')}}" , function (data) {
                $('.cart_count').html(data[2])
                $('.total').html(Rupiah.format(data[1]))
                $('.cart_list').html('')
                data[0].map(function (v) {
                    const price = v.menu.price;
                    $('.cart_list').append(
                        '<li id="listCart'+v.id+'">'+
                        '<a href="javascript:void(0)" class="item_remove" onclick="remove('+v.id+')"><i class="ion-close"></i></a>' +
                        '<a href="javascript:void(0)"><img src="{{asset('images/products')}}/'+v.menu.image+'" alt="cart_thumb1">'+v.menu.name+'</a>' +
                        '<span class="cart_quantity"> '+v.qty+' x <span class="cart_amount"> <span class="price_symbole"></span>Rp  '+ Rupiah.format(price) +'</span></span>' +
                        '</li>'
                    )
                })
            });
        }
    </script>

    <script>
        function addCart(id) {
            $.get("{{url('/get-menu')}}/"+id , function (data) {
                document.getElementById("img_product").src = "{{asset('/images/products')}}/"+data.image;
                document.getElementById("idMenu").value = id
                $('#title').html(data.name)
                $('#desc').html(data.description)
                $('#price').html(data.price)
                $('#modalMenu').modal('show');
            });
        }
    </script>


    <script>
        let Rupiah = Intl.NumberFormat('id-ID');
        $('#formAddCart').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                data: $('#formAddCart').serialize(),
                url: "{{ route('addCart') }}",
                method: "post",
                success: function (data) {
                    $('#modalMenu').modal('hide');
                    detailCart();
                }
            })
        })
    </script>

    <script>
        function remove(id) {
            $.get("{{url('/delete-cart')}}/"+id , function (data) {
                detailCart()
            });
        }
    </script>

    <script>
        function filter(id) {
            let Rupiah = Intl.NumberFormat('id-ID');
            $.get("{{url('')}}/"+id , function (data) {
                $('.menus').html('')
                data.map(function (v) {
                    $('.menus').append('' +
                        '<div class="col-lg-3 col-sm-6">\n' +
                        '<div class="single_product">\n' +
                        '     <div class="menu_product_img">\n' +
                        '         <img src="{{asset('images/products')}}/'+v.image+'" alt="menu_item1">\n' +
                        '            <div class="action_btn"><a href="javascript:void(0)" onclick="addCart('+v.id+')" class="btn btn-white">Add To Cart</a></div>\n' +
                        '     </div>\n' +
                        '     <div class="menu_product_info">\n' +
                        '          <div class="title">\n' +
                        '              <h5>'+v.name+'</h5>\n' +
                        '          </div>\n' +
                        '          <p>'+v.description+'</p>\n' +
                        '     </div>\n' +
                        '     <div class="menu_footer">\n' +
                        '           <div class="">\n' +
                        '               <div class="" style="width:0%"></div>\n' +
                        '           </div>\n' +
                        '           <div class="price">\n' +
                        '                <span>Rp '+Rupiah.format(v.price)+'</span>\n' +
                        '           </div>\n' +
                        '     </div>\n' +
                        '</div>\n' +
                        '</div>')
                });

            });
        }
    </script>
@endpush







<div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <img id="img_product" src='' alt="product_img1" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div>
                            <div class="product_description">
                                <h4 class="product_title"><a href="#" id="title"></a></h4>
                                <div class="product_price">
                                    <h3 class="price" id="price"></h3>
                                </div>
                                <div>
                                    <p id="desc"></p>
                                </div>
                            </div>
                            <hr />
                            <div class="cart_extra">
                                <form method="post" id="formAddCart">
                                    @csrf
                                <div class="cart-product-quantity">
                                    <input type="hidden" id="idMenu" name="id" value="">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="qty" value="1" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                                <div class="cart_btn float-right">
                                    <button class="btn btn-success btn-sm btn-block" type="submit"><span>Add to cart</span></button>
                                </div>
                                </form>
                            </div>
                            <hr/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
