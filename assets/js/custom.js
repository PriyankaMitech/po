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
