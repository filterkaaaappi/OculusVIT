<?php
    include_once("mysqlConfig.php");
    
    session_start();
    $username = $_SESSION['username'];
    
    //getting examid of exam being attended 
    $eid_data = mysqli_query($sql_api,"SELECT eid FROM history WHERE status='ongoing' AND username='$username'");
    $examid = mysqli_fetch_assoc($eid_data);
    $eid = $examid['eid'];
    
    //getting the exam name to be stored into the dB 
    $ename_data = mysqli_query($sql_api, "SELECT title FROM quiz WHERE eid='$eid'");
    $examname = mysqli_fetch_assoc($ename_data);
    $ename = $examname['title'];

    $date = new DateTime();
    $r_date = $date->format('Y-m-d H:i:s');
    //$array[] = array("master", "Idk some exam" ,$date);

    $str = "Violation Reported! -> ".$username."/".$ename."/".$r_date;

    //INSERT INTO violations(username, examname, date) VALUES ('$username','$eName','$date');

    echo $str;
?>

