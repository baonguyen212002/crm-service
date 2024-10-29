<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style type="text/css">
        /*Basics*/
        body {
            margin: 0px !important;
            padding: 0px !important;
            display: block !important;
            min-width: 100% !important;
            width: 100% !important;
            -webkit-text-size-adjust: none;
        }

        table {
            border-spacing: 0;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        table td {
            border-collapse: collapse;
            mso-line-height-rule: exactly;
        }

        td img {
            -ms-interpolation-mode: bicubic;
            width: auto;
            max-width: auto;
            height: auto;
            margin: auto;
            display: block !important;
            border: 0px;
        }

        td p {
            margin: 0;
            padding: 0;
        }

        td div {
            margin: 0;
            padding: 0;
        }

        td a {
            text-decoration: none;
            color: inherit;
        }

        /*Outlook*/
        .ExternalClass {
            width: 100%;
        }

        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: inherit;
        }

        .ReadMsgBody {
            width: 100%;
            background-color: #ffffff;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /*Gmail blue links*/
        u + #body a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
        }

        /*Buttons fix*/
        .undoreset a, .undoreset a:hover {
            text-decoration: none !important;
        }

        .yshortcuts a {
            border-bottom: none !important;
        }

        .ios-footer a {
            color: #aaaaaa !important;
            text-decoration: none;
        }

        /*Responsive*/
        @media screen and (max-width: 799px) {
            table.row {
                width: 100% !important;
                max-width: 100% !important;
            }

            td.row {
                width: 100% !important;
                max-width: 100% !important;
            }

            .img-responsive img {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin: auto;
            }

            .center-float {
                float: none !important;
                margin: auto !important;
            }

            .center-text {
                text-align: center !important;
            }

            .container-padding {
                width: 100% !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .container-padding10 {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .hide-mobile {
                display: none !important;
            }

            .menu-container {
                text-align: center !important;
            }

            .autoheight {
                height: auto !important;
            }

            .m-padding-10 {
                margin: 10px 0 !important;
            }

            .m-padding-15 {
                margin: 15px 0 !important;
            }

            .m-padding-20 {
                margin: 20px 0 !important;
            }

            .m-padding-30 {
                margin: 30px 0 !important;
            }

            .m-padding-40 {
                margin: 40px 0 !important;
            }

            .m-padding-50 {
                margin: 50px 0 !important;
            }

            .m-padding-60 {
                margin: 60px 0 !important;
            }

            .m-padding-top10 {
                margin: 30px 0 0 0 !important;
            }

            .m-padding-top15 {
                margin: 15px 0 0 0 !important;
            }

            .m-padding-top20 {
                margin: 20px 0 0 0 !important;
            }

            .m-padding-top30 {
                margin: 30px 0 0 0 !important;
            }

            .m-padding-top40 {
                margin: 40px 0 0 0 !important;
            }

            .m-padding-top50 {
                margin: 50px 0 0 0 !important;
            }

            .m-padding-top60 {
                margin: 60px 0 0 0 !important;
            }

            .m-height10 {
                font-size: 10px !important;
                line-height: 10px !important;
                height: 10px !important;
            }

            .m-height15 {
                font-size: 15px !important;
                line-height: 15px !important;
                height: 15px !important;
            }

            .m-height20 {
                font-size: 20px !important;
                line-height: 20px !important;
                height: 20px !important;
            }

            .m-height25 {
                font-size: 25px !important;
                line-height: 25px !important;
                height: 25px !important;
            }

            .m-height30 {
                font-size: 30px !important;
                line-height: 30px !important;
                height: 30px !important;
            }

            .rwd-on-mobile {
                display: inline-block !important;
                padding: 5px;
            }

            .center-on-mobile {
                text-align: center !important;
            }
        }
    </style>
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%"
       style="width:100%;max-width:100%;">
    <tr><!-- Outer Table -->
        <td align="center" bgcolor="#f0f0f0" data-composer>

            <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                   style="width:100%;max-width:100%;">
                <!-- lotus-header-18-->
                <tr>
                    <td align="center" bgcolor="#343e9e" class="container-padding">

                        <!-- Content -->
                        <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                               class="row" width="580" style="width:580px;max-width:580px;">
                            <tr>
                                <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" class="center-text">
                                    {{-- <a href="{{ $baseUrlOfFE }}">
                                        <img style="width:300px;border:0px;display: inline!important;"
                                            src="{{ asset('assets/img/logo.png') }}" width="300" border="0"
                                            alt="intro">
                                    </a> --}}
                                </td>
                            </tr>
                            <tr>
                                <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="center-text" align="center"
                                    style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:42px;line-height:52px;font-weight:400;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">

                                    <div>
                                        Tài khoản đã được tạo.
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                            </tr>
                        </table>
                        <!-- Content -->

                    </td>
                </tr>
            </table>

            {{-- <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                style="width:100%;max-width:100%;">
                <!-- lotus-arrow-divider -->
                <tr>
                    <td align="center" bgcolor="#FFFFFF">
                        <img style="width:50px;border:0px;display: inline!important;"
                            src="{{ asset('assets/img/emails/Arrow.png') }}" width="50" border="0"
                            alt="arrow">
                    </td>
                </tr>
            </table> --}}

            <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                   style="width:100%;max-width:100%;">
                <!-- lotus-content-18 -->
                <tr>
                    <td align="center" bgcolor="#FFFFFF" class="container-padding">

                        <!-- Content -->
                        <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                               class="row" width="580" style="width:580px;max-width:580px;">
                            <tr>
                                <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" bgcolor="#f4f5fa">
                                    <!-- Content -->
                                    <table border="0" align="center" cellpadding="0" cellspacing="0"
                                           role="presentation" class="row" width="480"
                                           style="width:480px;max-width:480px;">
                                        <tr>
                                            <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <table border="0" align="left" cellpadding="0"
                                                       cellspacing="0" role="presentation" class="row"
                                                       width="225" style="width:225px;max-width:225px;">
                                                    <tr>
                                                        <td class="center-text" align="left"
                                                            style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:20px;line-height:26px;font-weight:400;font-style:normal;color:#343e9e;text-decoration:none;letter-spacing:0px;">

                                                            <div>
                                                                Email đăng nhập:
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10"
                                                            style="font-size:10px;line-height:10px;">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center-text" align="left"
                                                            style="font-family:'Poppins',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;font-weight:400;font-style:normal;color:#282828;text-decoration:none;letter-spacing:0px;">

                                                            <div>
                                                                {{ $email }}
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" align="left" cellpadding="0"
                                                       cellspacing="0" role="presentation" width="30"
                                                       style="width:30px;max-width:30px;">
                                                    <tr>
                                                        <td height="20"
                                                            style="font-size:20px;line-height:20px;">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" align="left" cellpadding="0"
                                                       cellspacing="0" role="presentation" class="row"
                                                       width="225" style="width:225px;max-width:225px;">
                                                    <tr>
                                                        <td class="center-text" align="left"
                                                            style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:20px;line-height:26px;font-weight:400;font-style:normal;color:#343e9e;text-decoration:none;letter-spacing:0px;">

                                                            <div>
                                                                Mật khẩu:
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10"
                                                            style="font-size:10px;line-height:10px;">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center-text" align="left"
                                                            style="font-family:'Poppins',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;font-weight:400;font-style:normal;color:#282828;text-decoration:none;letter-spacing:0px;">

                                                            <div>
                                                                {{ $password }}
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="40" style="font-size:40px;line-height:40px;">&nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Content -->
                                </td>
                            </tr>
                            <tr>
                                <td height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                            </tr>

                            <tr>
                                <td align="center">
                                    @if ($loginUrl)
                                        <!-- Buttons -->
                                        <table border="0" cellspacing="0" cellpadding="0"
                                               role="presentation" align="center" class="center-float">
                                            <tr>
                                                <td align="center" bgcolor="#d6df58" style="border-radius: 6px;">
                                                    <a href="{{ $loginUrl }}" target="_blank"
                                                       style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:16px;line-height:19px;font-weight:700;font-style:normal;color:#000000;text-decoration:none;letter-spacing:0px;padding: 20px 50px 20px 50px;display: inline-block;"><span>Đăng
                                                                nhập ngay</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Buttons -->
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                            </tr>
                        </table>
                        <!-- Content -->

                    </td>
                </tr>
            </table>

            {{-- <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                   style="width:100%;max-width:100%;">
                <!-- lotus-footer-18 -->
                <tr>
                    <td align="center" bgcolor="#f0f0f0" class="container-padding">

                        <!-- Content -->
                        <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" class="row"
                               width="580" style="width:580px;max-width:580px;">
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="center-text" align="center"
                                    style="font-family:'Poppins',Arial,Helvetica,sans-serif;font-size:14px;line-height:24px;font-weight:400;font-style:normal;color:#6e6e6e;text-decoration:none;letter-spacing:0px;">

                                    <a href="tel:1900 633 381" style="color:#6e6e6e;"><span>1900 633 381</span></a>

                                </td>
                            </tr>
                            <tr>
                                <td class="center-text" align="center"
                                    style="font-family:'Poppins',Arial,Helvetica,sans-serif;font-size:14px;line-height:24px;font-weight:400;font-style:normal;color:#6e6e6e;text-decoration:none;letter-spacing:0px;">

                                    <a href="mailto:support@glodival.vn" style="color:#6e6e6e;"><span>support@glodival.vn</span></a>
                                    - <a href="{{ $baseUrlOfFE }}"
                                         style="color:#6e6e6e;"><span>{{ $baseUrlOfFE }}</span></a>

                                </td>
                            </tr>
                            <tr>
                                <td height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center">

                                </td>
                            </tr>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;">&nbsp;</td>
                            </tr>
                        </table>
                        <!-- Content -->

                    </td>
                </tr>
            </table> --}}

        </td>
    </tr><!-- Outer-Table -->
</table>
</body>

</html>
