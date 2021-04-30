<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\MyTestMail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Order $order)
    {
        $o = $order::create([
            'products' => $request->products,
            'username' => $request->username,
            'phone' => $request->phone,
            'delivery' => $request->delivery
        ]);
        $listprod = $request->products;
        $details = [
            'title' => $request->phone,
            'username' => $request->username,
            'body' => 'Заказ:'.$request->delivery,
            'products' => $request->products
        ];
       

        \Mail::to('shopz@акб24.москва')->cc('sha.egor@gmail.com')->send(new MyTestMail($details));
        

        return response($o);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, $id, Request $request)
    {
        $o = $order->find($id);
        if($request->method() == 'POST'){
            $o->username = $request->username;
            $o->phone = $request->phone;
            $o->save();
//
//$to_name = 'Admin';
//$to_email = 'sha.egor@gmail.com';
//$data = array('name'=>"Sam Jose", "body" => "Test mail");
//Mail::send('emails', $data, function($message) use ($to_name, $to_email) {
//$message->to($to_email, $to_name)->subject('Artisans Web Testing Mail');
//$message->from('sha.egor@gmail.com','Artisans Web');



//});

//            
            return redirect()->back()->with(['message' => 'Вы успешно обновили заказ']);
        }
        return view('admin.orders.edit')->with([
            'order' => $o
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, $id)
    {
        $order->destroy($id);
        return redirect()->back()->with(['message' => 'Вы успешно удалили заказ']);
    }
}
