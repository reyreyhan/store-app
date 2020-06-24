<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index() {
        $data = Product::latest()->get();
        return view('welcome', compact('data'));
    }

    public function order($id) {
        $data = Product::find($id);
        return view('order', compact('data'));
    }

    public function store(Request $request, $id) {
        $data = Product::find($id);

        $invoice = Str::upper(Str::random(2)) . date('Ymdhis');

        Order::create([
            'invoice' => $invoice,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'quantity' => $request->quantity,
            'total' => $request->quantity * $data->price,
            'product_id' => $id
        ]);

        $successMessage = "Success to order product! ";
        return redirect()->route('frontend.finish', $invoice)->with('success', $successMessage);
    }

    public function finish($invoice) {
        $data = Order::where('invoice', $invoice)->with(['product'])->first();

        return view('order-finish', compact('data'));
    }
}
