<div style="width:90%; max-width:600px; margin:auto; font-family:Arial, sans-serif; color:#333; background-color:#f9f9f9; padding:20px; border-radius:10px;">
    <div style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/logo2.png') }}" style="width:60px; height:60px; margin-bottom:10px;" alt="Shwe Maw Kun Logo">
        <h1 style="font-size:26px; color:#2a3f54;">Shwe Maw Kun Private School</h1>
    </div>

    <div style="background:#fff; border:1px solid #ddd; border-radius:10px; padding:20px; box-shadow:0 2px 10px rgba(0, 0, 0, 0.1);">
        <h3 style="font-size:22px; color:#444;">Dear <b style="color:darkblue; text-shadow: 0px 0px 4px #f3cd5d;">{{ $name2 }}</b>,</h3>
        <p style="font-size:16px; line-height:1.6;">We are pleased to confirm your appointment. Here are the details:</p>

        <table style="width:100%; font-size:16px; margin:20px 0; border-collapse:collapse;">
            <tr>
                <td style="padding:10px 0; font-weight:bold;">Date:</td>
                <td style="padding:10px 0;">{{ $appointmentDate }}</td>
            </tr>
            <tr>
                <td style="padding:10px 0; font-weight:bold;">Day Type:</td>
                <td style="padding:10px 0;">{{ $dayType }}</td>
            </tr>
            <tr>
                <td style="padding:10px 0; font-weight:bold;">Time:</td>
                <td style="padding:10px 0;">{{ $startTime }} - {{ $endTime }}</td>
            </tr>
        </table>

        <p style="font-size:16px; line-height:1.6;">Our team will follow up with you soon. If you have any questions, feel free to contact us:</p>
        <p style="font-size:16px; font-weight:bold;">Phone:
            <a href="tel:+959428377766" style="color:#2a3f54; text-decoration:none;">09-428377766</a>,
            <a href="tel:+959252447066" style="color:#2a3f54; text-decoration:none;">09-252447066</a>
        </p>

        <div style="text-align:center; margin-top:20px; font-size:16px; line-height:1.6; color:#555;">
            <p>Best regards,</p>
            <p><strong>Shwe Maw Kun Private School Team</strong></p>
        </div>
    </div>

    <div style="text-align:center; margin-top:20px;">
        <img src="{{ asset('img/cover.jpg') }}" style="width:100%; border-radius:5px;" alt="Shwe Maw Kun Cover">
    </div>


</div>
