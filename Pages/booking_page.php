<!-- this is the page where the previous bookings of the client are displayed the footer and header
are included as well-->
<?php require 'header.php' ?>


<br>
<div class="bookings-buttons">
  <a href="?requestType=previous" id="show-previous">Show Previous Appointments</a>
  <a href="create_booking.php">Make an appointment</a>
  <a href="?requestType=upcoming" id="show-upcoming">Show Upcoming Appointments</a>


</div>
<div id="table-container">
  <?php
  // Include the generate_bookings.php file
  if (isset($_GET['requestType'])) {
    include('../Scripts/generate_bookings.php');
  }
  ?>
</div>
<script>
  // $(document).ready(function () {
  //   $('#show-upcoming, #show-previous').on('click', function () {
  //     var requestType = $(this).attr('id').split('-')[1];
  //     $.ajax({
  //       type: 'POST',
  //       url: '../Scripts/generate_bookings.php',
  //       data: { requestType: requestType },
  //       success: function (options) {
  //         $('#table-container').html(options);
  //       },
  //       error: function (xhr, status, error) {
  //         alert('Error: ' + error);
  //       }
  //     });
  //   });
  // });

</script>
<?php require 'footer.php' ?>