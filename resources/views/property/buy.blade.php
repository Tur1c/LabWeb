@extends('template.template')

@section('title', 'Rent Page')

@section('container')
    <div class="container-fluid col-10 justify-content-center mt-3">
        @if (session()->has("error"))
            <div class="alert alert-warning" role="alert">
                {{ session("error") }}
            </div>
        @endif
        <h3>Showing Real Estates for Sale</h3>
        <div class="row mt-2 mb-4">
            @foreach ($properties as $property)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="..." style="height: 125px">
                            <h5 class="card-title">${{ $property->price }} / month</h5>
                            <p class="card-text">{{ $property->address }}</p>
                            <a class="p-2 bg-info text-white" style="text-decoration: none">{{ $property->building->name }}</a>
                        </div>
                        <div class="card-body text-center">
                            @if (Auth::user())
                                <form action="{{ route('cart_store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $property->id }}">
                                    <button type="submit" class="btn btn-primary">{{ $property->category->name }}</button>
                                </form>
                            @else
                                <button type="button" onclick="location.href='{{ route('login_page') }}'" class="btn btn-primary text-center">{{ $property->category->name }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
