<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <style>
        .displaynone{
            display: none;
        }
    </style>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Dabbagh shop 57</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 Orders
                 <span id="new-orders-badge" style="margin: 20px; color:rgb(163, 28, 28);" class="displaynone"><b id="new-orders-count">2</b> NEW</span>
                </div>
            </div>
        </nav>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($orders as $order)
                          <tr>
                            <th scope="row">{{ $order->number }}</th>
                            <td>{{ $order->customer }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><a href="{{ route('print.invoice',$order->id) }}" class="btn btn-success">print</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $orders->links() !!}
                </div>
            </div>
        </section>
        {{-- timestamp for the last order created when the page refreshed  --}}
        <input type="hidden" id="last-updated-order" value="{{$last_updated_order_timestamp}}">
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Dabbagh</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
         <!-- jquery -->
         <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
        <script>
            function checkNewOrders(){
              var token = $("meta[name='csrf-token']").attr("content");
              var updated_at = $('#last-updated-order').val();
              $.ajax(
                      {
                              url: "/check/new/orders/",
                              type: 'GET',
                              data: {
                                  "_token": token,
                                  "updated_at" : updated_at,
                              },
                              success: function (data){
                                if(data > 0){
                                  $('#new-orders-badge').removeClass('displaynone');
                                  $('#new-orders-count').html(data);
                                }
                              }
              });
            }
            window.setInterval(checkNewOrders, 5000);
          </script>
    </body>
</html>
