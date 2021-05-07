<?php

    function login($con,$username,$password){
        $sql ="SELECT * FROM user WHERE username= '$username' ";
        $query=mysqli_query($con,$sql);
        return $query;
    }
?>