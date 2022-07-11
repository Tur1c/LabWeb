@extends('template.template')

@section('title', 'Manage Company')

@section('container')
    <div class="container-fluid col-10 justify-content-center mt-3">
        <a class="btn btn-primary btn-lg"  href="{{ url('/company/create') }}">+ Add Office</a>
        <div class="row mt-4 mb-4">
            @foreach ($offices as $office)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $office->image) }}" class="card-img-top mb-2" alt="..." style="height: 125px">
                            <h5 class="card-title">{{ $office->office_name }}</h5>
                            <p class="card-text">{{ $office->office_address }}</p>
                            <p class="card-text text-muted"><i>{{ $office->contact_name }}</i> +{{ $office->contact_information }}</p>
                            <div class="d-flex justify-content-around">
                                <a href="/company/{{ $office->id }}/edit" class="btn btn-primary">Edit</a>
                                <form action="/company/{{ $office->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $offices->links() }}
        </div>
    </div>
@endsection
