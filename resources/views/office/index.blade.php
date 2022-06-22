@extends('template.template')

@section('title', 'About Us')

@section('container')
    <div class="card bg-dark text-white mb-5">
        <img class="card-img" style="background-image: url('/storage/about-us.jpg'); width: 100%; height:300px; background-repeat: none; background-position: center">
        <div class="card-img-overlay d-flex flex-column justify-content-center">
            <h5 class="card-title text-center">About Us</h5>
        </div>
    </div>
    <div class="container-fluid mb-4">
        <h1 class="text-center">Our Office</h1>
        <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @foreach ($offices as $office)
                <div class="col mt-4">
                    <div class="card text-center" style="width: 14rem;">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $office->image) }}" class="card-img-top" alt="..." style="width: 100%; height:150px;">
                            <h5 class="card-title">{{ $office->office_name }}</h5>
                            <p class="card-text">{{ $office->office_address }}</p>
                            <p class="card-text">{{ $office->contact_name }} +{{ $office->contact_information }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $offices->links() }}
    </div>
@endsection
