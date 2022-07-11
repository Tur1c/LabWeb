@extends('template.template')

@section('title', 'Manage Real Estate')

@section('container')
    <div class="container-fluid col-10 justify-content-center mt-3">
        <a class="btn btn-primary btn-lg" href="{{ url('/real-estate/create') }}">+ Add Real Estate</a>
        <div class="row mt-4 mb-4">
            @foreach ($properties as $property)
                <div class="col-3 d-flex justify-content-between">
                    <div class="card" style="width: 300px;">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="..." style="height: 125px">
                            <h5 class="card-title">{{ $property->price }} / month</h5>
                            <p class="card-text">{{ $property->address }}</p>
                            <a class="p-1 bg-info text-white" style="text-decoration: none; font-size: 8pt">{{ $property->building->name }}</a>
                            @if ($property->status !== "Transaction Complete" && $property->status !== "Added to cart")
                                <a class="p-1 bg-primary text-white" style="text-decoration: none; font-size: 8pt">{{ $property->category->name }}</a>
                            @endif
                            <a class="p-1 bg-success text-white" style="text-decoration: none; font-size: 8pt">{{ $property->status }}</a>
                        </div>
                        <div class="card-body d-flex justify-content-around">
                            <a href="/real-estate/{{ $property->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="/real-estate/{{ $property->id }}" method="post" class="d-inline">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @if ($property->status == "Added to cart")
                                <button type="button" onclick="location.href='{{ route('finish', $property->id) }}'" class="btn btn-success">Finish</button>
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
