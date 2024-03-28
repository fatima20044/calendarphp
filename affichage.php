<?php
require_once('dbConfig.php');
$data=mysqli_query($connt,"SELECT * FROM  members");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
</head>
<style>
  body{
    margin:40px;
  }
         .box
         {
          width:100%;
          max-width:1000px;
          background-color:#f9f9f9;
          border:1px solid #ccc;
          border-radius:5px;
          padding:16px;
          margin:0 auto;
         }
         thead{
          background-color:#ee7724;
          border-radius:5px;
          border:1px solid #ccc;
         }
         </style>
<body>
<div class="container">
            <div class="table-responsive">  
            <div class="box">
            <a class="btn btn-primary" href="accueil.php" role="button">back</a>
                <br />
                <br />
                <br />
           
<table class="table">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
    <?php
    foreach($data as $a){
?>
 <tbody>
    <tr>
    <td><?php echo $a['id'] ?></td>
    <td><?php echo $a['username'] ?></td>
    <td><?php echo $a['email'] ?></td>
    </tr>
  </tbody>
<?php
    }
    ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
</body>
</html>