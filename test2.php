<?php
include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test 2</title>
	<link rel="stylesheet"  
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
    <style>   
    table {  
        border-collapse: collapse;  
    }  
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }   
  
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: pink;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }   
        </style>   
</head>
<body>
	<center>
		<?php

			$per_page_record = 2;
			if(isset($_GET['page']))
			{
				$page = $_GET['page'];
			}
			else
			{
				$page = 1;
			}
			$start_from = ($page - 1) * $per_page_record;

			$query = mysqli_query($con,"SELECT * FROM tbl_2022_05_26_single_sms LIMIT $start_from,$per_page_record");
		?>
		<div class="container">   
      <br>   
      <div>   
        <h1>Pagination Simple Example</h1>   
        <p>This page demonstrates the basic    
           Pagination using PHP and MySQL.   
        </p>   
        <table class="table table-striped table-condensed table-bordered">
          <thead>   
            <tr>   
              <th width="10%">ID</th>
              <th>User Name</th>   
              <th>Send Date</th>   
              <th>Destination Number</th>
              <th>Sender ID</th>
              <th>Message</th>
              <th>Status</th>
            </tr>   
          </thead>   
          <tbody>   
    <?php     
            while ($row = mysqli_fetch_array($query)) {    
                  // Display each field of the records.    
            ?>     
            <tr>     
             <td><?php echo $row["id"]; ?></td>     
            <td><?php echo $row["username"]; ?></td>   
            <td><?php echo $row["send_date"]; ?></td>   
            <td><?php echo $row["mobile"]; ?></td>
            <td><?php echo $row["sender_id"]; ?></td>
            <td><?php echo $row["msg_content"]; ?></td>
            <td><?php echo $row["msg_status"]; ?></td>
            </tr>     
            <?php     
                };    
            ?>     
          </tbody>   
        </table>   
  
     <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM tbl_2022_05_26_single_sms";     
        $rs_result = mysqli_query($con, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='test2.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='test2.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='test2.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='test2.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>
      </div>  
    </div>   
  </div>  
</center>   
	</center>
</body>
</html>