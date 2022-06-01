@extends('layouts.main')
@section('body')
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">Dabbagh shop 57</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   NEW ITEM
                </div>
            </div>
        </nav>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <form action="{{route('update.item',$item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>Arabic Name</label>
                        <input type="text" name="name_ar" value="{{ $item->name }}">
                        <label>English Name</label>
                        <input type="text" name="name_en" value="{{ $item->name_en }}">
                        <label>Price</label>
                        <input type="number" step="0.1" name="price" value="{{ $item->price }}">
                        <label>Image</label>
                        <input type="file" name="image">
                        <button class="btn btn-success mt-2">update</button>
                    </form>
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
