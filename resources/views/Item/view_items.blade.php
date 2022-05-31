@extends('layouts.main')
@section('body')
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Dabbagh shop 57</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 ITEMS  <a href="{{ route('add.item') }}" class="btn btn-success" style="margin-left: 20px;">New</a>
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
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($items as $item)
                          <tr>
                            <th scope="row">{{ $item->name }}</th>
                            <td>{{ $item->price }}</td>
                            <td><a href="{{ route('edit.item',$item->id) }}" class="btn btn-info">edit</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Dabbagh</p></div>
        </footer>
        @section('scripts')
        @endsection
    </body>
    @endsection
