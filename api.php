<?php
# EPICMC CMS API

$date1 = new DateTime('NOW');
$date2 = new DateTime('12/12/2014');

$difference = $date1->diff($date2)->days;

# EVENTUALLY YOU WILL EDIT THESE SETTINGS FROM THE GLOBAL CONFIGURATION FILE
# BY DEFAULT YOU USE THE SIMPLEAUTH_PLAYERS AND PLAYER_STATS TABLES
$link = new mysqli('database_hostname', 'database_username', 'database_password', 'database_name');

# TALLY ALL REGISTERED PLAYERS

if ($_GET['task'] == 'total') {
    $get_table = 'simpleauth_players';
    $result    = mysqli_query($link, "SELECT * FROM $get_table");
    
    echo '{"task":"total","amount":"';
    echo mysqli_num_rows($result);
    echo '"}';
} elseif ($_GET['task'] == 'info') {
    $get_player = $_GET['player'];
    $get_table  = 'simpleauth_players';
    $result     = mysqli_query($link, "SELECT * FROM $get_table WHERE name = '" . mysqli_real_escape_string($link, $get_player) . "'");
    while ($data = mysqli_fetch_array($result)) {
        echo '{"task":"view","registered":"';
        echo date('m/d/Y h:i A', $data['registerdate']);
        echo '","verified":"';
        echo $data['verified'];
        echo '","banned":"';
        echo $data['banned'];
        echo '","locked":"';
        echo $data['locked'];
        echo '","theme":"';
        echo $data['theme'];
        echo '","email":"';
        echo $data['email'];
        echo '","cover":"';
        echo $data['cover'];
        echo '","ip":"';
        echo $data['lastip'];
        
        echo '","lastlogin":"';
        echo date('m/d/Y h:i A', $data['logindate']);
        echo '","ip":"';
        echo $data['lastip'];
        echo '"}';
    }
} elseif ($_GET['task'] == 'stats') {
    $get_player = $_GET['player'];
    $get_table  = 'player_stats';
    $result     = mysqli_query($link, "SELECT * FROM $get_table WHERE name = '" . mysqli_real_escape_string($link, $get_player) . "'");
    while ($data = mysqli_fetch_array($result)) {
        
        if ($data['skin'] == null) {
            $skin = $data['name'];
        } else {
            $skin = $data['skin'];
        }
        
        echo json_encode(array(
            'task' => 'viewstats',
            'skin' => $skin,
            'deaths' => $data['deaths'],
            'kills' => $data['kills'],
            'joins' => $data['joins'],
            'quits' => $data['quits'],
            'kicked' => $data['kicked'],
            'places' => $data['places'],
            'breaks' => $data['breaks'],
            'chats' => $data['chats'],
            
            
            // then ratio
            'ratio' => $data['kills'] / $data['deaths']
        ));
    }
} elseif ($_GET['task'] == 'login') {
    $get_user  = $_GET['user'];
    $get_table = 'simpleauth_players';
    $result    = mysqli_query($link, "SELECT * FROM $get_table WHERE name = '" . mysqli_real_escape_string($link, $get_user) . "'");
    while ($data = mysqli_fetch_array($result)) {
        echo '{"task":"login","password":"';
        echo $data['hash'];
        echo '","lastip":"';
        echo $data['lastip'];
        echo '","timestamp":"';
        echo $data['logindate'];
        echo '"}';
    }
} else {
    echo 'functioning';
}
function hashME($player, $password)
{
    return bin2hex(hash("sha512", $password . strtolower($player), true) ^ hash("whirlpool", strtolower($player) . $password, true));
}
?> 
