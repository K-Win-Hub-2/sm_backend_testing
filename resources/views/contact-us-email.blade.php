<div class="email-container" style="width:90%; max-width:600px; margin:auto; font-family:Arial, sans-serif; color:#333;">
    <div class="header" style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/logo2.png') }}" style="width:50px; height:50px; margin-bottom:10px;" alt="Shwe Maw Kun Logo">
        <h1 style="margin:0; font-size:24px;">Shwe Maw Kun Private School</h1>
    </div>

    <div class="content" style="border:1px solid #ddd; border-radius:10px; padding:20px; box-shadow: 0px 0px 11px rgba(0,0,0,0.1);">
        <h3 style="font-size:20px; color:#444;">Dear <b style="color:darkblue; text-shadow: 0px 0px 4px #F3cd5d;">{{$name}}</b>,</h3>

        <p style="font-size:16px;">Thank you for reaching out to us. We have received your contact request, and one of our team members will be in touch shortly. Below are the details of your submission:</p>

        <table style="width:100%; border-collapse:collapse; margin-top:20px;">
            <tr>
                <th style="text-align:left; padding:8px; background:#f4f4f4;">Field</th>
                <th style="text-align:left; padding:8px; background:#f4f4f4;">Details</th>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Name</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$name}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Email</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$email}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Phone</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$phone}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Subject</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$subject}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Content</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$content}}</td>
            </tr>
        </table>

        <p style="margin-top:20px; font-size:16px;">If you have any additional questions or would like to follow up on your inquiry, please feel free to reach out to us at any time.</p>

        <p style="font-size:16px; font-weight:bold;">Phone: <a href="tel:+959428377766" style="font-weight:normal;">09-428377766</a>, <a href="tel:+959252447066" style="font-weight:normal;">09-252 447066</a></p>

        <p style="margin-top:30px; font-size:18px; text-align:center;">
            <b>Best regards,</b><br>
            <span style="color:darkblue;">Shwe Maw Kun Private School Team</span>
        </p>

        <img src="{{asset('img/cover.jpg')}}" style="width:100%; margin-top:10px; border-radius:5px;" alt="Shwe Maw Kun Cover">
    </div>
</div>
