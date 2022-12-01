
<?php
include('../config/config.inc.php');

$usern = mysqli_real_escape_string($conn,strip_tags(stripcslashes(stripslashes($_POST['username']))));
$com = mysqli_real_escape_string($conn,strip_tags(stripcslashes(stripslashes($_POST['comment']))));
$pid = mysqli_real_escape_string($conn,$_POST['post_id']);

// //Create SQL to save the data
// $inscomment="INSERT INTO tbl_comments (username,comment,post_id) VALUES (?,?,?)";

// $stmt=$db->prepare($inscomment);
// $stmt->execute([$usern,$com,$pid]);


$sql = "INSERT INTO tbl_comments (username,comment,post_id) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $usern,$com,$pid); // one s for each parameter
$stmt->execute();


?>