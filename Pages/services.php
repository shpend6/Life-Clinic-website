<!-- simple webapge that shows servies we offer and that includes the header and footer via php -->
<?php require "header.php"?>
       
       <div class="title">
            <p>Our Services</p>
        </div>
        <div class="service-img">
            <img src="css/services.png" alt="">
        </div>
        <div class="con">
            <div class="box1">
                <label for="" id="a">Appointment Scheduling</label>
                <p>Patients can book appointments online, reducing the need for phone calls and making the process more
                    convenient.</p>
            </div>
            <div class="box2">
                <label for="" id="b">Patient portal</label>
                <p>Patients can log in to a secure portal to view their medical records, test results, and communicate
                    with their healthcare provider.</p>
            </div>
            <div class="box3">
                <label for="" id="c">Online bill pay</label>
                <p>Patients can pay their bills online, making the process faster and more convenient.</p>
            </div>
        </div>
<?php require "footer.php" ?>