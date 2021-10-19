<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>



<?php
        if(isset($_POST['btnLogin']))
        {
            $us = $_POST['txtUsername'];
            $us=pg_escape_string($conn,$us);
            $pa = $_POST['txtPass'];
            $err="";
            if($us == "")
            {
                $err.="Enter user name please <br/>";
            }
            if($pa == "")
            {
                $err.="Enter password please <br/>";
            }
            if($err != "")
            {
                echo $err;
            }
            else
            {
                /*echo "You are logged in with $us and password $pa";*/
                include_once("connection.php");
                $pass = md5($pa);
                $res1 = pg_query($conn,"SELECT username, password,state FROM customer WHERE username='$us' AND password='$pass'") or 
                die(pg_error($conn));
                $row1=pg_fetch_array($res1,Null,PGSQL_ASSOC);
                if(pg_num_rows($res1)==1)
                {
                    $_SESSION['us']=$us;
                    $_SESSION['admin']=$row1["state"];
                    echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
                }            
                else
                {
                    echo "You are logged in fail";
                }
            }
        }
    ?>


<h1>Login</h1>
<form id="form1" name="form1" method="POST" >
<div class="row">
    <div class="form-group">				    
        <label for="txtUsername" class="col-sm-2 control-label">Username(*):  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
		</div>
      </div>  
      
    <div class="form-group">
		<label for="txtPass" class="col-sm-2 control-label" >Password(*):  </label>			
		<div class="col-sm-10">
		      	<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""/>
		</div>
	</div> 
	<div class="form-group"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        	<input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Login"/>
            <input type="submit" name="btnCancel"  class="btn btn-primary" id="btnLogin" value="Cancel"/>
		</div>  
	</div>
 </div>
    
</form>
   