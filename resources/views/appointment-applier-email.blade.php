<div class="email-container" style="width:90%; max-width:600px; margin:auto; font-family:Arial, sans-serif; color:#333;">
    <div class="header" style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/logo2.png') }}" style="width:50px; height:50px; margin-bottom:10px;" alt="Shwe Maw Kun Logo">
        <h1 style="margin:0; font-size:24px; font-weight:600; color:#003366;">Shwe Maw Kun Private School</h1>
    </div>

    <div class="content" style="border:1px solid #ddd; border-radius:10px; padding:20px; box-shadow: 0px 0px 11px rgba(0,0,0,0.1); background-color:#f9f9f9;">
        <h3 style="font-size:20px; color:#444; margin-bottom:10px;">Dear <b style="color:darkblue; text-shadow: 0px 0px 4px #F3cd5d;">{{$name}}</b>,</h3>

        <p style="font-size:16px; line-height:1.6;">Thank you for scheduling an appointment with Shwe Maw Kun Private School! We have received your appointment request, and one of our team members will be in touch with you shortly. Below are the details of your appointment:</p>

        {{-- <div style="margin-top:20px;">
            <p style="font-size:16px; margin:5px 0;"><strong>Appointment Date:</strong> {{$booking_date}}</p>
            <p style="font-size:16px; margin:5px 0;"><strong>Appointment Time:</strong> {{$appointment_time}}</p>
            <p style="font-size:16px; margin:5px 0;"><strong>Purpose of Appointment:</strong> {{$appointment_purpose}}</p>
        </div> --}}

        <p style="font-size:16px; margin-top:20px;">If you need to reschedule or have any additional questions, feel free to reach out to us at any time. We're here to assist you!</p>

        <div style="margin-top:20px;">
            <p style="font-size:16px; font-weight:bold; margin-bottom:10px;">Phone:</p>
            <p style="font-size:16px; margin:5px 0;">
                <a href="tel:+959428377766" style="font-weight:normal; color:#003366;">09-428377766</a>,
                <a href="tel:+959252447066" style="font-weight:normal; color:#003366;">09-252 447066</a>
            </p>
        </div>

        <p style="font-size:16px; margin-top:30px; text-align:center; font-weight:bold; font-size:18px;">
            Best regards,<br>
            <span style="color:darkblue;">Shwe Maw Kun Private School Team</span>
        </p>

        <img src="{{asset('img/cover.jpg')}}" style="width:100%; margin-top:10px; border-radius:5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);" alt="Shwe Maw Kun Cover">
    </div>
</div>
