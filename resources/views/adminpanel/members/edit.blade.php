@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('doctor.show', $doctor->id) }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left me-2"></i> Back to Doctor Schedule
    </a>

    <h1>Edit Schedule for: {{ $doctor->doctor_name }}</h1>

    <h3>Time Slot: {{ $schedule->time_slot }}</h3>
    
    <!-- Form to Edit the Schedule -->
    <form action="{{ route('doctor.schedule.update', ['doctor_id' => $doctor->id, 'schedule_id' => $schedule->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="slot-time" class="form-label">Time Slot</label>
            <input type="text" class="form-control" id="slot-time" name="slot_time" value="{{ $schedule->time_slot }}" required>
        </div>

        <h4>Available Time Slots</h4>
        <div class="list-group">
        @foreach ($schedule->timeSlots as $slot)
    <div class="list-group-item">
        <input type="checkbox" name="slot_ids[]" value="{{ $slot->id }}" 
               {{ $slot->is_booked ? 'checked' : '' }} 
               {{ $slot->is_booked === null ? 'disabled' : '' }}>
        <span style="color: {{ $slot->is_booked === null ? 'gray' : ($slot->is_booked ? 'red' : 'green') }}">
            {{ $slot->slot_time }} - 
            {{ $slot->is_booked === null ? 'Unavailable' : ($slot->is_booked ? 'Booked' : 'Available') }}
        </span>
    </div>
@endforeach


        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
    </form>
</div>
@endsection



<style>
    .form-check-input:checked {
        background-color: #FF7F32 !important; /* Bright orange for booked slots */
    }

    .form-check-label {
        font-weight: bold;
    }

    .list-group-item {
        padding: 10px;
        margin-bottom: 5px;
    }
</style>
