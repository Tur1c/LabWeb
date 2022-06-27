@extends('template/template')

@section('title', 'Home')

@section('container')
    <div class="container-fluid">
        @if (session()->has("success"))
            <div class="alert alert-success" role="alert">
                {{ session("success") }}
            </div>
        @endif
        <div class="card bg-dark text-white m-3">
            <img class="card-img" style="background-image: url('/storage/home-image.jpg'); width: 100%; height:300px; background-repeat: none; background-position: center">
            <div class="card-img-overlay d-flex flex-column justify-content-center">
              <h5 class="card-title text-center">Find Your Future Home</h5>
              <form action="/search" class="d-flex" role="search" method="get">
                  <input class="form-control me-2" type="search" placeholder="Enter a City, Property Type, Buy or Rent.." aria-label="Search" name="search">
                  <button class="btn btn-outline-success btn-primary text-white" type="submit">Search</button>
              </form>
            </div>
        </div>
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-3">
                <div class="card">
                    <img src="{{ asset('storage/buy.webp') }}" class="card-img-top" alt="..." style="width: 100%; height: 250px">
                    <div class="card-body text-center">
                        <a href="/buy" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="{{ asset('storage/rent.webp') }}" class="card-img-top" alt="..." style="width: 100%; height: 250px">
                    <div class="card-body text-center">
                        <a href="/rent" class="btn btn-primary">Rent</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="{{ asset('storage/about-us-home.webp') }}" class="card-img-top" alt="..." style="width: 100%; height: 250px">
                    <div class="card-body text-center">
                        <a href="/about-us" class="btn btn-primary">About Us</a>
                    </div>
                </div>
              </div>
          </div>
    </div>
@endsection
