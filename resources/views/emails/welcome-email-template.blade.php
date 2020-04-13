<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome Email</title>
        <style>
                .logo{
                    padding: 10px;
                    background-color: #f8f8f4;
                    display: flex;
                }
                .logo p{
                    font-family: sans-serif;
                    font-size: 20px;
                }

                .content{
                    padding: 10px;
                }

                .make_strong{
                    font-weight: bold;
                }
            </style>
    </head>
    <body>
        <table cellpadding="0" cellspacing="0" align="center" bgcolor="#ffffff" width="100%" style="max-width:670px;border:1px solid #e8e8e8">
            <tbody>

                <tr>
                    <td class="logo">
                        <div style="float:left;width:100px;" >
                            <img src="{{url('assets/codelearner-logo.png')}}" alt="" style="width:100%;" border="0" class="">
                        </div>
                        <div style="padding-left: 15px;" >
                            <p>{{$company_name}}</p>
                        </div>
                        <div style="clear:both"></div>
                    </td>
                </tr>

                <tr> 
                    <td>
                        <div class="content" >
                            <p class="make_strong" >Hi {{$user['name']}},</p>
                            <p>Greetings from <span class="make_strong" >{{$company_name}}.</span></p>
                            <p>You'r account has been successfully registered.</p>
                            <a href="#" target="_blank" >Click to Login</a>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#E0E0E0" valign="center" align="center" height="50" style="color:#000000;font:600 13px/18px Segoe UI,Arial">
                        Copyright &#169; {{$company_name}}, All rights reserved.
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>