<!-- resources/views/flights/index.blade.php -->

@extends('layouts.app')

@section('title', 'Flights')

@section('content')

<style>
    
</style>

<div class="container">
    <h1 class="mb-4">Flights</h1>

    <!-- Check if there are any flights -->
    @if($flights->isEmpty())
        <p>No flights available.</p>
    @else
        <!-- Table to display flight information -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Airline</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the flights -->
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $flight->id }}</td>
                        <td>{{ $flight->name }}</td>
                        <td>{{ $flight->airline }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Link to create a new flight -->
</div>
@endsection
