@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h3>@lang('edit_doctor')</h3>
  <form class="row g-3 mt-2" action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-6">
      <label class="form-label" for="doctor_name">@lang('doctor_name')</label>
      <input class="form-control @error('doctor_name') is-invalid @enderror" 
             name="doctor_name" id="doctor_name" type="text"
             value="{{ old('doctor_name', $doctor->doctor_name) }}" required>
      @error('doctor_name')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label" for="email">@lang('doctor_email')</label>
      <input class="form-control @error('email') is-invalid @enderror" 
             name="email" id="email" type="email"
             value="{{ old('email', $doctor->email) }}" required>
      @error('email')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label" for="mobile_no">@lang('doctor_mobile')</label>
      <input class="form-control @error('mobile_no') is-invalid @enderror" 
             name="mobile_no" id="mobile_no" type="text"
             value="{{ old('mobile_no', $doctor->mobile_no) }}" required>
      @error('mobile_no')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label" for="speciality">@lang('speciality')</label>
      <input class="form-control @error('speciality') is-invalid @enderror" 
             name="speciality" id="speciality" type="text"
             value="{{ old('speciality', $doctor->speciality) }}">
      @error('speciality')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label" for="years_of_exp">@lang('years_of_exp')</label>
      <input class="form-control @error('years_of_exp') is-invalid @enderror" 
             name="years_of_exp" id="years_of_exp" type="number" min="0"
             value="{{ old('years_of_exp', $doctor->years_of_exp) }}">
      @error('years_of_exp')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label" for="status">@lang('doctor_status')</label>
      <select class="form-control @error('status') is-invalid @enderror" 
              name="status" id="status">
        <option value="Active" {{ old('status', $doctor->status) == 'Active' ? 'selected' : '' }}>@lang('active')</option>
        <option value="Inactive" {{ old('status', $doctor->status) == 'Inactive' ? 'selected' : '' }}>@lang('inactive')</option>
      </select>
      @error('status')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label" for="upload_image">@lang('upload_image')</label>
      <input class="form-control @error('upload_image') is-invalid @enderror" 
             name="upload_image" id="upload_image" type="file"
             accept=".jpeg,.jpg,.png">
      @error('upload_image')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      @if($doctor->upload_image)
        <img src="{{ asset('storage/' . $doctor->upload_image) }}" alt="Profile Image" width="100" class="mt-2">
      @endif
    </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit">@lang('update')</button>
    </div>
  </form>
</div>
@endsection
