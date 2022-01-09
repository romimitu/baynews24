<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Id Card</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        .main {
            width: 346px;
            height: 214px;
            margin: auto;
            margin-bottom: 30px;
            position: relative;
        }
        .background-image {
            width: 345px;
            height: 212px;
            border-radius: 6px;
            position: relative;
            border: 1px solid gray;
            position: absolute;
        }
        .main-data {
            width: 345px;
            height: 212px;
            position: absolute;
        }
        .right-div,
        .left-div {
            position: absolute;
            float: left;
            width: 172px;
            height: 212px;
        }
        .logo {
            position: absolute;
            margin: 25px 0 0 18px;
        }
        .info {
            position: absolute;
            padding: 0 15px;
            height: 120px;
            margin-top: 80px;
        }
        .capitalize {
            text-transform: capitalize;
            font-weight: 800;
        }
        .register-hr {
            border-bottom: 1px solid black;
            width: 80px;
        }
        .back-div {
            padding: 10px;
            position: absolute;
            height: 194px;
            margin-left: 120px;
            width: 208px;
            display:
        }
    </style>
</head>

<body>
    @foreach ($journalist as $data)
    <div>
        <div class="main">
            <img class="background-image" src="https://timebanglanews.com/images/Front.jpg" alt="">
            <div class="main-data">
                <div class="left-div" style="font-size:15px; line-height: 1.5;">
                    <img class="logo" src="https://timebanglanews.com/frontend/img/watermarklogo.png" width="110" alt="">
                    <div class="info" style="font-size:13px;">
                        <span class="capitalize" style="color: #035308;">{{$data->name_en}}</span><br>
                        <span class="text-sm" style="color: red;">{{$data->designation}}</span><br>
                        <span class="text-sm">ID: {{str_pad($data->id+1, 4, '0', STR_PAD_LEFT)}}</span><br>
                        <span class="text-sm">Date Of Birth: {{$data->birthyear}}-{{$data->birthmonth}}-{{$data->birthdate}}</span><br>
                        <span class="text-sm">NID: {{$data->nid}}</span><br>
                        <span class="text-sm">Join Date: {{$data->joindate}}</span><br>
                    </div>
                </div>
                <div class="right-div" style="padding-left: 50px">
                    <img style="height: 70px; margin-left:15px;; margin-top:25px;"
                        src="https://timebanglanews.com/{{$data->image}}" alt="" width="75">
                    <div class="flex items-center" style="margin-top: 10px;">
                        <span style="position: absulate;">
                            <img src="https://timebanglanews.com/images/call.png"
                                style="position: absulate; color: black; width: 12px;" alt="">
                        </span>
                        <span class="text-xs ml-2" style="font-size: 13px;">{{$data->mobile}}</span>
                    </div>
                    <div class="flex items-center">
                        <span style="position: absulate;">
                            <img src="https://timebanglanews.com/images/blood-drop.png"
                                style="position: absulate; color: black; width: 12px;" alt="">
                        </span>
                        <span class="text-xs ml-2" style="font-size: 13px;">{{$data->blood_group}}</span>
                    </div>
                    <img class="mx-auto" src="https://timebanglanews.com/images/sign.png" alt="" width="45"
                        style="margin-left:20px; margin-top: 5px;">
                    <div class="border-b border-black border-b-1 w-full register-hr"></div>
                    <span class="mx-auto text-center block" style="margin-left: 20px;">Register</span>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="main">
            <img class="background-image" src="{{public_path('images/Back.jpg')}}" alt="">
            <div class="main-data">
                <div style="display: block;" class="back-div">
                    <p class="" style="font-size: 11px; line-height: 50%;">If found please return to the Register's
                        Office.</p>
                    <p class="" style="font-size: 11px; line-height: 20%;">ISSUING AUTHORITIY</p>                     
                    <p class="" style="color: blue; line-height: 40%;">Time Bangla News Office</p>
                    <div style="position:absolute; display: block;">
                        <div style="display: block; margin-bottom: 2px;">
                            <div style="display: inline-block; background: #e53e3e; padding: 8px;">
                                <img src="https://timebanglanews.com/images/home.png" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:8px; padding: 3px 3px; ">
                                Flat No: D-1, Floor: 1, MCT Hafiz Ullah Green 15/A, Zigatola (Bus Stand), Dhanmondi, Dhaka-1209.
                            </div>
                        </div>
                        <div style="display: block; margin-bottom: 2px;">
                            <div style="display: inline-block; background: #63b3ed; padding: 6px;">
                                <img src="https://timebanglanews.com/images/call-white.png" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:10px; padding: 9px 5px; ">
                                +88 01720530654
                            </div>
                        </div>
                        <div style="display: block; margin-bottom: 2px;">
                            <div style="display: inline-block; background: #4b1157; padding: 6px;">
                                <img src="https://timebanglanews.com/images/global.png" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:10px; padding: 9px 5px; ">
                                www.timebanglanews.com
                            </div>
                        </div>
                        <div style="display: block; margin-bottom: 2px;">
                            <div style="display: inline-block; background: #718096; padding: 6px;">
                                <img src="https://timebanglanews.com/images/email.png" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:10px; padding: 9px 5px; ">
                                timebangla.news24@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!$loop->last)
    <div class="page-break"></div>
    @endif
    @endforeach
</body>

</html>