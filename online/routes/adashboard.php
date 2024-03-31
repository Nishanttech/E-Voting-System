<?php
session_start();
if(!isset($_SESSION['userdata'])){
header("location: ../");
}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
$status='<b style="color:red"> Not Voted</b>';
}
else{
$status='<b style="color:greed">Voted</b>';

}




?>

<html>
<head> 
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<title>Online Voting -Dashboard</title>
<link rel="stylesheet" href="../routes/css/stylesheet.css">
</head>

<body>

<style> 
#backbtn{
    padding:5px;
    border-radius:5px;
    background-color:black;
    color:white;
   float:left;
   margin:15px;

}
#logoutbtn{
    padding:5px;
    border-radius:5px;
    background-color:black;
    color:white;
float:right;
margin:15;
}
#profile{
background-color:white;
width:35%;
padding:15px;
float:left;
}
#group{
background-color:white;
width:50%;
padding:15px;
float:right;
}
#votebtn{
    padding:5px;
    border-radius:5px;
    background-color:black;
    color:white;
   float:left;
}
#mainpanel{
padding:10px;

}
#voted{
    padding:5px;
    border-radius:5px;
    background-color:green;
    color:white;
   float:left;

}




</style>

<div id="mainsection">
   <center>
    <div id="headerSection">
    <a href="../"><button id="backbtn">  Back</button></a>
    <a href="logout.php"><button id="logoutbtn">Logout</button></a>
<h1><img src="../logo.png" width="40" >Online Voting System</h1>
</div>
</center>
<hr>

<div id="mainpanel">

<div id="Profile">
<center><img src="../routes/uploads/<?php echo $userdata['photo']?>"height="100"width="100"></center><br><br>
<b>Name:</b> <?php echo $userdata['name']?><br><br>
<b>Mobile:</b> <?php echo $userdata['mobile']?> <br><br>
<b>Address:</b> <?php echo $userdata['address']?><br><br>
<b>Status:</b> <?php echo $status?><br><br>

 </div>


<div id="Group">
<?php 
 if($_SESSION['groupsdata']){
for($i=0; $i<count($groupsdata); $i++){
?>
<div>
<img style="float:right" src="../routes/uploads/<?php echo $groupsdata[$i]['photo']?>"height="100" width="100"><br><br>
<b>Group Name: </b><?php echo $groupsdata[$i]['name']?> <br><br>  
<b>Votes: </b><?php echo $groupsdata[$i]['votes']?> <br><br>
<form action="../routes/api/vote.php" method="POST">
  <input type="hidden"name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
  <input type="hidden"name="gid" value="<?php echo $groupsdata[$i]['id']?>">
     
   <?php 
   if($_SESSION['userdata']['status']==0){
     ?>
      <input type="submit"name="votebtn" value="vote" id="votebtn"><br><br>
      <?php
   }
     else{
        ?>
        <button disabled type="button"name="votebtn" value="vote" id="voted">Voted</button>
        <?php


     }
       ?>
  
</form>
</div>
<hr>
<?php

 
   
   }
}
 else{

 }
 ?>


 </div>
</div>
</div>
</body>
</html>