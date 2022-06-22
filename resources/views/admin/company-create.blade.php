@extends('template.template')

@section('title', 'Add Company')

@section('container')
    <div class="container-fluid col-6 mt-5">
        <form action="/company" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Office Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Office Name</label>
                <input type="text" name="office_name" id="form2Example1" class="form-control" value="{{ old('office_name') }}">
            </div>

            <!-- Office Address input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Office Address</label>
                <input type="text" name="office_address" id="form2Example1" class="form-control" value="{{ old('office_address') }}">
            </div>

            <!-- Office Contact input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Contact Name</label>
                <input type="text" name="contact_name" id="form2Example1" class="form-control" value="{{ old('contact_name') }}">
            </div>

            <!-- Phone Number input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Phone Number</label>
                <input type="text" name="contact_information" id="form2Example1" class="form-control @error("contact_information") is-invalid @enderror" value="{{ old('contact_information') }}" v>
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
@endsection
