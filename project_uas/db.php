<?php
$conn = mysqli_connect("localhost","root","","uas_web");
if(!$conn){
  die("Database error");
}
session_start();
