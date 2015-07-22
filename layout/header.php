<?php $configs = include('config.php');?>
<head>
   <title><?php echo $configs['sitename'] . " - "; if(empty($_GET['player'])){ echo "STATS";} else { echo strtoupper($_GET['player']); }?></title>
   <meta name="apple-mobile-web-app-title" content="<?php echo ""; if(empty($_GET['player'])){ echo "STATS";} else { echo strtoupper($_GET['player']); }?>">
   <meta name=viewport content="width=device-width, user-scalable=no">
   <style>
      .logo, input[type=submit] {
      text-shadow:2px 2px #3F3F3F;
      }
      #profile, body {
      text-align:center;
      }
      header>nav>div>a, header>nav>div>div>a {
      text-align:center;
      color:#fbfbfb;
      transition:background-color .2s ease;
      }
      input[type=submit], input[type=text] {
      border:none;
      width:80%;
      height:50px;
      font-size:18px;
      font-family:inherit;
      -webkit-appearance:none;
      }
      @font-face {
      font-family:Minecraftia;
      src:url(fonts/minecraftia.ttf);
      }
      body {
      font-family:Minecraftia, sans-serif;
      background-color:#ebebeb;
      overflow:hidden;
      }
      header {
      width:100%;
      background-color:#<?php echo $configs['color']?>;
      box-shadow:0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(0, 0, 0, .23);
      }
      .logo {
      font-size:22px;
      }
      header>nav>div {
      float:left;
      width:100%;
      height:100%;
      position:relative;
      }
      header>nav>div>a {
      width:100%;
      height:100%;
      display:block;
      line-height:50px;
      }
      header>nav>div:hover>a {
      background-color:rgba(0, 0, 0, .1);
      cursor:pointer;
      }
      header>nav>div>div {
      display:none;
      overflow:hidden;
      background-color:#fff;
      min-width:200%;
      position:absolute;
      box-shadow:0 10px 20px rgba(0, 0, 0, .19), 0 6px 6px rgba(0, 0, 0, .23);
      padding:10px;
      }
      #profile>img, .container, footer, header {
      position:relative;
      }
      header>nav>div:not(:first-of-type):not(:last-of-type)>div {
      left:-50%;
      border-radius:0 0 3px 3px;
      }
      header>nav>div:first-of-type>div {
      left:0;
      border-radius:0 0 3px;
      }
      header>nav>div:last-of-type>div {
      right:0;
      border-radius:0 0 0 3px;
      }
      header>nav>div:hover>div {
      display:block;
      }
      header>nav>div>div>a {
      display:block;
      float:left;
      padding:8px 10px;
      width:46%;
      margin:2%;
      background-color:#f44355;
      border-radius:2px;
      }
      header>nav>div>div>a:hover {
      background-color:#212121;
      cursor:pointer;
      }
      h1 {
      margin-top:100px;
      font-weight:100;
      }
      p {
      color:#aaa;
      font-weight:300;
      }
      @media (max-width:600px) {
      header>nav>div>div>a {
      margin:5px 0;
      width:100%;
      }
      header>nav>div>a>span {
      display:none;
      }
      }a:active, a:hover, a:link, a:visited {
      text-decoration:none;
      }
      #verified {
      margin-bottom:-4px;
      }
      input[type=text] {
      background:#e5e5e5;
      border-radius:0;
      color:#5a5656;
      outline:0;
      padding:0 10px;
      margin-bottom:15px;
      }
      input[type=submit] {
      background-color:#<?php echo $configs['color']?>;
      border-radius:0;
      color:#f4f4f4;
      cursor:pointer;
      }
      .search {
      max-width:100%;
      background:#fafafa;
      padding-bottom:38px;
      padding-top:38px;
      box-shadow:rgba(0, 0, 0, .14902) 0 1px 1px 0, rgba(0, 0, 0, .09804) 0 1px 2px 0;
      margin-bottom: 50px;
      }
      html, body {
      height:100%;
      margin:0;
      padding:0;
      }
      header {
      height: 3.4em;
      position:relative;
      z-index:1;
      }
      .content {
      top:5em;
      bottom:5em;
      overflow:auto;
      }
      .contentinner {
      margin-top: 40px;
      }
      .container {
      height: 100%;
      position: relative;
      overflow: auto;
      }
      footer {
      height: 2em;
      position:relative;
      z-index:1;
      }
      #profile::before {
      display:block;
      height:144px;
      border-radius:0;
      background:#0a0;
      -webkit-box-shadow:0 4px 0 rgba(0, 0, 0, .02);
      box-shadow:0 4px 0 rgba(0, 0, 0, .02);
      content:'';
      }
      #profile {
      background:#fafafa;
      box-shadow:rgba(0, 0, 0, .14902) 0 1px 1px 0, rgba(0, 0, 0, .09804) 0 1px 2px 0;
      padding-bottom:38px;
      max-width:100%;
      margin-bottom: 80px;
      }
      #profile>img {
      top:-52px;
      display:block;
      margin:auto;
      width:96px;
      height:96px;
      border:4px solid #fff;
      border-radius:0;
      -webkit-box-shadow:0 4px 0 rgba(0, 0, 0, .02);
      box-shadow:0 4px 0 rgba(0, 0, 0, .02);
      }
      #profile h2, #profile h3 {
      font-weight:400;
      color:#77767e;
      margin-bottom:30px;
      }
      #profile h2 {
      margin-top:-30px;
      padding:0 16px 38px;
      font-size:21px;
      }
      #profile h3 {
      margin-top:-60px;
      padding:0 38px 16px;
      font-size:11px;
      }
      #profile h4 {
      font-weight:400;
      }
      #locked {
      margin-bottom:-80px;
      }
      table, td, th {
      border:1px solid #000;
      border-collapse:collapse;
      width:80%;
      }
      td, th {
      padding:5px;
      text-align:left;
      }
   </style>
   <link rel="stylesheet" type="text/css" href="custom.css">
</head>
<header>
   <nav>
      <div>
         <a class="logo" href="<?php echo $configs['protocol']?><?php echo $configs['url']?>"><span></span><?php echo $configs['sitename']?></a>
      </div>
      </div>
   </nav>
</header>