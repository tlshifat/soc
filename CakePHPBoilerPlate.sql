-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2018 at 08:07 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CakePHPBoilerPlate`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` text,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `body`, `published`, `created`, `modified`) VALUES
(1, 'CakePHP details', 'CakePHP-details', 'Details about first posts', 1, '2018-08-27 07:44:33', '2018-09-05 06:51:06'),
(2, 'Our Team pages', 'Our-Team-page', '<p>team details here</p>', 1, '2018-09-05 09:23:30', '2018-10-05 10:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8,
  `code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - active, 2 - inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `subject`, `content`, `code`, `created`, `modified`, `status`) VALUES
(1, 'Registration By Admin', 'Welcome to Website', '<!doctype html>\n<html>\n  <head>\n    <meta name="viewport" content="width=device-width" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n    <title>Simple Transactional Email</title>\n  </head>\n  <body class="">\n    <table border="0" cellpadding="0" cellspacing="0" class="body">\n      <tr>\n        <td class="container">\n          <div class="content">\n\n            <!-- START CENTERED WHITE CONTAINER -->\n            <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>\n            <table class="main">\n\n              <!-- START MAIN CONTENT AREA -->\n              <tr>\n                <td class="wrapper">\n                  <table border="0" cellpadding="0" cellspacing="0">\n                    <tr>\n                      <td>\n                        <p>Dear {NAME},</p>\n\n                        <p>Your account has been created successfully.</p>\n\n                        <p>By using below credentials you can access your account.</p>\n                        <p>Your Email- {USER_EMAIL}</p>\n                        <p>Your Password- {USER_PASSWORD}</p>\n\n                        <p>XYZ Company</p>\n                      </td>\n                    </tr>\n                  </table>\n                </td>\n              </tr>\n\n            <!-- END MAIN CONTENT AREA -->\n            </table>\n\n            <!-- START FOOTER -->\n            <div class="footer">\n              <table border="0" cellpadding="0" cellspacing="0">\n                <tr>\n                  <td class="content-block">\n                    <span class="apple-link">Company Address,Lorem Ipsum Lorem Ipsum</span>\n                    \n                  </td>\n                </tr>\n                <tr>\n                  <td class="content-block powered-by">\n                    Powered by <a href="javascript:void(0)">XYZ Company</a>.\n                  </td>\n                </tr>\n              </table>\n            </div>\n            <!-- END FOOTER -->\n\n          <!-- END CENTERED WHITE CONTAINER -->\n          </div>\n        </td>\n\n      </tr>\n    </table>\n  </body>\n    <style>\n      /* -------------------------------------\n          GLOBAL RESETS\n      ------------------------------------- */\n      img {\n        border: none;\n        -ms-interpolation-mode: bicubic;\n        max-width: 100%; }\n\n      body {\n        background-color: #f6f6f6;\n        font-family: sans-serif;\n        -webkit-font-smoothing: antialiased;\n        font-size: 14px;\n        line-height: 1.4;\n        margin: 0;\n        padding: 0;\n        -ms-text-size-adjust: 100%;\n        -webkit-text-size-adjust: 100%; }\n\n      table {\n        border-collapse: separate;\n        mso-table-lspace: 0pt;\n        mso-table-rspace: 0pt;\n        width: 100%; }\n        table td {\n          font-family: sans-serif;\n          font-size: 14px;\n          vertical-align: top; }\n\n      /* -------------------------------------\n          BODY & CONTAINER\n      ------------------------------------- */\n\n      .body {\n        background-color: #f6f6f6;\n        width: 100%; }\n\n      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\n      .container {\n        display: block;\n        Margin: 0 auto !important;\n        /* makes it centered */\n       \n        width: 100%; }\n\n      /* This should also be a block element, so that it will fill 100% of the .container */\n      .content {\n        box-sizing: border-box;\n        display: block;\n        Margin: 0 auto;\n        padding: 10px; }\n\n      /* -------------------------------------\n          HEADER, FOOTER, MAIN\n      ------------------------------------- */\n      .main {\n        background: #ffffff;\n        border-radius: 3px;\n        width: 100%; }\n\n      .wrapper {\n        box-sizing: border-box;\n        padding: 20px; }\n\n      .content-block {\n        padding-bottom: 10px;\n        padding-top: 10px;\n      }\n\n      .footer {\n        clear: both;\n        Margin-top: 10px;\n        text-align: center;\n        width: 100%; }\n        .footer td,\n        .footer p,\n        .footer span,\n        .footer a {\n          color: #999999;\n          font-size: 12px;\n          text-align: center; }\n\n      /* -------------------------------------\n          TYPOGRAPHY\n      ------------------------------------- */\n      h1,\n      h2,\n      h3,\n      h4 {\n        color: #000000;\n        font-family: sans-serif;\n        font-weight: 400;\n        line-height: 1.4;\n        margin: 0;\n        Margin-bottom: 30px; }\n\n      h1 {\n        font-size: 35px;\n        font-weight: 300;\n        text-align: center;\n        text-transform: capitalize; }\n\n      p,\n      ul,\n      ol {\n        font-family: sans-serif;\n        font-size: 14px;\n        font-weight: normal;\n        margin: 0;\n        Margin-bottom: 15px; }\n        p li,\n        ul li,\n        ol li {\n          list-style-position: inside;\n          margin-left: 5px; }\n\n      a {\n        color: #3498db;\n        text-decoration: underline; }\n\n      /* -------------------------------------\n          BUTTONS\n      ------------------------------------- */\n      .btn {\n        box-sizing: border-box;\n        width: 100%; }\n        .btn > tbody > tr > td {\n          padding-bottom: 15px; }\n        .btn table {\n          width: auto; }\n        .btn table td {\n          background-color: #ffffff;\n          border-radius: 5px;\n          text-align: center; }\n        .btn a {\n          background-color: #ffffff;\n          border: solid 1px #3498db;\n          border-radius: 5px;\n          box-sizing: border-box;\n          color: #3498db;\n          cursor: pointer;\n          display: inline-block;\n          font-size: 14px;\n          font-weight: bold;\n          margin: 0;\n          padding: 12px 25px;\n          text-decoration: none;\n          text-transform: capitalize; }\n\n      .btn-primary table td {\n        background-color: #3498db; }\n\n      .btn-primary a {\n        background-color: #3498db;\n        border-color: #3498db;\n        color: #ffffff; }\n\n      /* -------------------------------------\n          OTHER STYLES THAT MIGHT BE USEFUL\n      ------------------------------------- */\n      .last {\n        margin-bottom: 0; }\n\n      .first {\n        margin-top: 0; }\n\n      .align-center {\n        text-align: center; }\n\n      .align-right {\n        text-align: right; }\n\n      .align-left {\n        text-align: left; }\n\n      .clear {\n        clear: both; }\n\n      .mt0 {\n        margin-top: 0; }\n\n      .mb0 {\n        margin-bottom: 0; }\n\n      .preheader {\n        color: transparent;\n        display: none;\n        height: 0;\n        max-height: 0;\n        max-width: 0;\n        opacity: 0;\n        overflow: hidden;\n        mso-hide: all;\n        visibility: hidden;\n        width: 0; }\n\n      .powered-by a {\n        text-decoration: none; }\n\n      hr {\n        border: 0;\n        border-bottom: 1px solid #f6f6f6;\n        Margin: 20px 0; }\n\n      /* -------------------------------------\n          RESPONSIVE AND MOBILE FRIENDLY STYLES\n      ------------------------------------- */\n      @media only screen and (max-width: 620px) {\n        table[class=body] h1 {\n          font-size: 28px !important;\n          margin-bottom: 10px !important; }\n        table[class=body] p,\n        table[class=body] ul,\n        table[class=body] ol,\n        table[class=body] td,\n        table[class=body] span,\n        table[class=body] a {\n          font-size: 16px !important; }\n        table[class=body] .wrapper,\n        table[class=body] .article {\n          padding: 10px !important; }\n        table[class=body] .content {\n          padding: 0 !important; }\n        table[class=body] .container {\n          padding: 0 !important;\n          width: 100% !important; }\n        table[class=body] .main {\n          border-left-width: 0 !important;\n          border-radius: 0 !important;\n          border-right-width: 0 !important; }\n        table[class=body] .btn table {\n          width: 100% !important; }\n        table[class=body] .btn a {\n          width: 100% !important; }\n        table[class=body] .img-responsive {\n          height: auto !important;\n          max-width: 100% !important;\n          width: auto !important; }}\n\n      /* -------------------------------------\n          PRESERVE THESE STYLES IN THE HEAD\n      ------------------------------------- */\n      @media all {\n        .ExternalClass {\n          width: 100%; }\n        .ExternalClass,\n        .ExternalClass p,\n        .ExternalClass span,\n        .ExternalClass font,\n        .ExternalClass td,\n        .ExternalClass div {\n          line-height: 100%; }\n        .apple-link a {\n          color: inherit !important;\n          font-family: inherit !important;\n          font-size: inherit !important;\n          font-weight: inherit !important;\n          line-height: inherit !important;\n          text-decoration: none !important; }\n        .btn-primary table td:hover {\n          background-color: #34495e !important; }\n        .btn-primary a:hover {\n          background-color: #34495e !important;\n          border-color: #34495e !important; } }\n\n    </style>\n</html>\n', 'REG001', '2018-08-22 07:16:17', '2018-08-22 07:16:17', 1),
(2, 'User Registration', 'Welcome to Website', '<!doctype html>\n<html>\n  <head>\n    <meta name="viewport" content="width=device-width" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n    <title>Simple Transactional Email</title>\n  </head>\n  <body class="">\n    <table border="0" cellpadding="0" cellspacing="0" class="body">\n      <tr>\n        <td class="container">\n          <div class="content">\n\n            <!-- START CENTERED WHITE CONTAINER -->\n            <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>\n            <table class="main">\n\n              <!-- START MAIN CONTENT AREA -->\n              <tr>\n                <td class="wrapper">\n                  <table border="0" cellpadding="0" cellspacing="0">\n                    <tr>\n                      <td>\n                        <p>Dear {NAME},</p>\n\n                        <p>Your account has been created successfully.</p>\n                        <p>Please Click or Press below button to activate your account.</p>\n                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">\n                          <tbody>\n                            <tr>\n                              <td align="left">\n                                <table border="0" cellpadding="0" cellspacing="0">\n                                  <tbody>\n\n                                    <tr>\n                                      <td> <a href="{ACTIVATION_LINK}" target="_blank">Activate Your Account</a> </td>\n                                    </tr>\n\n                                    \n                                    \n                                  </tbody>\n                                </table>\n                              </td>\n                            </tr>\n                          </tbody>\n                        </table>\n                        <p>By using below credentials you can access your account.</p>\n                        <p>Your Email- {USER_EMAIL}</p>\n                        <p>Your Password- {USER_PASSWORD}</p>\n\n\n                        <p>If clicking the link above does not work, copy and paste the URL in a new browser window instead.</p>\n                        <p>{ACTIVATION_LINK}</p>\n\n                        <p>Thanks & regards</p>\n                        <p>XYZ Company</p>\n                      </td>\n                    </tr>\n                  </table>\n                </td>\n              </tr>\n\n            <!-- END MAIN CONTENT AREA -->\n            </table>\n\n            <!-- START FOOTER -->\n            <div class="footer">\n              <table border="0" cellpadding="0" cellspacing="0">\n                <tr>\n                  <td class="content-block">\n                    <span class="apple-link">Company Address,Lorem Ipsum Lorem Ipsum</span>\n                    \n                  </td>\n                </tr>\n                <tr>\n                  <td class="content-block powered-by">\n                    Powered by <a href="javascript:void(0)">XYZ Company</a>.\n                  </td>\n                </tr>\n              </table>\n            </div>\n            <!-- END FOOTER -->\n\n          <!-- END CENTERED WHITE CONTAINER -->\n          </div>\n        </td>\n\n      </tr>\n    </table>\n  </body>\n    <style>\n      /* -------------------------------------\n          GLOBAL RESETS\n      ------------------------------------- */\n      img {\n        border: none;\n        -ms-interpolation-mode: bicubic;\n        max-width: 100%; }\n\n      body {\n        background-color: #f6f6f6;\n        font-family: sans-serif;\n        -webkit-font-smoothing: antialiased;\n        font-size: 14px;\n        line-height: 1.4;\n        margin: 0;\n        padding: 0;\n        -ms-text-size-adjust: 100%;\n        -webkit-text-size-adjust: 100%; }\n\n      table {\n        border-collapse: separate;\n        mso-table-lspace: 0pt;\n        mso-table-rspace: 0pt;\n        width: 100%; }\n        table td {\n          font-family: sans-serif;\n          font-size: 14px;\n          vertical-align: top; }\n\n      /* -------------------------------------\n          BODY & CONTAINER\n      ------------------------------------- */\n\n      .body {\n        background-color: #f6f6f6;\n        width: 100%; }\n\n      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\n      .container {\n        display: block;\n        Margin: 0 auto !important;\n        /* makes it centered */\n       \n        width: 100%; }\n\n      /* This should also be a block element, so that it will fill 100% of the .container */\n      .content {\n        box-sizing: border-box;\n        display: block;\n        Margin: 0 auto;\n        padding: 10px; }\n\n      /* -------------------------------------\n          HEADER, FOOTER, MAIN\n      ------------------------------------- */\n      .main {\n        background: #ffffff;\n        border-radius: 3px;\n        width: 100%; }\n\n      .wrapper {\n        box-sizing: border-box;\n        padding: 20px; }\n\n      .content-block {\n        padding-bottom: 10px;\n        padding-top: 10px;\n      }\n\n      .footer {\n        clear: both;\n        Margin-top: 10px;\n        text-align: center;\n        width: 100%; }\n        .footer td,\n        .footer p,\n        .footer span,\n        .footer a {\n          color: #999999;\n          font-size: 12px;\n          text-align: center; }\n\n      /* -------------------------------------\n          TYPOGRAPHY\n      ------------------------------------- */\n      h1,\n      h2,\n      h3,\n      h4 {\n        color: #000000;\n        font-family: sans-serif;\n        font-weight: 400;\n        line-height: 1.4;\n        margin: 0;\n        Margin-bottom: 30px; }\n\n      h1 {\n        font-size: 35px;\n        font-weight: 300;\n        text-align: center;\n        text-transform: capitalize; }\n\n      p,\n      ul,\n      ol {\n        font-family: sans-serif;\n        font-size: 14px;\n        font-weight: normal;\n        margin: 0;\n        Margin-bottom: 15px; }\n        p li,\n        ul li,\n        ol li {\n          list-style-position: inside;\n          margin-left: 5px; }\n\n      a {\n        color: #3498db;\n        text-decoration: underline; }\n\n      /* -------------------------------------\n          BUTTONS\n      ------------------------------------- */\n      .btn {\n        box-sizing: border-box;\n        width: 100%; }\n        .btn > tbody > tr > td {\n          padding-bottom: 15px; }\n        .btn table {\n          width: auto; }\n        .btn table td {\n          background-color: #ffffff;\n          border-radius: 5px;\n          text-align: center; }\n        .btn a {\n          background-color: #ffffff;\n          border: solid 1px #3498db;\n          border-radius: 5px;\n          box-sizing: border-box;\n          color: #3498db;\n          cursor: pointer;\n          display: inline-block;\n          font-size: 14px;\n          font-weight: bold;\n          margin: 0;\n          padding: 12px 25px;\n          text-decoration: none;\n          text-transform: capitalize; }\n\n      .btn-primary table td {\n        background-color: #3498db; }\n\n      .btn-primary a {\n        background-color: #3498db;\n        border-color: #3498db;\n        color: #ffffff; }\n\n      /* -------------------------------------\n          OTHER STYLES THAT MIGHT BE USEFUL\n      ------------------------------------- */\n      .last {\n        margin-bottom: 0; }\n\n      .first {\n        margin-top: 0; }\n\n      .align-center {\n        text-align: center; }\n\n      .align-right {\n        text-align: right; }\n\n      .align-left {\n        text-align: left; }\n\n      .clear {\n        clear: both; }\n\n      .mt0 {\n        margin-top: 0; }\n\n      .mb0 {\n        margin-bottom: 0; }\n\n      .preheader {\n        color: transparent;\n        display: none;\n        height: 0;\n        max-height: 0;\n        max-width: 0;\n        opacity: 0;\n        overflow: hidden;\n        mso-hide: all;\n        visibility: hidden;\n        width: 0; }\n\n      .powered-by a {\n        text-decoration: none; }\n\n      hr {\n        border: 0;\n        border-bottom: 1px solid #f6f6f6;\n        Margin: 20px 0; }\n\n      /* -------------------------------------\n          RESPONSIVE AND MOBILE FRIENDLY STYLES\n      ------------------------------------- */\n      @media only screen and (max-width: 620px) {\n        table[class=body] h1 {\n          font-size: 28px !important;\n          margin-bottom: 10px !important; }\n        table[class=body] p,\n        table[class=body] ul,\n        table[class=body] ol,\n        table[class=body] td,\n        table[class=body] span,\n        table[class=body] a {\n          font-size: 16px !important; }\n        table[class=body] .wrapper,\n        table[class=body] .article {\n          padding: 10px !important; }\n        table[class=body] .content {\n          padding: 0 !important; }\n        table[class=body] .container {\n          padding: 0 !important;\n          width: 100% !important; }\n        table[class=body] .main {\n          border-left-width: 0 !important;\n          border-radius: 0 !important;\n          border-right-width: 0 !important; }\n        table[class=body] .btn table {\n          width: 100% !important; }\n        table[class=body] .btn a {\n          width: 100% !important; }\n        table[class=body] .img-responsive {\n          height: auto !important;\n          max-width: 100% !important;\n          width: auto !important; }}\n\n      /* -------------------------------------\n          PRESERVE THESE STYLES IN THE HEAD\n      ------------------------------------- */\n      @media all {\n        .ExternalClass {\n          width: 100%; }\n        .ExternalClass,\n        .ExternalClass p,\n        .ExternalClass span,\n        .ExternalClass font,\n        .ExternalClass td,\n        .ExternalClass div {\n          line-height: 100%; }\n        .apple-link a {\n          color: inherit !important;\n          font-family: inherit !important;\n          font-size: inherit !important;\n          font-weight: inherit !important;\n          line-height: inherit !important;\n          text-decoration: none !important; }\n        .btn-primary table td:hover {\n          background-color: #34495e !important; }\n        .btn-primary a:hover {\n          background-color: #34495e !important;\n          border-color: #34495e !important; } }\n\n    </style>\n</html>\n', 'REG002', '2018-08-22 07:16:17', '2018-08-22 07:16:17', 1),
(3, 'Password Reset', 'Password Reset', '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta name="viewport" content="width=device-width" />\r\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\r\n    <title>Simple Transactional Email</title>\r\n  </head>\r\n  <body class="">\r\n    <table border="0" cellpadding="0" cellspacing="0" class="body">\r\n      <tr>\r\n        <td class="container">\r\n          <div class="content">\r\n\r\n            <!-- START CENTERED WHITE CONTAINER -->\r\n            <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>\r\n            <table class="main">\r\n\r\n              <!-- START MAIN CONTENT AREA -->\r\n              <tr>\r\n                <td class="wrapper">\r\n                  <table border="0" cellpadding="0" cellspacing="0">\r\n                    <tr>\r\n                      <td>\r\n                        <p>Dear {NAME},</p>\r\n\r\n                        <p>Your account has been created successfully.</p>\r\n\r\n                        <p>By using below credentials you can access your account.</p>\r\n                        <p>Your Email- {USER_EMAIL}</p>\r\n                        <p>Your Password- {USER_PASSWORD}</p>\r\n\r\n                        <p>XYZ Company</p>\r\n                      </td>\r\n                    </tr>\r\n                  </table>\r\n                </td>\r\n              </tr>\r\n\r\n            <!-- END MAIN CONTENT AREA -->\r\n            </table>\r\n\r\n            <!-- START FOOTER -->\r\n            <div class="footer">\r\n              <table border="0" cellpadding="0" cellspacing="0">\r\n                <tr>\r\n                  <td class="content-block">\r\n                    <span class="apple-link">Company Address,Lorem Ipsum Lorem Ipsum</span>\r\n                    \r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td class="content-block powered-by">\r\n                    Powered by <a href="javascript:void(0)">XYZ Company</a>.\r\n                  </td>\r\n                </tr>\r\n              </table>\r\n            </div>\r\n            <!-- END FOOTER -->\r\n\r\n          <!-- END CENTERED WHITE CONTAINER -->\r\n          </div>\r\n        </td>\r\n\r\n      </tr>\r\n    </table>\r\n  </body>\r\n    <style>\r\n      /* -------------------------------------\r\n          GLOBAL RESETS\r\n      ------------------------------------- */\r\n      img {\r\n        border: none;\r\n        -ms-interpolation-mode: bicubic;\r\n        max-width: 100%; }\r\n\r\n      body {\r\n        background-color: #f6f6f6;\r\n        font-family: sans-serif;\r\n        -webkit-font-smoothing: antialiased;\r\n        font-size: 14px;\r\n        line-height: 1.4;\r\n        margin: 0;\r\n        padding: 0;\r\n        -ms-text-size-adjust: 100%;\r\n        -webkit-text-size-adjust: 100%; }\r\n\r\n      table {\r\n        border-collapse: separate;\r\n        mso-table-lspace: 0pt;\r\n        mso-table-rspace: 0pt;\r\n        width: 100%; }\r\n        table td {\r\n          font-family: sans-serif;\r\n          font-size: 14px;\r\n          vertical-align: top; }\r\n\r\n      /* -------------------------------------\r\n          BODY & CONTAINER\r\n      ------------------------------------- */\r\n\r\n      .body {\r\n        background-color: #f6f6f6;\r\n        width: 100%; }\r\n\r\n      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\r\n      .container {\r\n        display: block;\r\n        Margin: 0 auto !important;\r\n        /* makes it centered */\r\n       \r\n        width: 100%; }\r\n\r\n      /* This should also be a block element, so that it will fill 100% of the .container */\r\n      .content {\r\n        box-sizing: border-box;\r\n        display: block;\r\n        Margin: 0 auto;\r\n        padding: 10px; }\r\n\r\n      /* -------------------------------------\r\n          HEADER, FOOTER, MAIN\r\n      ------------------------------------- */\r\n      .main {\r\n        background: #ffffff;\r\n        border-radius: 3px;\r\n        width: 100%; }\r\n\r\n      .wrapper {\r\n        box-sizing: border-box;\r\n        padding: 20px; }\r\n\r\n      .content-block {\r\n        padding-bottom: 10px;\r\n        padding-top: 10px;\r\n      }\r\n\r\n      .footer {\r\n        clear: both;\r\n        Margin-top: 10px;\r\n        text-align: center;\r\n        width: 100%; }\r\n        .footer td,\r\n        .footer p,\r\n        .footer span,\r\n        .footer a {\r\n          color: #999999;\r\n          font-size: 12px;\r\n          text-align: center; }\r\n\r\n      /* -------------------------------------\r\n          TYPOGRAPHY\r\n      ------------------------------------- */\r\n      h1,\r\n      h2,\r\n      h3,\r\n      h4 {\r\n        color: #000000;\r\n        font-family: sans-serif;\r\n        font-weight: 400;\r\n        line-height: 1.4;\r\n        margin: 0;\r\n        Margin-bottom: 30px; }\r\n\r\n      h1 {\r\n        font-size: 35px;\r\n        font-weight: 300;\r\n        text-align: center;\r\n        text-transform: capitalize; }\r\n\r\n      p,\r\n      ul,\r\n      ol {\r\n        font-family: sans-serif;\r\n        font-size: 14px;\r\n        font-weight: normal;\r\n        margin: 0;\r\n        Margin-bottom: 15px; }\r\n        p li,\r\n        ul li,\r\n        ol li {\r\n          list-style-position: inside;\r\n          margin-left: 5px; }\r\n\r\n      a {\r\n        color: #3498db;\r\n        text-decoration: underline; }\r\n\r\n      /* -------------------------------------\r\n          BUTTONS\r\n      ------------------------------------- */\r\n      .btn {\r\n        box-sizing: border-box;\r\n        width: 100%; }\r\n        .btn > tbody > tr > td {\r\n          padding-bottom: 15px; }\r\n        .btn table {\r\n          width: auto; }\r\n        .btn table td {\r\n          background-color: #ffffff;\r\n          border-radius: 5px;\r\n          text-align: center; }\r\n        .btn a {\r\n          background-color: #ffffff;\r\n          border: solid 1px #3498db;\r\n          border-radius: 5px;\r\n          box-sizing: border-box;\r\n          color: #3498db;\r\n          cursor: pointer;\r\n          display: inline-block;\r\n          font-size: 14px;\r\n          font-weight: bold;\r\n          margin: 0;\r\n          padding: 12px 25px;\r\n          text-decoration: none;\r\n          text-transform: capitalize; }\r\n\r\n      .btn-primary table td {\r\n        background-color: #3498db; }\r\n\r\n      .btn-primary a {\r\n        background-color: #3498db;\r\n        border-color: #3498db;\r\n        color: #ffffff; }\r\n\r\n      /* -------------------------------------\r\n          OTHER STYLES THAT MIGHT BE USEFUL\r\n      ------------------------------------- */\r\n      .last {\r\n        margin-bottom: 0; }\r\n\r\n      .first {\r\n        margin-top: 0; }\r\n\r\n      .align-center {\r\n        text-align: center; }\r\n\r\n      .align-right {\r\n        text-align: right; }\r\n\r\n      .align-left {\r\n        text-align: left; }\r\n\r\n      .clear {\r\n        clear: both; }\r\n\r\n      .mt0 {\r\n        margin-top: 0; }\r\n\r\n      .mb0 {\r\n        margin-bottom: 0; }\r\n\r\n      .preheader {\r\n        color: transparent;\r\n        display: none;\r\n        height: 0;\r\n        max-height: 0;\r\n        max-width: 0;\r\n        opacity: 0;\r\n        overflow: hidden;\r\n        mso-hide: all;\r\n        visibility: hidden;\r\n        width: 0; }\r\n\r\n      .powered-by a {\r\n        text-decoration: none; }\r\n\r\n      hr {\r\n        border: 0;\r\n        border-bottom: 1px solid #f6f6f6;\r\n        Margin: 20px 0; }\r\n\r\n      /* -------------------------------------\r\n          RESPONSIVE AND MOBILE FRIENDLY STYLES\r\n      ------------------------------------- */\r\n      @media only screen and (max-width: 620px) {\r\n        table[class=body] h1 {\r\n          font-size: 28px !important;\r\n          margin-bottom: 10px !important; }\r\n        table[class=body] p,\r\n        table[class=body] ul,\r\n        table[class=body] ol,\r\n        table[class=body] td,\r\n        table[class=body] span,\r\n        table[class=body] a {\r\n          font-size: 16px !important; }\r\n        table[class=body] .wrapper,\r\n        table[class=body] .article {\r\n          padding: 10px !important; }\r\n        table[class=body] .content {\r\n          padding: 0 !important; }\r\n        table[class=body] .container {\r\n          padding: 0 !important;\r\n          width: 100% !important; }\r\n        table[class=body] .main {\r\n          border-left-width: 0 !important;\r\n          border-radius: 0 !important;\r\n          border-right-width: 0 !important; }\r\n        table[class=body] .btn table {\r\n          width: 100% !important; }\r\n        table[class=body] .btn a {\r\n          width: 100% !important; }\r\n        table[class=body] .img-responsive {\r\n          height: auto !important;\r\n          max-width: 100% !important;\r\n          width: auto !important; }}\r\n\r\n      /* -------------------------------------\r\n          PRESERVE THESE STYLES IN THE HEAD\r\n      ------------------------------------- */\r\n      @media all {\r\n        .ExternalClass {\r\n          width: 100%; }\r\n        .ExternalClass,\r\n        .ExternalClass p,\r\n        .ExternalClass span,\r\n        .ExternalClass font,\r\n        .ExternalClass td,\r\n        .ExternalClass div {\r\n          line-height: 100%; }\r\n        .apple-link a {\r\n          color: inherit !important;\r\n          font-family: inherit !important;\r\n          font-size: inherit !important;\r\n          font-weight: inherit !important;\r\n          line-height: inherit !important;\r\n          text-decoration: none !important; }\r\n        .btn-primary table td:hover {\r\n          background-color: #34495e !important; }\r\n        .btn-primary a:hover {\r\n          background-color: #34495e !important;\r\n          border-color: #34495e !important; } }\r\n\r\n    </style>\r\n</html>\r\n', 'Pass_01', '2018-09-05 07:03:05', '2018-09-05 07:03:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `slug`, `created`, `modified`) VALUES
(1, 'Add User', 'add_user', '2018-09-28 13:08:06', '2018-10-04 07:34:55'),
(2, 'Edit User', 'edit_user', '2018-09-28 13:15:31', '2018-09-28 13:15:31'),
(4, 'Add Page', 'add_page', '2018-09-28 13:18:02', '2018-09-28 13:18:02'),
(5, 'Edit Page', 'edit_page', '2018-09-28 13:18:09', '2018-09-28 13:18:09'),
(6, 'Edit Email Template', 'edit_email_template', '2018-09-28 13:18:46', '2018-09-28 13:18:46'),
(7, 'Delete Permission', 'delete_permission', '2018-10-04 07:15:49', '2018-10-04 07:15:49'),
(8, 'Delete User', 'delete_user', '2018-10-04 07:15:56', '2018-10-04 07:15:56'),
(9, 'Delete Role', 'delete_role', '2018-10-04 07:16:14', '2018-10-04 07:16:14'),
(10, 'View User List', 'view_user_list', '2018-10-05 06:43:03', '2018-10-05 06:43:03'),
(11, 'View User Detail', 'view_user_detail', '2018-10-05 07:13:30', '2018-10-05 07:13:30'),
(12, 'View Page', 'view_page', '2018-10-05 07:13:51', '2018-10-05 07:13:51'),
(13, 'View Pages List', 'view_page_list', '2018-10-05 07:16:20', '2018-10-05 07:16:20'),
(14, 'View Page Detail', 'view_page_detail', '2018-10-05 07:16:41', '2018-10-05 07:16:41'),
(15, 'Delete Page', 'delete_page', '2018-10-05 07:17:48', '2018-10-05 07:17:48'),
(16, 'View Email Templates List', 'view_email_template_list', '2018-10-05 07:18:42', '2018-10-05 07:18:42'),
(17, 'View Email Template Detail', 'view_email_template_detail', '2018-10-05 07:19:10', '2018-10-05 07:19:10'),
(18, 'Add Email Template', 'add_email_template', '2018-10-05 07:19:40', '2018-10-05 07:19:40'),
(19, 'Delete Email Template', 'delete_email_template', '2018-10-05 07:20:26', '2018-10-05 07:20:26'),
(20, 'View Permissions List', 'view_permission_list', '2018-10-05 07:21:34', '2018-10-05 07:21:34'),
(21, 'View Permission Detail', 'view_permission_detail', '2018-10-05 07:22:01', '2018-10-05 07:22:01'),
(22, 'Add Permission', 'add_permission', '2018-10-05 07:38:05', '2018-10-05 07:38:05'),
(23, 'Edit Permission', 'edit_permission', '2018-10-05 07:38:55', '2018-10-05 07:38:55'),
(24, 'View Roles List', 'view_roles_list', '2018-10-05 07:40:37', '2018-10-05 07:40:37'),
(25, 'View Role Detail', 'view_role_detail', '2018-10-05 07:41:13', '2018-10-05 07:41:13'),
(26, 'Add Role', 'add_role', '2018-10-05 07:41:34', '2018-10-05 07:41:34'),
(27, 'Edit Role', 'edit_role', '2018-10-05 07:41:57', '2018-10-05 07:41:57'),
(29, 'User Login', 'user_login', '2018-10-05 12:25:13', '2018-10-05 12:25:13'),
(30, 'User Register', 'user_register', '2018-10-05 12:25:26', '2018-10-05 12:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created`, `modified`) VALUES
(1, 'admin', '2018-09-05 16:32:17', '2018-09-05 16:32:17'),
(2, 'sub-admin', '2018-09-05 16:35:57', '2018-09-05 16:36:57'),
(3, 'customer', '2018-09-05 16:36:57', '2018-09-05 16:36:57'),
(4, 'provider', '2018-10-03 07:35:10', '2018-10-03 07:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(1, 2),
(3, 2),
(4, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(1, 5),
(3, 5),
(1, 6),
(4, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '(1 for active , 2 for expire )',
  `status` enum('1','2','3') NOT NULL DEFAULT '2' COMMENT '(1 for ''Active'', 2 for Inactive, ''3'' for deleted)',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `token`, `token_status`, `status`, `created`, `modified`) VALUES
(1, 'Admin', 'User', 'admin@localhost.com', '$2y$10$TlAgIJZuFm/UxznjwwwE2OS9yiuBIzy440H/SyiHqoy9u4h.V8tfi', NULL, '1', '1', '2018-08-27 07:39:22', '2018-09-04 06:57:09'),
(25, 'Scott', 'Thomsan', 'sthomas@localhost.com', '$2y$10$4KcERM284Ztkd2tNldf1Xex.HgtyXNfAwXwpLZOJovDRDmlDFt2lq', '058611f260f52f8ccfe20b804fab0527', '1', '1', '2018-08-31 11:53:05', '2018-09-04 06:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(25, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permissions_key` (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_key` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
