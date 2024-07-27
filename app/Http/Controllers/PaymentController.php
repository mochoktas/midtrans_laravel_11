<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\Order;

class PaymentController extends Controller
{
    //
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        // Set midtrans configuration
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index()
    {
        return view('home');
    }

    public function createTransaction(Request $request)
    {
        $order = Order::create([
            'user_id' => '1',
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->amount,
            ],
            'customer_details' => [
                'first_name' => 'nama_01',
                'email' => 'email_01@gmail.com',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('pay', compact('snapToken', 'order'));
    }

    public function notificationHandler(Request $request)
    {
        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraudStatus = $notification->fraud_status;

        $order = Order::find($orderId);

        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card') {
                if ($fraudStatus == 'challenge') {
                    $order->update(['status' => 'challenge']);
                } else {
                    $order->update(['status' => 'success']);
                }
            }
        } elseif ($transactionStatus == 'settlement') {
            $order->update(['status' => 'success']);
        } elseif ($transactionStatus == 'pending') {
            $order->update(['status' => 'pending']);
        } elseif ($transactionStatus == 'deny') {
            $order->update(['status' => 'failed']);
        } elseif ($transactionStatus == 'expire') {
            $order->update(['status' => 'expired']);
        } elseif ($transactionStatus == 'cancel') {
            $order->update(['status' => 'failed']);
        }

        return response()->json(['status' => 'ok']);
    }
}
