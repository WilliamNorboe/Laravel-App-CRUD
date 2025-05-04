<!-- resources/views/flights/index.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Flight')

@section('content')


<div class="container">
    <h1 class="mb-4">Edit Flight</h1>

        <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif
    <form action="{{ route('flight.updateFlight', ['flight' => $flight->id]) }}" method="POST">
        @csrf <!-- Include CSRF token for security -->    
        @method('PUT') 
        <div class="mb-3">
            <label for="name" class="form-label">Flight Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $flight->name }}" required>
        </div>

        <div class="mb-3">   
            <label for="airline" class="form-label">Airline</label>
            <input type="text" class="form-control" id="airline" name="airline" value="{{ $flight->airline }}" required>
        </div>  

        {{-- <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required>
        </div> --}}

        <button type="submit" class="btn btn-primary">Create Flight</button>
        <a href="{{ route('flight.index') }}" class="btn btn-secondary">Cancel</a> 
    </form>

</div>
@endsection
