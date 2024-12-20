<div class="email-container" style="width:90%; max-width:600px; margin:auto; font-family:Arial, sans-serif; color:#333;">
    <div class="header" style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/logo2.png') }}" style="width:50px; height:50px; margin-bottom:10px;" alt="Shwe Maw Kun Logo">
        <h1 style="margin:0; font-size:24px;">Shwe Maw Kun Private School</h1>
    </div>

    <div class="content" style="border:1px solid #ddd; border-radius:10px; padding:20px; box-shadow: 0px 0px 11px rgba(0,0,0,0.1);">
        <p style="font-size:16px;">We have scheduled an appointment with the following details:</p>

        <ul style="font-size:16px; line-height:1.8;">
            <li><b>Parent's Name:</b> {{ $parent_name }}</li>
            <li><b>Student's Name:</b> {{ $student_name }}</li>
            <li><b>Email:</b> {{ $email }}</li>
            <li><b>Phone:</b> {{ $phone }}</li>
            <li><b>Booking Date:</b> {{ $booking_date }}</li>
            <li><b>Day Type:</b> {{ $dayType }}</li>
            <li><b>Time Slot:</b> {{ $start_time }} - {{ $end_time }}</li>
        </ul>

        <p style="font-size:16px; text-align:center;">
            <a href="https://smkedugroup.com/admin/appoinment-enquiry-list" style="background-color:#4CAF50; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">View Application Details</a>
        </p>

        <img src="{{ asset('img/cover.jpg') }}" style="width:100%; margin-top:10px; border-radius:5px;" alt="Shwe Maw Kun Cover">
    </div>
</div>
