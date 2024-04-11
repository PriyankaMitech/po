/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function () {
  setTimeout(function () {
    $(".flash-messages").fadeOut(1000, function () {
      $(this).remove();
    });
  }, 10000); // 30 seconds
});

function validatePasswordMatch() {
  var newPassword = $('#newPassword').val();
  var confirmPassword = $('#confirmPassword').val();
  if (newPassword !== confirmPassword) {
      $('#NewpasswordError').text('Passwords do not match');
  } else {
      $('#NewpasswordError').text('');
  }
}

// Listen for input event on both password fields
$('#newPassword, #confirmPassword').on('input', function() {
  validatePasswordMatch();
});

$('#forgot-password').click(function (e) {
e.preventDefault();
var email = $('#email').val();

// Show loader
$('.loader').show();

$.ajax({
type: 'POST',
url: 'lostpassword',
data: { email: email },
success: function (response) {
  // Hide loader
  $('.loader').hide();
  
  if (response.status == 'success') {
      $('#forgotPasswordModal').modal('show');
  } else {
      alert('Failed to send OTP. Please try again.');
  }
},
error: function () {
  // Hide loader
  $('.loader').hide();
  alert('Failed to send OTP. Please try again.');
}
});
});

$('#submitOTP').click(function (e) {
  e.preventDefault();
  var otp = $('#otp').val();
  $.ajax({
      type: 'POST',
      url: 'otpvalidate',
      data: { entered_otp: otp },
      success: function (response) {
          console.log(response); // Check response in console
          if (response.status == 'success') {
              $('#forgotPasswordModal').modal('hide');
              $('#forgotPasswordModaltwo').modal('show'); // Show the password fields
          } else {
              console.log(response.message); // Check message in console
              $('#otpError').text(response.message);
              $('.invalid-feedback').text(response.message).addClass('d-block'); // Add d-block class
          }
      },
      error: function (xhr, status, error) {
          console.log(error); // Check for any errors
          $('#otpError').text('Error occurred while validating OTP');
      }
  });
});

$('#submitNewPassword').click(function (e) {
  e.preventDefault();
  var newPassword = $('#newPassword').val();
  var confirmPassword = $('#confirmPassword').val();
  var email = $('#email').val();
  // Validate password
  if (!validatePassword(newPassword)) {
      $('.invalid-feedbacks').text('Password must start with a capital letter, contain at least one special character, and be at least 8 characters long');
      return;
  }
  if (newPassword !== confirmPassword) {
      $('.invalid-feedbacks').text('Passwords do not match');
      return;
  }
  $.ajax({
      type: 'POST',
      url: 'newpassword',
      data: { new_password: newPassword, email: email },
      success: function (response) {
          console.log(response); 
          window.location.href = 'http://localhost/po/';
      },
      error: function (xhr, status, error) {
          console.log(error); 
      }
  });
});

// Function to validate password
function validatePassword(password) {
  var pattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;
  return pattern.test(password);
}
