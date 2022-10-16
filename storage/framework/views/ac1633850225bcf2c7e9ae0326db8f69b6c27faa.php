
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.mailbox'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="email-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="email-content">
        <div class="p-4 pb-0">
            <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                
            <div class="p-4 d-flex flex-column h-100">
            <div class="pb-4 border-bottom border-bottom-dashed">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <a class="btn btn-soft-danger " href="<?php echo e(route('mailbox')); ?>">
                            <i class="bx bx-arrow-back"> </i>Back
                            </a>
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
                            <a role="button" class="btn w-100 text-start px-0 bg-transparent shadow-none" >
                                <div class="d-flex align-items-center text-muted">
                                    <div class="flex-shrink-0 avatar-xs me-3">
                                        <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate mb-0">MLBBMODSUPPORT TEAM</h5>
                                        <div class="text-truncate fs-12">to: me</div>
                                    </div>
                                    <div class="flex-shrink-0 align-self-start">
                                        <div class="text-muted fs-12"><?php echo e($mail['Date']); ?></div>
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
                                                                                        <?php if($mail["OVERALLSCORE"]=="100.00%"): ?>
                                                                                            <td valign='top' style='background: #e5f6eb;padding:30.0pt 15.0pt 30.0pt 15.0pt;border-radius:8px'>
                                                                                        <?php else: ?>
                                                                                            <td valign='top' style='background: #f7d6d6;padding:30.0pt 15.0pt 30.0pt 15.0pt;border-radius:8px'>
                                                                                        <?php endif; ?>
                                                                                            <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100.0%;border-collapse:collapse;border-radius:8px'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td valign='top' style='padding:0in 15.0pt 0in 15.0pt'>
                                                                                                            <p class='MsoNormal' style='line-height:25.5pt'><b><span style='font-size:18.0pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#151515;letter-spacing:-.3pt'>Hi <?php echo e($dbsc->firstname); ?>,<u></u><u></u></span></b></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr style='height:7.5pt'>
                                                                                                        <td style='padding:0in 0in 0in 0in;height:7.5pt'>
                                                                                                            <p class='MsoNormal' style='line-height:.75pt'><span style='font-size:1.0pt'>&nbsp;<u></u><u></u></span></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td valign='top' style='padding:0in 15.0pt 0in 15.0pt'>
                                                                                                        <?php if($mail["OVERALLSCORE"]=="100.00%"): ?>
                                                                                                            <p align='center' style='color:#167000;font-size:20pt;line-height:20pt;'>Your QA Score is</p>
                                                                                                            <p align='center' style='color:#167000;background-color:#00ff141c;font-size:70pt;margin:0px;'><b>100%</b></p>
                                                                                                            <br>
                                                                                                            <p align='center' style='color:#167000;font-size:12pt;line-height:5pt;margin:0px;'><i>Keep up the good work!</i></p>
                                                                                                        <?php else: ?>
                                                                                                            <p align='center' style='color:#700000;font-size:20pt;line-height:20pt;'>Your QA Score is</p>
                                                                                                            <p align='center' style='color:#700000;background-color:#ff00001c;font-size:70pt;margin:0px;'><b><?php echo e($mail["OVERALLSCORE"]); ?></b></p>
                                                                                                            <br>
                                                                                                            <p align='center' style='color:#700000;font-size:12pt;line-height:10pt;margin:0px;'><i>Needs Improvement on the Following</i></p>
                                                                                                            <br>
                                                                                                            <?php if($mail["ScoreonTimeliness"]!="100.00%"): ?>
                                                                                                            <p align='center' style='color:#700000;font-size:10pt;line-height:10pt;margin:0px;'><i>Timeliness</i></p>
                                                                                                            <br>
                                                                                                            <?php endif; ?>
                                                                                                            <?php if($mail["ScoreonCommunication"]!="100.00%"): ?>
                                                                                                            <p align='center' style='color:#700000;font-size:10pt;line-height:10pt;margin:0px;'><i>Communication</i></p>
                                                                                                            <br>
                                                                                                            <?php endif; ?>
                                                                                                            <?php if($mail["ScoreonAccuracy"]!="100.00%"): ?>
                                                                                                            <p align='center' style='color:#700000;font-size:10pt;line-height:10pt;margin:0px;'><i>Accuracy</i></p>
                                                                                                            <br>
                                                                                                            <?php endif; ?>
                                                                                                            <p align='center' style='color:#700000;font-size:12pt;line-height:12pt;margin:0px;'>specific items</p>
                                                                                                            <br>
                                                                                                            <?php $__currentLoopData = $markdowns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $markdown): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <p align='center' style='color:#700000;font-size:8pt;line-height:10pt;margin:0px;'><i><?php echo e($markdown->Infractions); ?> count/s of <?php echo e($markdown->Form_Attribute); ?></i></p>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                                                        <?php endif; ?>
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
        </div>
    </div>
    <!-- end email-content -->

    <div class="email-detail-content">
        
    </div>
    <!-- end email-detail-content -->
</div>
<!-- end email wrapper -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/@ckeditor/@ckeditor.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/apps-mailview.blade.php ENDPATH**/ ?>