@foreach($list as $key => $value)
<tr>
  <td class="text-center">{{ $list->firstItem() + $key }}</td>
  <td class="text-center">Dr. {{ $value['doctor_name'] }}</td>
  <td class="text-center">{{ $value['mobile_no'] }}</td>
  <td class="text-center">{{ $value['speciality'] }}</td>
  <td class="text-center">
    <a href="{{ route('doctor.profile', ['doctor_id' => $value['id']]) }}" 
       class="d-flex align-items-center justify-content-center"
       style="white-space: nowrap;">
      <i class="fas fa-user text-info"></i>
    </a>
  </td>
  <td class="text-center">
    <div class="d-flex justify-content-center gap-3">
      <a href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal" 
         data-id="{{ $value['id'] }}" 
         class="d-flex align-items-center justify-content-center" title="Add Schedule">
        <i class="fas fa-calendar-plus text-success fa-lg"></i>
      </a>
      <a href="{{ route('doctor.show', ['doctor_id' => $value['id']]) }}" 
         class="d-flex align-items-center justify-content-center" title="View Schedule">
        <i class="fas fa-eye text-primary fa-lg eye-icon"></i>
      </a>
    </div>
  </td>
</tr>
@endforeach

