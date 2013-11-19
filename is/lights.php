<?php
$light = $_GET["value"];
if($light == "off" || $light == "neutral"){
setcookie("Light", "on", time()+3600*24,"/");
}
if($light == "on"){
setcookie("Light", "off", time()+3600*24,"/");
}
echo "ok!";
// print_r($_COOKIE);
?>