<?php
// get db connection object
require '../Scripts/generate_departments.php';
// get the script to generate valid dates so that the user can't book an appointment in the past
require '../Scripts/generate_valid_dates.php';
// get the script to display the header
require 'header.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dropdown Input Boxes</title>
	<!-- import ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		// This code is wrapped in document.ready(), which means
		// that the code will run when the document is fully loaded
		$(document).ready(function () {
			// add click event to select element
			//the code then sends a POST request to ../Scripts/generate_doctors.php
			//and displays the doctors in the dropdown
			$('#department').on('change', function () {
				var department = $(this).val();
				$.ajax({
					type: 'POST',
					url: '../Scripts/generate_doctors.php',
					data: { department: department },
					success: function (options) {
						$('#doctor').html(options);
					}
				});
			});
			//the same procedure here except for when either 
			//the doctor or the date select elements are changed
			//the code will send out another POST request to
			//the script ../Scripts/generate_valid_times.php
			//the server then will respond with a list of options for
			//the hour select element. When the response is sucessful,
			//the code will update the content of doctor or hour with
			//the .html() method
			$('#doctor, #date').on('change', function () {
				var doctor = $('#doctor').val();
				var date = $('#date').val();
				$.ajax({
					type: 'POST',
					url: '../Scripts/generate_valid_times.php',
					data: { doctor: doctor, date: date },
					success: function (result) {
						$('#hour').html(result);
					}
				});
			});
		});


	</script>
</head>

<body>
	<div id="container-booking">
		<form action="../Scripts/register_booking.php" method="POST">
			<label for="department">Department:</label>
			<select id="department" name="department" required>
				<option value="" placeholder="Choose Department"></option>
				<?php echo $options; ?>
			</select>
			<br><br>
			<label for="doctor">Doctor:</label>
			<select id="doctor" name="doctor" required>
				<option value="">Select a Department First</option>
			</select>
			<br><br>
			<label for="date">Select a date:</label>
			<input type="date" id="date" name="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
			<br><br>
			<label for="date">Select time:</label>
			<select id="hour" name="time" required>
				<option value=""></option>
			</select>

			<br><br>
			<label for="message">Reason for appointment: </label>
			<textarea id="message" name="message" rows="4" cols="40"></textarea>
			<br><br>


			<input type="submit" value="Book Appointment">
		</form>
	</div>
</body>

</html>
<?php require 'footer.php'; ?>