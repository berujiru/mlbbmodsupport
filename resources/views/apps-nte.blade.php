@extends('layouts.master')
@section('title') @lang('translation.mailbox') @endsection
@section('content')
<div class="email-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="email-content">
        <div class="p-4 pb-0">
            <div class="border-bottom border-bottom-dashed">
                <div class="row mt-n2 mb-3 mb-sm-0">
                    <div class="col col-sm-auto order-1 d-block d-lg-none">
                        <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 email-menu-btn">
                            <i class="ri-menu-2-fill align-bottom"></i>
                        </button>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col">
                        <ul class="nav nav-tabs nav-tabs-custom nav-success gap-1 text-center border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" href="{{ route('mailbox') }}">
                                    <i class="ri-inbox-fill align-bottom d-inline-block"></i>
                                    <span class="ms-1 d-none d-sm-inline-block">QA Scores</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold active" href="#">
                                    <i class="ri-file-edit-line align-bottom d-inline-block"></i>
                                    <span class="ms-1 d-none d-sm-inline-block">NTE <span class="bg-success badge me-2">New</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="text-muted">{{count($data)}} mails</div>
                    </div>
                </div>
            </div>

            <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                <ul class="message-list">

                @foreach ($data as $key => $mail)
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck20">
                                <label class="form-check-label" for="flexCheck20"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15 active">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="{{ route('nteview',$mail->id) }}" class="title">MLBB MIL-QA</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="{{ route('nteview',$mail->id) }}" class="subject">

                                    <span class="bg-warning badge me-2">{{$mail->RecommendedAction}}</span>
                                    <b>{{$mail->RecommendedAction}}</b> - <span class="teaser">{{$mail->Attribute}}</span>

                            
                               
                            </a>
                            <div class="date">{{$mail->InfractionDate}}</div>
                        </div>
                    </li>
                @endforeach
                    

                </ul>
            </div>
        </div>
    </div>
    <!-- end email-content -->

    <div class="email-detail-content">
        <div class="p-4 d-flex flex-column h-100">
            <div class="pb-4 border-bottom border-bottom-dashed">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <button type="button" class="btn btn-soft-danger btn-icon btn-sm fs-16 close-btn-email">
                                <i class="ri-close-fill align-bottom"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-n4 px-4 email-detail-content-scroll" data-simplebar>
                <div class="mt-4 mb-3">
                    <h5 class="fw-bold">MLBB QA Score</h5>
                </div>

                <div class="accordion accordion-flush">
                    <div class="accordion-item border-dashed">
                        <div class="accordion-header">
                            <a role="button" class="btn w-100 text-start px-0 bg-transparent shadow-none" data-bs-toggle="collapse" href="#email-collapseOne" aria-expanded="true" aria-controls="email-collapseOne">
                                <div class="d-flex align-items-center text-muted">
                                    <div class="flex-shrink-0 avatar-xs me-3">
                                        <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate mb-0">MLBBMODSUPPORT TEAM</h5>
                                        <div class="text-truncate fs-12">to: me</div>
                                    </div>
                                    <div class="flex-shrink-0 align-self-start">
                                        <div class="text-muted fs-12">09 Jan 2022, 11:12 AM</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="email-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body text-body px-0">
                                <div>


                                    <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;background:#f4f4f4;border-collapse:collapse'>
                                        <tbody>
                                            <tr>
                                                <td valign='top' style='padding:0in 0in 0in 0in'>
                                                    <div align='center'>
                                                        <table border='0' cellspacing='0' cellpadding='0' width='620' style='width:465.0pt;border-collapse:collapse'>
                                                            <tbody>
                                                                <tr>
                                                                    <td width='620' valign='top' style='width:465.0pt;padding:0in 0in 0in 0in'>
                                                                        <div align='center'>
                                                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:465.0pt;border-collapse:collapse'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign='top' style='padding:0in 7.5pt 0in 7.5pt'>
                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                <tbody>
                                                                                                    <tr style='height:15.0pt'>
                                                                                                        <td style='padding:0in 0in 0in 0in;height:15.0pt'>
                                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <p class='MsoNormal'><span style='display:none'><u></u>&nbsp;<u></u></span></p>
                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td width='600' valign='top' style='width:6.25in;background:#1b1b1b;padding:0in 0in 0in 0in;background-size:cover;border-radius:8px'>
                                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse;background-size:cover;border-radius:8px'>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td valign='top' style='padding:30.0pt 0in 0in 22.5pt'>
                                                                                                                            <p class='MsoNormal'><img width='150' height='50' style='width:1.5625in;height:.5208in' id='m_-1072692808158362941_x0000_i1029' src='https://ci6.googleusercontent.com/proxy/uxxdCc2sgioTwQ_-Pbxf62rjpZYSyYeW5gbWMJleBXMtFQQodPGUQO-WcD15sZaydCU=s0-d-e1-ft#https://i.imgur.com/otU97F8.png' alt='Logo' class='CToWUd'><br>
                                                                                                                            <h1 style='color:#FFFFFF;'>Weekly QA Score</h1><u></u><u></u></p>
                                                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                                                <tbody>
                                                                                                                                    <tr>
                                                                                                                                        <td style='padding:0in 0in 0in 0in'>
                                                                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </td>
                                                                                                                        <td width='30' valign='top' style='width:22.5pt;padding:0in 0in 0in 0in'>
                                                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                    <tr style='height:30.0pt'>
                                                                                                                        <td colspan='2' style='padding:0in 0in 0in 0in;height:30.0pt'>
                                                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <p class='MsoNormal' align='center' style='text-align:center'><span style='display:none'><u></u>&nbsp;<u></u></span></p>
                                                                        <div align='center'>
                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                <tbody>
                                                                                    <tr style='height:6.0pt'>
                                                                                        <td style='padding:0in 0in 0in 0in;height:6.0pt'>
                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <p class='MsoNormal' align='center' style='text-align:center'><span style='display:none'><u></u>&nbsp;<u></u></span></p>
                                                                        <div align='center'>
                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign='top' style='background:#e5f6eb;padding:30.0pt 15.0pt 30.0pt 15.0pt;border-radius:8px'>
                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse;border-radius:8px'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td valign='top' style='padding:0in 15.0pt 0in 15.0pt'>
                                                                                                            <p class='MsoNormal' style='line-height:25.5pt'><b><span style='font-size:18.0pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#151515;letter-spacing:-.3pt'>Hi "+ modname +",<u></u><u></u></span></b></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr style='height:7.5pt'>
                                                                                                        <td style='padding:0in 0in 0in 0in;height:7.5pt'>
                                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td valign='top' style='padding:0in 15.0pt 0in 15.0pt'>
                                                                                                            <p align='center' style='color:#167000;font-size:20pt;line-height:20pt;'>Your QA Score is</p>
                                                                                                            <p align='center' style='color:#167000;background-color:#00ff141c;font-size:70pt;margin:0px;'><b>100%</b></p>
                                                                                                            <br>
                                                                                                            <p align='center' style='color:#167000;font-size:12pt;line-height:5pt;margin:0px;'><i>Keep up the good work!</i></p>
                                                                                                            <br>
                                                                                                            <i>If you have any questions and concerns, contact your assigned QA Specialist.</i><u></u><u></u></span></p>
                                                                                                            <p class='MsoNormal' align='center' style='text-align:center;line-height:21.0pt'>
                                                                                                                <i><span style='font-size:13.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#9b9b9b;letter-spacing:-.15pt'>--DO NOT REPLY TO THIS EMAIL--</span></i><span style='font-size:13.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#9b9b9b;letter-spacing:-.15pt'><u></u><u></u></span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr style='height:15.0pt'>
                                                                                                        <td style='padding:0in 0in 0in 0in;height:15.0pt'>
                                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <p class='MsoNormal' align='center' style='text-align:center'><span style='display:none'><u></u>&nbsp;<u></u></span></p>
                                                                        <div align='center'>
                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                <tbody>
                                                                                    <tr style='height:6.0pt'>
                                                                                        <td style='padding:0in 0in 0in 0in;height:6.0pt'>
                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <p class='MsoNormal' align='center' style='text-align:center'><span style='display:none'><u></u>&nbsp;<u></u></span></p>
                                                                        <div align='center'>
                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign='top' style='background:#1b1b1b;padding:15.75pt 15.0pt 10.5pt 15.0pt;border-radius:8px'>
                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse;border-radius:8px'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td valign='top' style='padding:0in 0in 0in 0in'>
                                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td width='280' valign='top' style='width:210.0pt;padding:0in 0in 0in 0in'>
                                                                                                                            <div>
                                                                                                                                <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                                                    <tbody>
                                                                                                                                        <tr>
                                                                                                                                            <td valign='top' style='padding:15.0pt 15.0pt 15.0pt 15.0pt'>
                                                                                                                                                <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                                                                    <tbody>
                                                                                                                                                        <tr>
                                                                                                                                                            <td valign='top' style='padding:0in 0in 0in 0in'>
                                                                                                                                                                <p class='MsoNormal' style='line-height:18.0pt'><span style='font-size:13.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:white;letter-spacing:-.15pt'>Follow Us.
                                                                                                                                                                        <u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr style='height:8.25pt'>
                                                                                                                                                            <td style='padding:0in 0in 0in 0in;height:8.25pt'>
                                                                                                                                                                <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr>
                                                                                                                                                            <td valign='top' style='padding:0in 0in 0in 0in'>
                                                                                                                                                                <p class='MsoNormal' style='line-height:15.0pt'><span style='font-size:10.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#d8d8d8;letter-spacing:-.15pt'>The MLBB Moderator Team is composed of globally competent professionals aiming
                                                                                                                                                                        to support and improve the player-base game experiences.<u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr style='height:42.0pt'>
                                                                                                                                                            <td style='padding:0in 0in 0in 0in;height:42.0pt'>
                                                                                                                                                                <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr>
                                                                                                                                                            <td valign='top' style='padding:0in 0in 0in 0in'>
                                                                                                                                                                <p class='MsoNormal'><a href='https://www.facebook.com/MobileLegendsOnlinePH/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/MobileLegendsOnlinePH/&amp;source=gmail&amp;ust=1644022221669000&amp;usg=AOvVaw1pOUgREPOPHc1B5kilo9Eh'><span style='font-size:14.5pt;font-family:&quot;Arial&quot;,sans-serif;text-decoration:none'><img border='0' width='20' height='20' style='width:.2083in;height:.2083in' id='m_-1072692808158362941_x0000_i1027' src='https://ci3.googleusercontent.com/proxy/xZaxsFGqpZUynVHMG7v33dldcW2u0KrKhh1XOi0weEV5H6AO2UvwMjtHVGBBwa9o8E0=s0-d-e1-ft#https://i.imgur.com/XMNJUJw.png' 'class=' CToWUd'></span></a><span style='font-size:14.5pt;font-family:&quot;Arial&quot;,sans-serif'>&nbsp;&nbsp;
                                                                                                                                                                    </span><a href='https://twitter.com/MobileLegendsOL' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://twitter.com/MobileLegendsOL&amp;source=gmail&amp;ust=1644022221669000&amp;usg=AOvVaw0i0HJ1vXxHOyeevTCiMCAF'><span style='font-size:14.5pt;font-family:&quot;Arial&quot;,sans-serif;text-decoration:none'><img border='0' width='21' height='18' style='width:.2187in;height:.1875in' id='m_-1072692808158362941_x0000_i1026' src='https://ci4.googleusercontent.com/proxy/P9HkYZgoE1EwW_XrkM7rJpMJEgvsHVhOD7H-lmpDbXW1UeCEbHfvx50fv5LlCWt8Nuk=s0-d-e1-ft#https://i.imgur.com/OjsWd90.png' class='CToWUd'></span></a><span style='font-size:14.5pt;font-family:&quot;Arial&quot;,sans-serif'>&nbsp;&nbsp;
                                                                                                                                                                    </span><a href='https://www.instagram.com/mobilelegendsgame/?hl=en' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.instagram.com/mobilelegendsgame/?hl%3Den&amp;source=gmail&amp;ust=1644022221669000&amp;usg=AOvVaw2-MFRBJkUTZMK7XzKb9Mti'><span style='font-size:14.5pt;font-family:&quot;Arial&quot;,sans-serif;text-decoration:none'><img border='0' width='21' height='20' style='width:.2187in;height:.2083in' id='m_-1072692808158362941_x0000_i1025' src='https://ci4.googleusercontent.com/proxy/u41nWgUqMc32gTscNKFcZmRd8KzJxeHIICpy7azo8twWzl9EleD0oBtaSAtq_Kip9Jk=s0-d-e1-ft#https://i.imgur.com/78z41oD.png' class='CToWUd'></span></a><span style='font-size:14.5pt;font-family:&quot;Arial&quot;,sans-serif'><u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                    </tbody>
                                                                                                                                                </table>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                        <td width='280' valign='top' style='width:210.0pt;padding:0in 0in 0in 0in'>
                                                                                                                            <div>
                                                                                                                                <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                                                    <tbody>
                                                                                                                                        <tr>
                                                                                                                                            <td valign='top' style='padding:15.0pt 15.0pt 15.0pt 15.0pt'>
                                                                                                                                                <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                                                                                    <tbody>
                                                                                                                                                        <tr>
                                                                                                                                                            <td valign='top' style='padding:0in 0in 0in 0in'>
                                                                                                                                                                <p class='MsoNormal' style='line-height:18.0pt'><span style='font-size:13.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:white;letter-spacing:-.15pt'>Contact us on Telegram.<u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>"
                                                                                                                                                        <tr style='height:8.25pt'>
                                                                                                                                                            <td style='padding:0in 0in 0in 0in;height:8.25pt'>
                                                                                                                                                                <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr>
                                                                                                                                                            <td valign='top' style='padding:0in 0in 0in 0in'>
                                                                                                                                                                <p class='MsoNormal' style='margin-bottom:12.0pt;line-height:15.0pt'>
                                                                                                                                                                    <span style='font-size:10.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#d8d8d8;letter-spacing:-.15pt'>Laurence Basoy&nbsp;
                                                                                                                                                                    </span><span style='font-size:9.0pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#d8d8d8;letter-spacing:-.15pt'>@laomlbb<br>
                                                                                                                                                                    </span><span style='font-size:10.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#d8d8d8;letter-spacing:-.15pt'><br>
                                                                                                                                                                        Raeza Judette Rolluqui </span><span style='font-size:9.0pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#d8d8d8;letter-spacing:-.15pt'>@WlSTERlA</span><span style='font-size:10.5pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#d8d8d8;letter-spacing:-.15pt'><br>
                                                                                                                                                                </p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr style='height:33.75pt'>
                                                                                                                                                            <td style='padding:0in 0in 0in 0in;height:33.75pt'>
                                                                                                                                                                <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr>
                                                                                                                                                            <td valign='top' style='padding:0in 0in 0in 0in'>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                    </tbody>
                                                                                                                                                </table>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <p class='MsoNormal' align='center' style='text-align:center'><span style='display:none'><u></u>&nbsp;<u></u></span></p>
                                                                        <div align='center'>
                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse'>
                                                                                <tbody>
                                                                                    <tr style='height:15.0pt'>
                                                                                        <td style='padding:0in 0in 0in 0in;height:15.0pt'>
                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end email-detail-content -->
</div>
<!-- end email wrapper -->

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<!-- <script src="{{ URL::asset('assets/js/pages/mailbox.init.js') }}"></script> -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection