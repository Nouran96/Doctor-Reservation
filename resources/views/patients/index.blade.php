@extends('layouts.app')

@section('content')

    <div class="container">

    @if(count($appointments) > 0)

        <table class="table">

            <thead class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Pain Type</th>
                <th scope="col">Speciality</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Doctor ID</th>
            </thead>

            <tbody>
        
            @foreach($appointments as $appointment)

                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{ $appointment->pain_type }}</td>
                    <td>{{ $appointment->speciality }}</td>
                    <td>{{ $appointment->patient_id }}</td>
                    <td>{{ $appointment->doctor_id ?: 'Not assigned yet' }}</td>
                </tr>

            @endforeach

            </tbody>

        </table>
    
    @else

        <p class="text-center">No Appointments Yet</p>

    @endif

    </div>

@endsection