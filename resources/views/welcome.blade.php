    @extends('layouts.main')
    @section('body')
    <body>
        <!-- Navigation-->
        <form action="{{ route('submit.order') }}" method="POST">
            @csrf
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <img style="border-radius: 50%" src="{{asset('public/Image/logo.jpg')}}" height="50px">
                <a class="navbar-brand" href="#!">Dabbagh shop 57</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{--
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark ms-1 rounded-pill">0</span>
                        </button>
                        --}}
                        <input type="text" name="customer" placeholder="Phone 05xxxxxxxx">
                        <button style="margin-left: 20px;" class="btn btn-success">
                            confirm | تأكيد
                        </button>
                        @if($user->isAdmin())
                        <a href="{{ route('view.items') }}" class="btn btn-danger" style="margin-left: 20px;">Items</a>
                        <a href="{{ route('view.orders') }}" class="btn btn-danger" style="margin-left: 20px;">Orders</a>
                        @endif
                </div>
            </div>
        </nav>
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulations !</strong> {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($items as $item)
                    <input type="hidden" name="item_id[]" value="{{$item->id}}">
                    <input type="hidden" name="item_qty[]" value="0" id="item-qty-{{$item->id}}">
                    <div class="col mb-5">
                        <div class="card h-100" id="item-card-{{$item->id}}">
                            <!-- Sale badge-->
                            <div class="badge bg-danger text-white position-absolute" style="top: -1.5rem; right: 0.5rem;" id="counter-bg-{{$item->id}}"><h4 id="quantity-{{$item->id}}">0</h4></div>
                            <input type="hidden" value="0" id="quantity-hidden-{{$item->id}}">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset('Public/image/'.$item->image)}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-2">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$item->name_en}}</h5>
                                    <h5 class="fw-bolder">{{$item->name}}</h5>
                                    <!-- Product price-->
                                    <b style="color: rgb(162, 16, 28);">{{$item->price}}AED</b>  1 K.G
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button type="button" id="minus-btn-{{$item->id}}" class="btn btn-danger minus displaynone"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                      </svg></button>
                                    <button type="button" id="get-{{$item->id}}" class="btn btn-success mt-auto get-btn">Get</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Dabbagh</p></div>
        </footer>
        </form>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger" style="margin-left: 20px;">logout</button>
        </form>
        @section('scripts')
        <script>
            $('.get-btn').on('click',function(){
                var id = $(this).attr('id');
                gold = id.slice(4);
                $('#quantity-hidden-'+gold).val(parseInt($('#quantity-hidden-'+gold).val()) + 1);
                var counter = $('#quantity-hidden-'+gold).val();
                $('#item-qty-'+gold).val(counter);
                $('#minus-btn-'+gold).removeClass('displaynone');
                $('#counter-bg-'+gold).removeClass('bg-danger').addClass('bg-success');
                $('#item-card-'+gold).addClass('selectedItem');
                $('#quantity-'+gold).text(counter);
            });

            $('.minus').on('click',function(){
                var id = $(this).attr('id');
                gold = id.slice(10);
                if(parseInt($('#quantity-hidden-'+gold).val()) > 0){
                    $('#quantity-hidden-'+gold).val(parseInt($('#quantity-hidden-'+gold).val()) - 1);
                    var counter = $('#quantity-hidden-'+gold).val();
                    $('#item-qty-'+gold).val(counter);
                    $('#quantity-'+gold).text(counter);
                    if(counter == 0){
                        $('#minus-btn-'+gold).addClass('displaynone');
                        $('#counter-bg-'+gold).addClass('bg-danger').removeClass('bg-success');
                        $('#item-card-'+gold).removeClass('selectedItem');
                    }
                }
            });


            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 10000);
        </script>
        @endsection
    </body>
@endsection
