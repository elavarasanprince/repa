document.addEventListener('DOMContentLoaded', function() {
document.getElementById('togglePassword').addEventListener('click', function () {
const passwordField = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');
if (passwordField.type === 'password') {
 passwordField.type = 'text';  // Show password
 eyeIcon.classList.remove('fa-eye');
 eyeIcon.classList.add('fa-eye-slash'); // Change icon to slash
} else {
 passwordField.type = 'password'; // Hide password
 eyeIcon.classList.remove('fa-eye-slash');
 eyeIcon.classList.add('fa-eye'); // Change icon back to eye
}
});

// Alphanumeric validation with minimum length (8 characters) for password field
document.getElementById('password').addEventListener('input', function () {
    const password = this.value;
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/;
    // Validate password
    if (!passwordPattern.test(password)) {
        this.setCustomValidity('Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one number, and one special character.');
        this.classList.add('is-invalid');
    } else {
        this.setCustomValidity('');
        this.classList.remove('is-invalid');
    }
});

document.getElementById('rating').addEventListener('input', function () {
    const value = this.value;

    // Regular expression for numbers between 1 and 5, allowing one decimal place restrict decimal for 0
    const ratingPattern = /^(5(\.0)?|[1-4](\.\d{0,1})?|0(\.0)?)?$/;
    if (!ratingPattern.test(value)) {
        this.value = value.slice(0, -1); // Remove the last invalid character
    }
});


function validateInput(event) {
const input = event.target;
const value = input.value;
let pattern;
let errorMessage;

// Mobile Number Validation: Should be exactly 10 digits
if (input.id === 'mobile_no') {
 pattern = /^[0-9]{0,10}$/; // Allows up to 10 digits
 errorMessage = 'Mobile number should be exactly 10 digits and contain only numbers.';
}
// Fees Validation: Should be up to 5 digits
else if (input.id === 'fees') {
 pattern = /^[0-9]{0,5}$/; // Allows up to 5 digits
 errorMessage = 'Fees should be a number and contain at most 5 digits.';
}

// Check if the input matches the pattern
if (!value.match(pattern)) {
 input.setCustomValidity(errorMessage);  // Set custom error message
 input.classList.add('is-invalid');      // Add Bootstrap's invalid class
} else {
 input.setCustomValidity('');            // Reset custom error message
 input.classList.remove('is-invalid');  // Remove Bootstrap's invalid class
}
}

function validateYearsOfExp(event){
    const input = event.target;
    const value = input.value;
    input.value = input.value.replace(/e/gi, '');
    if (input.value < 0) {
        input.value = 0; // Reset to 0 if negative
      }
    }
    document.getElementById('years_of_exp').addEventListener('input', validateYearsOfExp);

// Add event listeners for both fields
document.getElementById('mobile_no').addEventListener('input', validateInput);
document.getElementById('fees').addEventListener('input', validateInput);
$(document).ready(function() {
    // Check if there is a success message set
    if (window.successMessage && window.successMessage.trim() !== '') {
        toastr.success(window.successMessage, 'Success', {
            "closeButton": true,
            "progressBar": true,
            "timeOut": 5000,  // Prevent auto close (0 = no auto-close)
            // "extendedTimeOut": 0,
            positionClass: 'toast-top-right',
        });
    } else {
        console.error("No success message to show.");
    }
});


//  document.addEventListener('click', function (event) {
//     if (event.target && event.target.classList.contains('add-time-slot-btn')) {
//       const day = event.target.getAttribute('data-day');
//       addTimeSlot(day);
//     }
//     if(event.target && event.target.classList.contains('add_schedule')){
//         const itemId = event.target.getAttribute('data-id');
//         document.getElementById('item_id').value = itemId;

//         document.querySelectorAll('#scheduleForm input[type="text"]').forEach(input => {
//             if (input.id !== 'item_id') {
//                 input.value = '';
//             }
//         });
//     }
//   });
//   function addTimeSlot(day) {
//     const container = document.getElementById(`${day}-container`);

//     // Create a new time slot row
//     const slotRow = document.createElement('div');
//     slotRow.className = 'd-flex align-items-center mb-2';

//     slotRow.innerHTML = `
//       <input type="time" name="time[${day}][]" class="form-control me-2 time-from" required>
//       <input type="time" name="time[${day}][]" class="form-control me-2 time-to" required>
//       <button type="button" class="btn btn-sm btn-danger remove-time-slot-btn">Remove</button>
//     `;

//     container.appendChild(slotRow);
//   }

//   document.addEventListener('change', function (event) {
//     if (event.target.classList.contains('time-from') || event.target.classList.contains('time-to')) {
//       const parentRow = event.target.closest('.d-flex');
//       const timeFrom = parentRow.querySelector('.time-from').value;
//       const timeTo = parentRow.querySelector('.time-to').value;

//       if (timeFrom && timeTo) {
//         // Convert time strings to Date objects for comparison
//         const fromDate = new Date(`1970-01-01T${timeFrom}`);
//         const toDate = new Date(`1970-01-01T${timeTo}`);

//         // Check if time_from is greater than or equal to time_to
//         if (fromDate >= toDate) {
//           alert('The "From" time must be earlier than the "To" time.');
//           event.target.value = ''; // Clear the invalid input
//         }
//       }
//     }
//   });

//   document.addEventListener('click', function (event) {
//     if (event.target && event.target.classList.contains('remove-time-slot-btn')) {
//       event.target.parentElement.remove(); // Remove the slot row
//     }
//   });

});