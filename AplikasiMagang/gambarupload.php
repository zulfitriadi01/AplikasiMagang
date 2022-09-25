<?php

include 'config.php';
$con = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$rid = $_POST["rid"];
$rname = $_POST["rname"];
$rimage = $_POST["rimage"];
$rlocation = $_POST["rlocation"];
$rdate = $_POST["rdate"];
$rcomment =$_POST["rcomment"];


$statement = "SELECT rid FROM report ORDER BY rid ASC";
$res = mysqli_query($con,$statement);
$rid = 0;

while($row = mysqli_fetch_array($res)){
    $rid = $row['rid'];
}

$path = "upload/$id.png";
$actualpath ="http://192.168.1.9/aplikasimagang/$path";
$statement = mysqli_prepare($con, "INSERT INTO report (rname, rimage, rlocation, rdate, rcomment) VALUES ($rname, $rimage, $rlocation, $rdate, $rcomment, = 'NEW',)");
mysqli_stmt_bind_param($statement, "", $rname, $rimage, $rlocation, $rdate, $rcomment, $rstatus);
mysqli_stmt_execute($statement);

if(mysqli_query($con,$statement)){
    file_put_contents($path,base64_decode($rimage));
    echo "Successfully uploaded ";

} 
mysqli_close($con);
} else {
    echo "error";
}

$responce = array();
    $responce["success"] = true ;
    echo json_encode($responce);

?>