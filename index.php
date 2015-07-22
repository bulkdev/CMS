<?php $configs = include('config.php');
   if($_GET['player'] === 0) header("Location: http://" + $configs['url']);
   
    ?>
<head>
   <link rel="icon" 
      type="image/png" 
      href="face.php?u=<?php                     
         $statsJSON = file_get_contents('http://'.$configs['url'].'/api.php?task=stats&player='.$_GET['player']);
          $stats = json_decode($statsJSON);
          if(empty($stats)){
          echo $_GET['player'];
          echo '&s=16';
          } else {
                       echo strtoupper($stats->skin); 
                       echo '&s=16';
         }
         ?>">
   <link rel="apple-touch-icon" 
      type="image/png" 
      href="face.php?u=<?php                     
         if(empty($stats)){
         echo $_GET['player'];
         echo '&s=250';
         } else {
                      echo strtoupper($stats->skin); 
                      echo '&s=250';
         }
         ?>">
   <meta name="description" content="View <?php echo $_GET['player'];?>'s <?php echo $configs['sitename']?> stats!">
</head>
<body>
   <?php include("layout/header.php"); ?>
   <div class="container">
      <div class="content">
         <div class="contentinner">
         </center>
         <center>
            <form class="search" action ="index.php" method="GET"><input type="text" name="player" autocomplete="off" placeholder="Player Name"><BR><input type="submit" value="Search Stats"></form>
         </center>
            <center>
               <aside id="profile">
                  <?php
                     function mcus_timeAgoString($dateInterval) {
                     $daysAgo = $dateInterval->days;
                     //echo $difference;
                     if ($daysAgo == 0){
                     if ($dateInterval->h == 0){
                       $diffStr = $dateInterval->i . " Minutes Ago";
                     } else {
                        $diffStr = $dateInterval->h . " Hours Ago";
                     }
                     } else {
                     if($daysAgo === 1) {
                       $diffStr = "1 Day Ago";
                     } else if($daysAgo === 7) {
                       $diffStr = "1 Week Ago";
                     } else if($daysAgo === 14) {
                       $diffStr = "2 Weeks Ago";
                     } else {
                       $diffStr = "$daysAgo Days Ago";
                     }
                     }
                     return $diffStr;
                     }
                     
                           $get_player = $_GET['player'];
                     
                          $infoJSON = file_get_contents('http://'.$configs['url'].'/api.php?task=info&player='.$_GET['player']);
                           $info = json_decode($infoJSON);
                           $statsJSON = file_get_contents('http://'.$configs['url'].'/api.php?task=stats&player='.$_GET['player']);
                          $stats = json_decode($statsJSON);
                           // $now = time(); // or your date as well`enter code here`
                     ?>
                  <img src="face.php?u=<?php                     
                     if(empty($stats)){
                     echo $_GET['player'];
                     echo '&s=96';
                     } else {
                                  echo strtoupper($stats->skin); 
                                  echo '&s=96';
                     }
                     ?>">
                  <?php 
                     echo '<style>';
                     echo '#verified {';
                     echo 'fill:';
                     echo '#';
                         if(empty($info->theme)){
                     echo $configs['color'] . ";";
                     } else {
                     echo substr($info->theme, 0, 50); 
                     }
                     echo '}';
                     echo '</style>';
                     ?>
                  <?php 
                     echo '<style>';
                     echo '.toggle {';
                     echo 'background-color:';
                     echo '#';
                         if(empty($info->theme)){
                     echo $configs['color'] . ";"; 
                     } else {
                     echo substr($info->theme, 0, 50); 
                     }
                     echo '}';
                     echo '</style>';
                     ?>
                  <?php 
                     echo '<style>';
                     echo '#profile::before {';
                     echo 'background:';
                     echo '#';
                         if(empty($info->theme)){
                     echo $configs['color'] . ";"; 
                     } else {
                     echo substr($info->theme, 0, 50); 
                     }
                     echo ' !important }';
                     echo '</style>';
                     ?>
                  <?php 
                     echo '<style>';
                     echo '#profile::before {';
                     echo 'background-image:';
                     echo 'url(';
                     echo substr($info->cover, 0, 50); 
                     echo ' ) !important;';
                     echo '</style>';
                     ?>
                  <h2>
                     <?php
                        if($info->locked == 1){
                                  echo '<div id="locked"><h5>This username is locked.</h5></div>';
                            }else {
                            echo strip_tags($_GET['player']);
                            }
                            ?>
                     <?php
                        if(substr($info->verified,0,2) == 1) {
                              echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="verified" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" />
                     </svg>
                     '
                     ;
                     }
                     //print_r ($stats);
                     if(substr($info->locked,0,2) == 0) {
                     echo '
                     <h3>
                     ';
                     echo 'Logged In ';
                     if(empty($info)){
                     echo "Not Registered";
                     } else { 
                     //echo substr($playerAccountInfo->lastlogin,0,50); 
                     $dtNow = new DateTime('Now');       
                     $dtLastLogin = new DateTime($info->lastlogin);
                     $diLastLoginToNow = $dtNow->diff($dtLastLogin);
                     echo mcus_timeAgoString($diLastLoginToNow);
                     }
                     echo '';
                     ;
                     }
                     ?>
                  </h2>
                  <center>
                     <table>
                        <tr>
                           <th>Kills</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->kills, 0, 50); ?></td>
                        </tr>
                        <tr>
                           <th>Deaths</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->deaths, 0, 50); ?></td>
                        </tr>
                        <tr>
                           <th>Ratio</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->ratio, 0, 50); ?></td>
                        </tr>
                     </table>
                     <BR>
                     <table>
                        <tr>
                           <th>Joins</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->joins, 0, 50); ?></td>
                        </tr>
                        <tr>
                           <th>Quits</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->quits, 0, 50); ?></td>
                        </tr>
                        <tr>
                           <th>Kicked</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->kicked, 0, 50); ?></td>
                        </tr>
                     </table>
                     <BR>    
                     <table>
                        <tr>
                           <th>Places</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->places, 0, 50); ?></td>
                        </tr>
                        <tr>
                           <th>Breaks</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->breaks, 0, 50); ?></td>
                        </tr>
                        <tr>
                           <th>Chats</th>
                           <td><?php echo empty($stats) ? "--" : substr($stats->chats, 0, 50); ?></td>
                        </tr>
                     </table>
         </div>
         </center>
         <BR>
         </center>
         </aside>
      </div>
   </div>
   <footer><?php include("layout/footer.php"); ?></footer>
</body>
</html>