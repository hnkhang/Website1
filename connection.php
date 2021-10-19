<?php
    //$conn = mysqli_connect('localhost', 'root', '', 'online_shopping') 
    //or die ("Cannot connect database".mysqli_connect_error());
    $conn = pg_connect("postgres://zafkicklgluldy:473f6d11115453ef24454fcb86ed3665c539b77e94cf535fedc45f35801d5331@ec2-3-213-41-172.compute-1.amazonaws.com:5432/ddkj47cu0n3l0b");
    echo "connected success";
    if(!$conn){
        die("cannot connect");
    }
?>