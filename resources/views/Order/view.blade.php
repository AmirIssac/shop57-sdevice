    @extends('layouts.main')
    @section('body')
    <body>
        <div class="ticket">
            <img src="{{asset('public/public/Image/logo.jpg')}}" alt="Logo" height="100px;">
            <p class="centered">dabbagh shop 57
                <br>{{$order->customer}}-{{$order->number}}</p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity text-center">Q.</th>
                        <th class="description text-center">Item</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_items as $item)
                    <tr>
                        <td class="quantity text-center">
                            {{ $item->quantity }} K.G
                        </td>
                        <td class="description text-center">{{$item->item->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="centered">Thanks for chosing Dabbagh
        </div>
    </body>
    @endsection
