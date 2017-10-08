<!DOCTYPE html>
<html>
    <head>
        <title>Account Inactive</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 25px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><b>Account is pending activation.<br>Please try after sometime.Thank you for your patience.</b><br><br><small><b><i>(It normally takes 15-30 minutes to activate account.<br>Not activated still? Please connect with ClinicJet Support)</i></small></b></div>
                <br>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" >Back to Home</a>

                <form id="logoutform" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </body>
</html>
