<?php
$conn = mysqli_connect("localhost", "root", "", "buggy_hub");

if ($conn){
    // echo "connected";
}else{
    echo "Not connected";
}
?>