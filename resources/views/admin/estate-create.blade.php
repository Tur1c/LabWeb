@extends('template.template')

@section('title', 'Add Real Estate')

@section('container')
    <div class="container-fluid col-12 mt-5 d-flex">
        <div class="col-2 text-center">
            <button class="btn btn-primary mb-4 btn-block" onclick="history.go(-1)">Back</button>
        </div>
        <div class="col-8">
            <form action="/real-estate" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Type input -->
                <div class="form-outline mb-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Sales Type</div>
                      </div>
                    <select class="form-select" aria-label="Default select example" name="category_type">
                        <option >Choose the type of sales</option>
                        @foreach ($categories as $category)
                            @if (old("category_type") == $category->name)
                                <option value="{{ $category->name }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                        {{-- <option value="Sale" {{ old('type') == "Sale" ? 'selected' : '' }}>Sale</option>
                        <option value="Rent" {{ old('type') == "Rent" ? 'selected' : '' }}>Rent</option> --}}
                    </select>
                </div>

                <!-- Building Type input -->
                <div class="form-outline mb-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Sales Type</div>
                      </div>
                    <select class="form-select" aria-label="Default select example" name="building_type">
                        <option >Choose the Building Type</option>
                        @foreach ($buildings as $building)
                            @if (old("building_type") == $building->name)
                                <option value="{{ $building->name }}" selected>{{ $building->name }}</option>
                            @else
                                <option value="{{ $building->name }}">{{ $building->name }}</option>
                            @endif
                        @endforeach
                        {{-- <option value="House" {{ old('category') == "House" ? 'selected' : '' }}>House</option>
                        <option value="Apartment" {{ old('category') == "Apartment" ? 'selected' : '' }}>Apartment</option> --}}
                    </select>
                </div>

                <!-- Price input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Price</label>
                    <input type="number" name="price" id="form2Example1" class="form-control" value="{{ old('price') }}">
                </div>

                <!-- Address input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Address</label>
                    <input type="text" name="address" id="form2Example1" class="form-control" value="{{ old('address') }}">
                </div>

                <!-- Image input -->
                <div class="form-outline mb-4">
                    <label for="image" class="form-label">Upload The Image</label>
                    <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error("image") is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary mb-4 btn-block">Insert</button>
            </form>
        </div>
    </div>
@endsection
