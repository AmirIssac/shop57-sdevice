<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>DabbaghFoods</title>
    </head>
    <style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.description,
    th.description {
        width: 75px;
        max-width: 75px;
    }

    td.quantity,
    th.quantity {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    td.price,
    th.price {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    .centered {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 125px;
        max-width: 155px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }
    @page { margin: 0; }

    @media print {
        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }
    </style>
    <body>
        <div class="ticket">
            <img src="{{asset('public/public/Image/logo.jpg')}}" alt="Logo">
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
        <script>
            // self executing function here
            (function() {
               window.print();
            })();
            </script>
    </body>
</html>
