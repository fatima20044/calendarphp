<!DOCTYPE html>
<html lang="en">
        <head>  
            <title>JavaScript FullCalendar</title>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        </head>
        <style>
         .box
         {
          width:100%;
          max-width:600px;
          background-color:#f9f9f9;
          border:1px solid #ccc;
          border-radius:5px;
          padding:16px;
          margin:0 auto;
         }
         .error
        {
          color: red;
          font-weight: 700;
        } 
         h3 {
  font-size:30px;text-align:center; line-height:1.5em; padding-bottom:45px; font-family:"Playfair Display", serif; text-transform:uppercase;letter-spacing: 2px; color:#111;
}


 h3:before {
  position: absolute;
  left: 0;
  bottom: 20px;
  width: 60%;
  left:50%; margin-left:-30%;
  height: 1px;
  content: "";
  background-color: #777; z-index: 4;
}
 h3:after {
  position:absolute;
  width:40px; height:40px; left:50%; margin-left:-20px; bottom:0px;
  content: '\00a7'; font-size:30px; line-height:40px; color:#c50000;
  font-weight:400; z-index: 5;
  display:block;
  background-color:#f8f8f8;
}

        
        </style>
        <?php 
        include('dbConfig.php');
        if(isset($_REQUEST['save-event']))
        {
          $title = $_REQUEST['title'];
          $start_date = $_REQUEST['start_date'];
          $end_date = $_REQUEST['end_date'];
        
          $insert_query = mysqli_query($connt, "insert into reservs set title='$title', start='$start_date', end='$end_date'");
          if($insert_query)
          {
            header('location:calendar.php');
          }
          else
          {
            $msg = "Event not created";
          }
        }
        ?>
        <body>  
          
            <div class="container" >  
            <div class="table-responsive">  
           
            <h3 >Make a reservation</h3><br/>
            <div class="box">
            <a class="btn btn-primary" href="accueil.php" role="button">back</a>
            <br />
            <br />
            <br />
             <form method="post" >  
               <div class="form-group">
               <label for="title">Enter Title of reunion</label>
               <input type="text" name="title" id="title" placeholder="Enter Title" required 
               data-parsley-type="title" data-parsley-trigg
               er="keyup" class="form-control"/>
              </div>
              <div class="form-group">
               <label for="date">Start Date</label>
               <input type="datetime-local" name="start_date" id="start_date" required 
               data-parsley-type="date" data-parsley-trigg
               er="keyup" class="form-control"/>
              </div>
              <div class="form-group">
               <label for="date">End Date</label>
               <input type="datetime-local" name="end_date" id="end_date" required 
               data-parsley-type="date" data-parsley-trigg
               er="keyup" class="form-control"/>
              </div>
              <div class="form-group">
               <input type="submit" id="save-event" name="save-event" value="Save Event" class="btn btn-success" />
               </div>
               <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
             </form>
             </div>
           </div>  
          </div>
    
         </body>  
        </html> 