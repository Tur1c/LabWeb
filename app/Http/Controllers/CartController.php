<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Property;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $property = Property::find($request->id);
        if($property->status == "Added to cart") {
            return back()->with("error", "Property already input");
        } else if ($property->status == "Transaction Complete") {
            return back()->with("error", "Property already been checkout");
        }
        $date = Carbon::now();
        CartDetail::create([
            "cart_id" => auth()->user()->cart->id,
            "property_id" => $request->id,
            'date' => $date->format("Y-m-d")
        ]);
        Property::find($request->id)->update([
            "status" => "Added to cart"
        ]);
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $properties = auth()->user()->cart->id;
        // $properties = CartDetail::where("cart_id", auth()->user()->cart->id);
        // dd($properties);
        return view('cart.index', [
            // "properties" => Property::find('property_id', auth()->user()->cart->cart_detail)->paginate(4)
            "carts" => CartDetail::where("cart_id", auth()->user()->cart->id)->paginate(4),
            // "carts" => auth()->user()->cart->cart_detail->paginate(4)
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartdetail = CartDetail::where('property_id', $id)->first();
        Property::where("id", $id)->update([
            "status" => "open"
        ]);
        $cartdetail->delete();
        return redirect('/cart');
    }

    public function finish($id)
    {
        $property = Property::find($id);
        $cartdetail = $property->cart_detail;
        $property->update([
            "status" => "Transaction Complete"
        ]);
        $cartdetail->delete();
        return redirect('/real-estate');
    }

    public function checkout()
    {
        $carts = auth()->user()->cart->cart_detail;
        foreach($carts as $cart) {
            $cart->property->update([
                "status" => "Transaction Complete"
            ]);
            $cart->delete();
        }
        return redirect('/')->with('success', "Checkout Successful");
    }
}
