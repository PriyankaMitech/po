"use strict";

$(".pwstrength").pwstrength();
$(document).ready(function () {
  // Add custom validation methods
  $.validator.addMethod(
    "lettersOnly",
    function (value, element) {
      return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    },
    "Please enter letters only."
  );

  $.validator.addMethod(
    "customPassword",
    function (value, element) {
      return (
        this.optional(element) ||
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(
          value
        )
      );
    },
    "Password must contain at least one uppercase letter, one lowercase letter, one number, one symbol, and be at least 8 characters long."
  );

  // Initialize form validation
  $("#register_form").validate({
    rules: {
      first_name: {
        required: true,
        lettersOnly: true,
      },
      last_name: {
        required: true,
        lettersOnly: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        customPassword: true,
      },
      passwordconfirm: {
        required: true,
        equalTo: "#password",
      },
      agree: {
        required: true,
      },
    },
    messages: {
      first_name: {
        required: "Please enter your first name.",
      },
      last_name: {
        required: "Please enter your last name.",
      },
      email: {
        required: "Please enter your email address.",
        email: "Please enter a valid email address.",
      },
      password: {
        required: "Password is required.",
      },
      passwordconfirm: {
        required: "Please confirm your password.",
        equalTo: "Passwords do not match.",
      },
      agree: {
        required: "Please check 'I agree with the terms and conditions.'",
      },
    },
  });
});
