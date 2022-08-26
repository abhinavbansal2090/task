<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Operation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 140px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
				
					<div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Filter Data</h2>
                    </div>
					
					<form action="search.php" method="POST">
                        <div class="form-group">
                            <label>Town</label>
                            <input type="text" name="town" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Number of Bedrooms</label>
                            <input type="text" name="no_bed" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" >
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>

                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Data</h2>
                    </div>

					<?php

                        require_once "config/config.php";
						
                        $sql = "SELECT * FROM task_table";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                    echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>County</th>";
                                            echo "<th>Country</th>";
                                            echo "<th>Town</th>";
											echo "<th>Number of bedroom</th>";
											echo "<th>Price</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['County'] . "</td>";
                                        echo "<td>" . $row['Country'] . "</td>";
                                        echo "<td>" . $row['Town'] . "</td>";
										echo "<td>" . $row['No_bed'] . "</td>";
										echo "<td>" . $row['Price'] . "</td>";
                                        echo "<td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                    echo "</table>";

                                    mysqli_free_result($result);
                                    
                            }
                            else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        }
                        else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        mysqli_close($link);
					?>
					
					
                    
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
</html>
</html>
</html>
</html>