@extends('template/template')

@section('title', 'Cart Page')

@section('container')
    <div class="container-fluid col-10 justify-content-center mt-3">
        <h3>Your Cart</h3>
        @if (count($carts) == 0)
            <h1 class="text-center">No Data In Cart Yet</h1>
        @else
            <div class="row mt-2 mb-4">
                @foreach ($carts as $cart)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $cart->property->image) }}" class="card-img-top" alt="..." style="height: 125px">
                                <h5 class="card-title">${{ $cart->property->price }} / month</h5>
                                <p class="card-text">{{ $cart->property->address }}</p>
                                <a class="p-2 bg-info text-white" style="text-decoration: none">{{ $cart->property->building->name }}</a>
                                <a class="p-2 bg-warning text-white" style="text-decoration: none">{{ $cart->date }}</a>
                            </div>
                            <div class="card-body text-center">
                                <form action="/cart/{{ $cart->property->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mb-4">
                <button class="btn btn-primary" onclick="location.href='{{ route('checkout') }}'">Checkout</button>
            </div>
            <div class="d-flex justify-content-center">
                {{ $carts->links() }}
            </div>
        @endif
    </div>
@endsection
