<?php
    session_start();
    
	include('conn.php');

	
	$id=$_GET['id'];
	
    $query = mysqli_query($conn, "SELECT * FROM user WHERE userid='$id'");
    $userRow = mysqli_fetch_array($query);
    
    if(count($userRow) > 0){
        while($row=$userRow){
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $address=$row['address'];

        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["address"] = $address;
        $_SESSION["id"] = $id;
    
        header('location:index.php');
        break;
        }
    }else{
        header('location:index.php');
    }

?>