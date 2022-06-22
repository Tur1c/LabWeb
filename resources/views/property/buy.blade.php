@extends('template.template')

@section('title', 'Rent Page')

@section('container')
    <div class="container-fluid col-10 justify-content-center mt-3">
        <h3>Showing Real Estates for Sale</h3>
        <div class="row mt-2 mb-4">
            @foreach ($properties as $property)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="..." style="height: 125px">
                            <h5 class="card-title">${{ $property->price }} / month</h5>
                            <p class="card-text">{{ $property->address }}</p>
                            <a class="btn btn-info text-white">{{ $property->building->name }}</a>
                        </div>
                        <div class="card-body text-center">
                            <a href="#" class="btn btn-primary text-center">Buy</a>
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
