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
            $msg = "Event  created";
          }
          else
          {
            $msg = "Event not created";
          }
        }
        ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<style>
 body {
                
                margin:100px;
                padding: 0;
                font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
                font-size: 14px;
                
            },
            #calendar {
             min-width: 500px;
              
                
               
            }
           
        
</style> 
</head>
<body>

<div class="container">
            <div class="row clearfix">
                <div class="col-md-10 column">
                <a class="btn btn-primary" href="accueil.php" role="button">back</a>
                <br />
                <br />
                <br />
                        <div id='calendar'></div> 
                        
                </div>
            </div>
        </div>
                     
             

 
  <?php 
include('dbConfig.php');
$fetch_event = mysqli_query($connt, "select * from reservs");
?>
<script>
    $(document).ready(function(){
        $('#calendar').fullCalendar({
            header:
            {
                right: 'month, basicWeek, basicDay',
                center: 'title',
                left: 'prev, next, today',
            },

            events:[
            <?php 
            while($result = mysqli_fetch_array($fetch_event))
            
                {?>
            {
                id: '<?php echo $result['id'];?>',
                title: '<?php echo $result['title'];?>',
                start: '<?php echo $result['start'];?>',
                end: '<?php echo $result['end'];?>',
                color: 'bleu',
                textColor: 'black'
                

            },
            <?php } ?>
            ],
            editable: true,
            eventClick: function(event)
            {
                if(confirm("Are you sure want to remove it?"))
                {
                var id = event.id;
                $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: { id: id},
                    success: function()
                    {
                        alert("Event removed successfully");
                        window.location.reload();
                    }
                });
            }
            }
        });
    });
</script>
</body>
</html>
