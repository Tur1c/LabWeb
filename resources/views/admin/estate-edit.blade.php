@extends('template.template')

@section('title', 'Edit Company')

@section('container')
    <div class="container-fluid d-flex ml-5 mr-5 mt-5">
        <div class="col-5">
            <img src="{{ asset('storage/' . $property->image) }}" alt="" style="width: 100%; height:75%">
        </div>
        <div class="col-6" style="margin-left: 4rem">
            <form action="/real-estate/{{ $property->id }}" method="post">
                @csrf
                @method("put")

                <!-- Type input -->
                <div class="form-outline mb-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Sales Type</div>
                      </div>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option >Choose the type of sales</option>
                        @foreach ($categories as $category)
                            @if (old("category_id", $property->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <!-- Building Type input -->
                <div class="form-outline mb-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Sales Type</div>
                      </div>
                    <select class="form-select" aria-label="Default select example" name="building_id">
                        <option >Choose the Building Type</option>
                        @foreach ($buildings as $building)
                            @if (old("building_id", $property->building_id) == $building->id)
                                <option value="{{ $building->id }}" selected>{{ $building->name }}</option>
                            @else
                                <option value="{{ $building->id }}">{{ $building->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                 <!-- Price input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Price</label>
                    <input type="number" name="price" id="form2Example1" class="form-control" value="{{ old('price', $property->price) }}">
                </div>

                <!-- Address input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Address</label>
                    <input type="text" name="address" id="form2Example1" class="form-control" value="{{ old('address', $property->address) }}">
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary mb-4 btn-block">Update</button>
            </form>
        </div>
    </div>
@endsection
