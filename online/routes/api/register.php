<?php 

include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$address=$_POST['address'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$role=$_POST['role'];


if($password==$cpassword){
 move_uploaded_file($tmp_name, "../uploads/$image");
 $insert=mysqli_query($connect,"INSERT INTO user(name,mobile,password,address,photo,role,status,votes)VALUES('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)");
if($insert){
   echo'
    <script>
    alert("Registration seccessful");
    window.location="../../";
    </script>
';
}
else{
echo'
<script>
alert("some error occured");
window.location="../routes/Register.html";
</script>
';
}
}
else{

echo '
<script>

alert("password and confirm password does not match");
window.location="../Register.html";
</script>

';
}


?>