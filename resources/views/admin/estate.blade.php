@extends('template.template')

@section('title', 'Manage Real Estate')

@section('container')
    <div class="container-fluid col-10 justify-content-center mt-3">
        <a class="btn btn-primary btn-lg" href="{{ url('/real-estate/create') }}">+ Add Real Estate</a>
        <div class="row mt-5 mb-4">
            @foreach ($properties as $property)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="...">
                            <h5 class="card-title">{{ $property->price }} / month</h5>
                            <p class="card-text">{{ $property->address }}</p>
                            <a href="#" class="btn btn-info">{{ $property->building->name }}</a>
                            <a href="#" class="btn btn-primary">{{ $property->category->name }}</a>
                            <a href="#" class="btn btn-success">{{ $property->status }}</a>
                        </div>
                        <div class="card-body">
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
