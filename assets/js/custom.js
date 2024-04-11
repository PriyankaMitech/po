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

  $.validator.addMethod(
    "lettersOnly",
    function (value, element) {
      return this.optional(element) || /^[a-zA-Z]+$/.test(value);
    },
    "Please enter letters only."
  );

  $("#tax_form").validate({
    rules: {
      tax_name: {
        required: true,
        lettersOnly: true, // Custom method to allow only letters
      },
    },
    messages: {
      tax_name: {
        required: "Please enter your tax name.",
        lettersOnly: "Please enter letters only.",
      },
    },
  });

  $("#vendor_type_form").validate({
    rules: {
      vendor_type_name: {
        required: true,
        lettersOnly: true, // Custom method to allow only letters
      },
    },
    messages: {
      vendor_type_name: {
        required: "Please enter your vendor type name.",
        lettersOnly: "Please enter letters only.",
      },
    },
  });
});
