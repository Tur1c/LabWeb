@extends('template.template')

@section('title', 'Edit Company')

@section('container')
    <div class="container-fluid d-flex ml-5 mr-5 mt-5">
        <div class="col-5 ms-4">
            <img src="{{ asset('storage/' . $office->image) }}" alt="" style="width: 100%; height:75%">
        </div>
        <div class="col-6" style="margin-left: 3rem;">
            <form action="/company/{{ $office->id }}" method="post">
                @csrf
                @method("put")
                <!-- Office Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Office Name</label>
                    <input type="text" name="office_name" id="form2Example1" class="form-control" value="{{ $office->office_name }}">
                </div>

                <!-- Office Address input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Office Address</label>
                    <input type="text" name="office_address" id="form2Example1" class="form-control" value="{{ $office->office_address }}">
                </div>

                <!-- Office Contact input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Contact Name</label>
                    <input type="text" name="contact_name" id="form2Example1" class="form-control" value="{{ $office->contact_name }}">
                </div>

                <!-- Phone Number input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Phone Number</label>
                    <input type="text" name="contact_information" id="form2Example1" class="form-control @error("contact_information") is-invalid @enderror" value="{{ $office->contact_information }}">
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Button -->
                <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary mb-4 btn-block">Update</button>
                    <button class="btn btn-danger mb-4 btn-block" onclick="history.go(-1)">Back</button>
                </div>

            </form>
        </div>
    </div>
@endsection
