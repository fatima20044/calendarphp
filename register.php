<?php
session_start();
require_once('dbConfig.php');
if(isset($_POST["submit"])){
$userName=$_POST['username'];
$passWord=$_POST['password'];
$email=$_POST['email'];
$confirmpassWord=$_POST['confirmpassword'];
$data="SELECT * FROM  members  WHERE username ='$userName' OR email='$email'";
$check=mysqli_query($connt,$data);
if(mysqli_num_rows($check)>0){
  echo"<script> alert('Username or Email Has Already Taken'); </script>";
}
else{
  if($passWord==$confirmpassWord){
    $query="INSERT INTO members VALUES('','$userName','$email','$passWord')";
    mysqli_query($connt,$query);
    echo "<script> alert('Registration Successful'); </script>";
  }
  else{
    echo "<script> alert('password does not match'); </script>";
  }
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>register</title>
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                      <a href="index.html" class="logo">
                          <img src="assets/images/logo1.png" alt="">
                      </a>
                        
                      </div>
                    
                      <form action="" method="POST">
                        <p>Create account</p>
      
                        <div class="form-outline mb-4">
                          <input type="text" name="username" class="form-control"
                            placeholder="username"  />
                          <label class="form-label" for="form2Example11">Username</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control"
                              placeholder="email" />
                            <label class="form-label" for="">Email</label>
                          </div>

                        <div class="form-outline mb-4">
                          <input type="password" name="password" class="form-control" 
                          placeholder="Password" />
                          <label class="form-label" for="">Password</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="password" name="confirmpassword" class="form-control" 
                        placeholder="Password" />
                        <label class="form-label" for="">confirm Password</label>
                      </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit" type="submit" >register</button>
                           
                          
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Already a member?</p><a class="text-muted" href="index.php">Sign in</a>
                          
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">Effortless Metting Room Reservations</h4>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>