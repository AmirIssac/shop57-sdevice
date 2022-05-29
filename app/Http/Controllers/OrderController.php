<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use item as GlobalItem;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
class OrderController extends Controller
{
    public function submit(Request $request){
        $number_of_today_orders = Order::whereYear('created_at',now()->year)->whereMonth('created_at',now()->month)
        ->whereDay('created_at',now()->day)->count();
        $date = Carbon::now();
        $date = $date->format('ymd');    // third segment
        $number = $date.str_pad($number_of_today_orders + 1, 4, "0", STR_PAD_LEFT);
        $item_ids = $request->item_id;
        $item_qty = $request->item_qty;
        if($request->customer)
            $customer = $request->customer;
        else
            $customer = 'customer';
        $order = Order::create([
            'number' => $number ,
            'customer' => $customer ,
            'total_price' => 0 ,
        ]);
        //$order->items()->attach($item_ids);
        for($i=0 ; $i< count($item_ids) ; $i++){
            $id = $item_ids[$i];
            $item = Item::find($id);
            if($item_qty[$i] > 0)
                OrderItem::create([
                    'order_id' => $order->id ,
                    'item_id' => $item->id ,
                    'quantity' => $item_qty[$i],
                ]);
        }
        $order_items = $order->orderItems;
        return view('Order.print_order',['order'=>$order,'order_items'=>$order_items]);




        /* Open the printer; this will change depending on how it is connected */
        /*
        $connector = new FilePrintConnector("/dev/usb/lp0");
        $printer = new Printer($connector);
*/
        /* Information for the receipt */
        /*
        $items = array(
            new GlobalItem("Example item #1", "4.00"),
            new GlobalItem("Another thing", "3.50"),
            new GlobalItem("Something else", "1.00"),
            new GlobalItem("A final item", "4.45"),
        );
        */
        /* Date is kept the same for testing */
        /*
        $date = date('l jS \of F Y h:i:s A');
        $date = "Monday 6th of April 2015 02:56:25 PM";
        */
        /* Start the printer */
        //$logo = EscposImage::load("resources/escpos-php.png", false);
        /*
        $printer = new Printer($connector);
        */
        /* Print top logo */
        /*
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        */
        //$printer -> graphics($logo);

        /* Name of shop */
        /*
        $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer -> text("ExampleMart Ltd.\n");
        $printer -> selectPrintMode();
        $printer -> text("Shop No. 57.\n");
        $printer -> feed();
        */
        /* Title of receipt */
        /*
        $printer -> setEmphasis(true);
        $printer -> text("SALES INVOICE\n");
        $printer -> setEmphasis(false);
*/
        /* Items */
        /*
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> setEmphasis(true);
        $printer -> text(new GlobalItem('', '$'));
        $printer -> setEmphasis(false);
        foreach ($items as $item) {
            $printer -> text($item);
        }
        $printer -> setEmphasis(true);
        $printer -> setEmphasis(false);
        $printer -> feed();


*/
        /* Footer */
        /*
        $printer -> feed(2);
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("Thank you for shopping at ExampleMart\n");
        $printer -> text("For trading hours, please visit example.com\n");
        $printer -> feed(2);
        $printer -> text($date . "\n");
*/
        /* Cut the receipt and open the cash drawer */
        /*
        $printer -> cut();
        $printer -> pulse();
        $printer -> close();
*/
    }
}
