@extends('template.template')

@section('title', 'Manage Company')

@section('container')
    <div class="container-fluid col-10 justify-content-center mt-3">
        <a class="btn btn-primary btn-lg"  href="{{ url('/company/create') }}">+ Add Office</a>
        <div class="row mt-5">
            @foreach ($offices as $office)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $office->image) }}" class="card-img-top" alt="...">
                            <h5 class="card-title">{{ $office->office_name }}</h5>
                            <p class="card-text">{{ $office->office_address }}</p>
                            <p class="card-text">{{ $office->contact_name }} +{{ $office->contact_information }}</p>
                            <a href="/company/{{ $office->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="/company/{{ $office->id }}" method="post" class="d-inline">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $offices->links() }}
    </div>
@endsection
