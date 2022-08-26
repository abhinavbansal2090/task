<?php
function curlCall($page_num,$page_size)
{
 require_once "config.php";
 
 $ch = curl_init();
  
    $url = "https://trial.craig.mtcserver15.com/api/properties";
    $dataArray = ['api_key' => "2S7rhsaq9X1cnfkMCPHX64YsWYyfe1he",
	'page[number]'=>$page_num,
	'page[size]'=>$page_size
	];
  
    $data = http_build_query($dataArray);
  
    $getUrl = $url."?".$data;
  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 80);
       
    $response = curl_exec($ch);
        
    if(curl_error($ch)){
        echo 'Request Error:' . curl_error($ch);
    }
       
    curl_close($ch);
	
	$data = json_decode($response,TRUE);
	
	//forEach($data["data"] as $key => $element){
		
        // Prepare an insert statement
		
		//if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $sql = "INSERT INTO task_table (County,Country,Town,Description,Displayable_address,Image,No_bed,No_bath,Price) VALUES (?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
			
			forEach($data["data"] as $key => $element){
				
				//echo $element['county']."<br/>";
				
				mysqli_stmt_bind_param($stmt, "sssssssss", $param_county,$param_country,$param_town,$param_description,$param_displayable_address,$param_image,$param_no_bed,$param_no_bath,$param_price);
				
				// Set parameters
				$param_county = $element['county'];
				$param_country = $element['country'];
				$param_town = $element['town'];
				$param_description= $element['description']; ;
				$param_displayable_address=$element['address'];
				$param_image = $element['image_full'];
				$param_no_bed=$element['num_bedrooms'];
				$param_no_bath=$element['num_bathrooms'];
				$param_price=$element['price'];
				
				mysqli_stmt_execute($stmt);
				
				// if(mysqli_stmt_execute($stmt)){
					
					// echo "Records created successfully";
				// }
			}
				
				echo "Records created successfully";
			
				mysqli_stmt_close($stmt);
				
				
			mysqli_close($link);
	
	
	
//}

}

	}

?>