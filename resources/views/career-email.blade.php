<div class="email-container" style="width:90%; max-width:600px; margin:auto; font-family:Arial, sans-serif; color:#333;">
    <div class="header" style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/logo2.png') }}" style="width:50px; height:50px; margin-bottom:10px;" alt="Shwe Maw Kun Logo">
        <h1 style="margin:0; font-size:24px;">Shwe Maw Kun Private School</h1>
    </div>

    <div class="content" style="border:1px solid #ddd; border-radius:10px; padding:20px; box-shadow: 0px 0px 11px rgba(0,0,0,0.1);">

        <p style="font-size:16px;">We have received a new application from an individual interested in joining our school. Below are the details of the application for your review:</p>

        <table style="width:100%; border-collapse:collapse; margin-top:20px;margin-bottom:20px;">
            <tr>
                <th style="text-align:left; padding:8px; background:#f4f4f4;">Title</th>
                <th style="text-align:left; padding:8px; background:#f4f4f4;">Details</th>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Name</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$name2}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Studied</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$studied}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Position</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$position}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Phone</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$phone}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Email</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$email}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Employment Status</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$estatus}}</td>
            </tr>
            <tr>
                <td style="padding:8px; border-bottom:1px solid #ddd;">Reason to Apply</td>
                <td style="padding:8px; border-bottom:1px solid #ddd;">{{$about}}</td>
            </tr>
        </table>
        <p style="font-size:16px; text-align:center;">
            <a href="https://smkedugroup.com/admin/career-view" style="background-color:#4CAF50; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">View Application Details</a>
        </p>
        <img src="{{asset('img/cover.jpg')}}" style="width:100%; margin-top:10px; border-radius:5px;" alt="Shwe Maw Kun Cover">
    </div>
</div>
