<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct($value='')
    {
      $this->middleware('role:Admin')->only('index','orderdetail');
      $this->middleware('role:Customer')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();
        return view('backend.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cartArr = $request->itemArr;
       //$cartArr=$cartObj['itemlist'];
       $total = 0;
       foreach ($cartArr as $row)
       {
          $total+=($row['price']*$row['qty']);
       }
       $order = new Order;
       $order->voucherno = uniqid();//voucherno tay par lar may
       $order->orderdate = date('Y-m-d');
       $order->user_id =Auth::id();// auth id (1 => in users table)
       //$order->user_id =Auth::id();
       $order->note=$request->notes;
       $order->total=$total;
       $order->save();// only saved into order table

       //save into order_detail
       foreach ($cartArr as $row)
       {
          $order->items()->attach($row['id'],['qty'=>$row['qty']]);
       }
       return 'Successfull!';
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       return view('backend.orders.orderdetail',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
