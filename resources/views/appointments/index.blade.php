@extends('layouts.app')

@section('content')

    <div class="container">

    @role('patient')
        <a class="btn btn-danger" href="{{ route('appointments.create') }}">Make a Reservation</a>
    @endrole

    @if(count($appointments) > 0)

        <table class="table mt-4">

            <thead class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Pain Type</th>
                <th scope="col">Speciality</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Doctor ID</th>
                <th scope="col">Reservation Date</th>
                @role('admin')
                <th scope="col">Actions</th>
                @endrole
            </thead>

            <tbody>
        
            @foreach($appointments as $appointment)

                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{ $appointment->pain_type }}</td>
                    <td>{{ $appointment->speciality }}</td>
                    <td>{{ $appointment->patient_id }}</td>
                    <td>{{ $appointment->doctor_id ?: 'Not assigned yet' }}</td>
                    <td>{{ $appointment->reservation_date ?: 'Not assigned yet' }}</td>
                    @role('admin')
                    <td><a class="btn btn-success" href="{{ route('appointments.edit', ['appointment' => $appointment->id]) }}">Update</a></td>
                    @endrole
                </tr>

            @endforeach

            </tbody>

        </table>
    
    @else

        <p class="text-center">No Appointments Yet</p>

    @endif

    </div>

@endsection