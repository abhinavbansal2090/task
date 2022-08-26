<?php

function search(){
require_once "config.php";
session_start();
       
// Store the submitted data sent
// via POST method, stored 
  
// Temporarily in $_POST structure.
$_SESSION['town'] = $_POST['town'];
  
$_SESSION['no_bed'] = $_POST['no_bed'];
  
$_SESSION['price'] = $_POST['price'];

 $sql = "SELECT * FROM task_table WHERE Town = ? OR  No_bed = ?  OR Price = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iii", $param_town,$param_no_bed,$param_price);
        
        // Set parameters
        $param_town = $_SESSION['town'];
		$param_no_bed = $_SESSION['no_bed'];
		$param_price = $_SESSION['price'];
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
				//return $row;
				
				print_r($row);
				
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
				echo "error";
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
	
}
?>