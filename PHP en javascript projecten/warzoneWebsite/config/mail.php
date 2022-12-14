<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  // Load Composer's autoloader
  require 'vendor/autoload.php';

  function mailVerification($recipient, $recipientMail, $verifactionHash)
  {
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try
    {
    //Server settingsinclude
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp-relay.sendinblue.com ';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thomasluchies22@gmail.com';                     // SMTP username
    $mail->Password   = '3L8xIRnPWzVJT4jQ';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('thomasluchies22@gmail.com', '777tourneys');
    $mail->addAddress($recipientMail, $recipient);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verify your mail';
    $mail->Body    = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

    <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
    <head>
    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
    <meta content='width=device-width' name='viewport'/>
    <!--[if !mso]><!-->
    <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
    <!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!--<![endif]-->
    <style type='text/css'>
    		body {
    			margin: 0;
    			padding: 0;
    		}

    		table,
    		td,
    		tr {
    			vertical-align: top;
    			border-collapse: collapse;
    		}

    		* {
    			line-height: inherit;
    		}

    		a[x-apple-data-detectors=true] {
    			color: inherit !important;
    			text-decoration: none !important;
    		}
    	</style>
    <style id='media-query' type='text/css'>
    		@media (max-width: 700px) {

    			.block-grid,
    			.col {
    				min-width: 320px !important;
    				max-width: 100% !important;
    				display: block !important;
    			}

    			.block-grid {
    				width: 100% !important;
    			}

    			.col {
    				width: 100% !important;
    			}

    			.col_cont {
    				margin: 0 auto;
    			}

    			img.fullwidth,
    			img.fullwidthOnMobile {
    				max-width: 100% !important;
    			}

    			.no-stack .col {
    				min-width: 0 !important;
    				display: table-cell !important;
    			}

    			.no-stack.two-up .col {
    				width: 50% !important;
    			}

    			.no-stack .col.num2 {
    				width: 16.6% !important;
    			}

    			.no-stack .col.num3 {
    				width: 25% !important;
    			}

    			.no-stack .col.num4 {
    				width: 33% !important;
    			}

    			.no-stack .col.num5 {
    				width: 41.6% !important;
    			}

    			.no-stack .col.num6 {
    				width: 50% !important;
    			}

    			.no-stack .col.num7 {
    				width: 58.3% !important;
    			}

    			.no-stack .col.num8 {
    				width: 66.6% !important;
    			}

    			.no-stack .col.num9 {
    				width: 75% !important;
    			}

    			.no-stack .col.num10 {
    				width: 83.3% !important;
    			}

    			.video-block {
    				max-width: none !important;
    			}

    			.mobile_hide {
    				min-height: 0px;
    				max-height: 0px;
    				max-width: 0px;
    				display: none;
    				overflow: hidden;
    				font-size: 0px;
    			}

    			.desktop_hide {
    				display: block !important;
    				max-height: none !important;
    			}
    		}
    	</style>
    </head>
    <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #121b2c;'>
    <!--[if IE]><div class='ie-browser'><![endif]-->
    <table bgcolor='#121b2c' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #121b2c; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td style='word-break: break-word; vertical-align: top;' valign='top'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#121b2c'><![endif]-->
    <div style='background-color:transparent;'>
    <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
    <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
    <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='20' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='20' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <div align='center' class='img-container center fixedwidth' style='padding-right: 0px;padding-left: 0px;'>
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><a href='www.example.com' style='outline:none' tabindex='-1' target='_blank'> <img align='center' alt='Logo' border='0' class='center fixedwidth' src='https://777tourneys.com/img/logo.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 136px; display: block;' title='Logo' width='136'/></a>
    <!--[if mso]></td></tr></table><![endif]-->
    </div>
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='20' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='20' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
    <div style='color:#369dba;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
    <div style='line-height: 1.2; font-size: 12px; text-align: center; color: #369dba; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;'><span style='font-size: 38px;'><strong>777Tourneys</strong></span></div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
    </div>
    </div>
    </div>
    <div style='background-color:transparent;'>
    <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
    <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
    <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='30' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='30' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
    </div>
    </div>
    </div>
    <div style='background-color:transparent;'>
    <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
    <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
    <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
    <div style='color:#369dba;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
    <div style='line-height: 1.2; font-size: 12px; color: #369dba; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;'>
    <p style='text-align: center; line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'><strong>Verify you account by clicking the verify button below.</strong></span></p>
    </div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <div align='center' class='button-container' style='padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'><tr><td style='padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px' align='center'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='https://www.777tourneys.com/verifyemail.php?verification=" . $verifactionHash . "' style='height:31.5pt; width:91.5pt; v-text-anchor:middle;' arcsize='10%' stroke='false' fillcolor='#3AAEE0'><w:anchorlock/><v:textbox inset='0,0,0,0'><center style='color:#ffffff; font-family:Arial, sans-serif; font-size:16px'><![endif]--><a href='https://www.777tourneys.com/verifyemail.php?verification=" . $verifactionHash . "' style='-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #3AAEE0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; width: auto; border-top: 1px solid #3AAEE0; border-right: 1px solid #3AAEE0; border-bottom: 1px solid #3AAEE0; border-left: 1px solid #3AAEE0; padding-top: 5px; padding-bottom: 5px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;' target='_blank'><span style='padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;'><span style='font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;'>Verify</span></span></a>
    <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->verification
    </div>
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
    </div>
    </div>
    </div>
    <div style='background-color:transparent;'>
    <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
    <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
    <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='30' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='30' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
    </div>
    </div>
    </div>
    <div style='background-color:#0b111f;'>
    <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#0b111f;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
    <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
    <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='25' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 25px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='25' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
    </div>
    </div>
    </div>
    <div style='background-color:#0b111f;'>
    <div class='block-grid two-up' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#0b111f;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
    <!--[if (mso)|(IE)]><td align='center' width='340' style='background-color:transparent;width:340px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
    <div class='col num6' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
    <div style='color:#ffffff;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
    <div style='line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #ffffff; mso-line-height-alt: 14px;'><span style=''>
    <p style='font-size: 18px; line-height: 1.2; text-align: left; word-break: break-word; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 22px; margin: 0;'><strong><span style='color: #ffffff;'>Social media</span></strong></p>
    </span></div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
    <div style='color:#C0C0C0;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
    <div style='line-height: 1.5; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #C0C0C0; mso-line-height-alt: 18px;'><span style=''>
    <p style='font-size: 12px; line-height: 1.5; text-align: left; word-break: break-word; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px; margin: 0;'><span style='color: #C0C0C0; font-size: 12px;'>Stay up-to-date with current activities and future events by following us on your favorite social media channels.</span></p>
    </span></div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table cellpadding='0' cellspacing='0' class='social_icons' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td style='word-break: break-word; vertical-align: top; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 20px;' valign='top'>
    <table align='left' cellpadding='0' cellspacing='0' class='social_table' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;' valign='top'>
    <tbody>
    <tr align='left' style='vertical-align: top; display: inline-block; text-align: left;' valign='top'>
    <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 0px;' valign='top'><a href='https://twitter.com/7Tourneys' target='_blank'><img alt='Twitter' height='32' src='images/twitter2x.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Twitter' width='32'/></a></td>
    <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 0px;' valign='top'><a href='https://instagram.com/' target='_blank'><img alt='Instagram' height='32' src='images/instagram2x.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Instagram' width='32'/></a></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td><td align='center' width='340' style='background-color:transparent;width:340px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
    <div class='col num6' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
    <div style='color:#ffffff;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
    <div style='line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #ffffff; mso-line-height-alt: 14px;'><span style=''>
    <p style='font-size: 18px; line-height: 1.2; text-align: left; word-break: break-word; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 22px; margin: 0;'><strong><span style='color: #ffffff;'>Where to find us</span></strong></p>
    </span></div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
    <div style='color:#C0C0C0;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
    <div style='line-height: 1.5; font-size: 12px; color: #C0C0C0; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;'><span style='color: #C0C0C0; font-size: 12px;'><a href='http://www.example.com' rel='noopener' style='text-decoration: none; color: #C0C0C0;' target='_blank'>www.777tourneys.com??</a></span><span style='color: #C0C0C0; font-size: 12px;'> <br/></span><span style='color: #C0C0C0; font-size: 12px;'>info@777tourneys.com</span></div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
    <div class='mobile_hide'>
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
    <div style='color:#C0C0C0;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
    <div style='line-height: 1.2; font-size: 12px; color: #C0C0C0; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;'><span style='color: #C0C0C0; font-size: 12px;'>Changed your mind? <a href='http://www.example.com' rel='noopener' style='text-decoration: underline; color: #C0C0C0;' target='_blank'>Unsubscribe</a> </span></div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
    </div>
    </div>
    </div>
    <div style='background-color:#0b111f;'>
    <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#0b111f;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
    <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
    <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
    <div class='col_cont' style='width:100% !important;'>
    <!--[if (!mso)&(!IE)]><!-->
    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
    <!--<![endif]-->
    <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='25' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 25px; width: 100%;' valign='top' width='100%'>
    <tbody>
    <tr style='vertical-align: top;' valign='top'>
    <td height='25' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
    </div>
    </div>
    </div>
    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    </td>
    </tr>
    </tbody>
    </table>
    <!--[if (IE)]></div><![endif]-->
    </body>
    </html>'";
    $mail->AltBody = 'please verify your account. Go to https://www.777tourneys.com/verifyemail.php?verification=' . $verifactionHash;

    $mail->send();
    echo 'Message has been sent';
    }
    catch (Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

  function sendReceipt($recipient, $recipientMail, $tournament, $startDate, $endDate, $teamname, $username, $teammates)
  {
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try
    {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->do_debug = 0;
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp-relay.sendinblue.com ';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thomasluchies22@gmail.com';                     // SMTP username
    $mail->Password   = '3L8xIRnPWzVJT4jQ';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('thomasluchies22@gmail.com', 'Mailer');
    $mail->addAddress($recipientMail, $recipient);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Order';

    $teammatesArrayFormated;
    foreach($teammates as $teammate)
    {
      $teammatesArrayFormated += $teammate . ", ";
    }

    $startTime = explode(" ",$startDate)[1];
    $date = explode(" ", $startDate)[0];
    $endTime = explode(" ", $endDate)[1];
    $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

                  <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
                  <head>
                  <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
                  <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
                  <meta content='width=device-width' name='viewport'/>
                  <!--[if !mso]><!-->
                  <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
                  <!--<![endif]-->
                  <title></title>
                  <!--[if !mso]><!-->
                  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
                  <!--<![endif]-->
                  <style type='text/css'>
                  		body {
                  			margin: 0;
                  			padding: 0;
                  		}

                  		table,
                  		td,
                  		tr {
                  			vertical-align: top;
                  			border-collapse: collapse;
                  		}

                  		* {
                  			line-height: inherit;
                  		}

                  		a[x-apple-data-detectors=true] {
                  			color: inherit !important;
                  			text-decoration: none !important;
                  		}
                  	</style>
                  <style id='media-query' type='text/css'>
                  		@media (max-width: 700px) {

                  			.block-grid,
                  			.col {
                  				min-width: 320px !important;
                  				max-width: 100% !important;
                  				display: block !important;
                  			}

                  			.block-grid {
                  				width: 100% !important;
                  			}

                  			.col {
                  				width: 100% !important;
                  			}

                  			.col_cont {
                  				margin: 0 auto;
                  			}

                  			img.fullwidth,
                  			img.fullwidthOnMobile {
                  				max-width: 100% !important;
                  			}

                  			.no-stack .col {
                  				min-width: 0 !important;
                  				display: table-cell !important;
                  			}

                  			.no-stack.two-up .col {
                  				width: 50% !important;
                  			}

                  			.no-stack .col.num2 {
                  				width: 16.6% !important;
                  			}

                  			.no-stack .col.num3 {
                  				width: 25% !important;
                  			}

                  			.no-stack .col.num4 {
                  				width: 33% !important;
                  			}

                  			.no-stack .col.num5 {
                  				width: 41.6% !important;
                  			}

                  			.no-stack .col.num6 {
                  				width: 50% !important;
                  			}

                  			.no-stack .col.num7 {
                  				width: 58.3% !important;
                  			}

                  			.no-stack .col.num8 {
                  				width: 66.6% !important;
                  			}

                  			.no-stack .col.num9 {
                  				width: 75% !important;
                  			}

                  			.no-stack .col.num10 {
                  				width: 83.3% !important;
                  			}

                  			.video-block {
                  				max-width: none !important;
                  			}

                  			.mobile_hide {
                  				min-height: 0px;
                  				max-height: 0px;
                  				max-width: 0px;
                  				display: none;
                  				overflow: hidden;
                  				font-size: 0px;
                  			}

                  			.desktop_hide {
                  				display: block !important;
                  				max-height: none !important;
                  			}
                  		}
                  	</style>
                  </head>
                  <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #121b2c;'>
                  <!--[if IE]><div class='ie-browser'><![endif]-->
                  <table bgcolor='#121b2c' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #121b2c; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td style='word-break: break-word; vertical-align: top;' valign='top'>
                  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#121b2c'><![endif]-->
                  <div style='background-color:transparent;'>
                  <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
                  <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                  <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                  <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
                  <div class='col_cont' style='width:100% !important;'>
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                  <!--<![endif]-->
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='20' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='20' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <div align='center' class='img-container center fixedwidth' style='padding-right: 0px;padding-left: 0px;'>
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><a href='www.example.com' style='outline:none' tabindex='-1' target='_blank'> <img align='center' alt='Logo' border='0' class='center fixedwidth' src='https://777tourneys.com/img/logo.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 136px; display: block;' title='Logo' width='136'/></a>
                  <!--[if mso]></td></tr></table><![endif]-->
                  </div>
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='20' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='20' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                  <div style='color:#369dba;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;'>
                  <div style='line-height: 1.2; font-size: 12px; text-align: center; color: #369dba; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;'><strong><span style='font-size: 24px;'>Your order</span></strong></div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='5' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='5' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                  </div>
                  </div>
                  <div style='background-color:transparent;'>
                  <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
                  <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                  <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                  <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
                  <div class='col_cont' style='width:100% !important;'>
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                  <!--<![endif]-->
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                  <div style='color:#369dba;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                  <div style='line-height: 1.2; font-size: 12px; color: #369dba; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;'>
                  <p style='line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'>Event name: " . $tournament . "</span></p>
                  <p style='line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'>Date: " . $date. "</span></p>
                  <p style='line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'>Start time: " . $startTime . "</span></p>
                  <p style='line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'>End time: " . $endTime. "</span></p>
                  <p style='line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'>Teamname: " . $teamname . "</span></p>
                  <p style='line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'>username: " . $username . "</span></p>
                  <p style='line-height: 1.2; word-break: break-word; font-size: 18px; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'>Team members: " . $teammatesArrayFormated . "</span></p>
                  <p style='line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;'>??</p>
                  </div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                  </div>
                  </div>
                  <div style='background-color:transparent;'>
                  <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
                  <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                  <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                  <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
                  <div class='col_cont' style='width:100% !important;'>
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                  <!--<![endif]-->
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='30' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='30' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                  </div>
                  </div>
                  <div style='background-color:#0b111f;'>
                  <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
                  <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#0b111f;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                  <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                  <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
                  <div class='col_cont' style='width:100% !important;'>
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                  <!--<![endif]-->
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='25' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 25px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='25' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                  </div>
                  </div>
                  <div style='background-color:#0b111f;'>
                  <div class='block-grid two-up' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
                  <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#0b111f;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                  <!--[if (mso)|(IE)]><td align='center' width='340' style='background-color:transparent;width:340px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                  <div class='col num6' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;'>
                  <div class='col_cont' style='width:100% !important;'>
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                  <!--<![endif]-->
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                  <div style='color:#ffffff;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
                  <div style='line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #ffffff; mso-line-height-alt: 14px;'><span style=''>
                  <p style='font-size: 18px; line-height: 1.2; text-align: left; word-break: break-word; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 22px; margin: 0;'><strong><span style='color: #ffffff;'>Social media</span></strong></p>
                  </span></div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                  <div style='color:#C0C0C0;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
                  <div style='line-height: 1.5; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #C0C0C0; mso-line-height-alt: 18px;'><span style=''>
                  <p style='font-size: 12px; line-height: 1.5; text-align: left; word-break: break-word; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px; margin: 0;'><span style='color: #C0C0C0; font-size: 12px;'>Stay up-to-date with current activities and future events by following us on your favorite social media channels.</span></p>
                  </span></div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <table cellpadding='0' cellspacing='0' class='social_icons' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td style='word-break: break-word; vertical-align: top; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 20px;' valign='top'>
                  <table align='left' cellpadding='0' cellspacing='0' class='social_table' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;' valign='top'>
                  <tbody>
                  <tr align='left' style='vertical-align: top; display: inline-block; text-align: left;' valign='top'>
                  <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 0px;' valign='top'><a href='https://twitter.com/7tourneys' target='_blank'><img alt='Twitter' height='32' src='images/twitter2x.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Twitter' width='32'/></a></td>
                  <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 0px;' valign='top'><a href='https://instagram.com/' target='_blank'><img alt='Instagram' height='32' src='images/instagram2x.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Instagram' width='32'/></a></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  <!--[if (mso)|(IE)]></td><td align='center' width='340' style='background-color:transparent;width:340px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                  <div class='col num6' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;'>
                  <div class='col_cont' style='width:100% !important;'>
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                  <!--<![endif]-->
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                  <div style='color:#ffffff;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
                  <div style='line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #ffffff; mso-line-height-alt: 14px;'><span style=''>
                  <p style='font-size: 18px; line-height: 1.2; text-align: left; word-break: break-word; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 22px; margin: 0;'><strong><span style='color: #ffffff;'>Where to find us</span></strong></p>
                  </span></div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                  <div style='color:#C0C0C0;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
                  <div style='line-height: 1.5; font-size: 12px; color: #C0C0C0; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;'>
                  <p style='line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'>www.777tourneys.com</p>
                  <p style='line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'>info@777tourneys.com</p>
                  </div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <div class='mobile_hide'>
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  </div>
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='0' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                  <div style='color:#C0C0C0;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;'>
                  <div style='line-height: 1.2; font-size: 12px; color: #C0C0C0; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;'><span style='color: #C0C0C0; font-size: 12px;'>Changed your mind? <a href='http://www.example.com' rel='noopener' style='text-decoration: underline; color: #C0C0C0;' target='_blank'>Unsubscribe</a> </span></div>
                  </div>
                  <!--[if mso]></td></tr></table><![endif]-->
                  <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                  </div>
                  </div>
                  <div style='background-color:#0b111f;'>
                  <div class='block-grid' style='min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;'>
                  <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#0b111f;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:680px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                  <!--[if (mso)|(IE)]><td align='center' width='680' style='background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                  <div class='col num12' style='min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;'>
                  <div class='col_cont' style='width:100% !important;'>
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                  <!--<![endif]-->
                  <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                  <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='25' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 25px; width: 100%;' valign='top' width='100%'>
                  <tbody>
                  <tr style='vertical-align: top;' valign='top'>
                  <td height='25' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                  </tr>
                  </tbody>
                  </table>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                  </div>
                  </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <!--[if (IE)]></div><![endif]-->
                  </body>
                  </html>";
    $mail->AltBody = 'You have been registered for ' . $tournament . ' it will start on ' . $startDate . " and end on " . $endDate;

    $mail->send();
    echo 'Message has been sent';
    }
    catch (Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
?>
