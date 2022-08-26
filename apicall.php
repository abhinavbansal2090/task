<?php
// function curlCall($api_key,$page_num,$page_size)
// {
 require_once "config/config.php";
 
 
 
 for($i=1; $i<=126; $i++){
	 
	 $ch = curl_init();
	 
	 $api_key = $_GET['api_key'];
  
    $url = "https://trial.craig.mtcserver15.com/api/properties?api_key=$api_key&page[number]=$i&page[size]=100";
   
  
    // $data = http_build_query($dataArray);
  
    // $getUrl = $url."?".$data;
  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 80);
       
    $response = curl_exec($ch);
        
    if(curl_error($ch)){
        echo 'Request Error:' . curl_error($ch);
    }
       
    curl_close($ch);
	
	$data = json_decode($response,TRUE);
		
        // Prepare an insert statement
        
        $sql = "INSERT INTO task_table (County,Country,Town,Description,Displayable_address,Image,No_bed,No_bath,Price) VALUES (?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
			
			forEach($data["data"] as $key => $element){
				
				//santize the data before insert				
				$county = mysqli_real_escape_string($link,$element['county']);
				$country = mysqli_real_escape_string($link,$element['country']);
				$town = mysqli_real_escape_string($link,$element['town']);
				$description = mysqli_real_escape_string($link,$element['description']);
				$address = mysqli_real_escape_string($link,$element['address']);
				$image_full = mysqli_real_escape_string($link,$element['image_full']);
				$num_bedrooms = mysqli_real_escape_string($link,$element['num_bedrooms']);
				$num_bathrooms = mysqli_real_escape_string($link,$element['num_bathrooms']);
				$price = mysqli_real_escape_string($link,$element['price']);
				
				
				mysqli_stmt_bind_param($stmt, "sssssssss", $param_county,$param_country,$param_town,$param_description,$param_displayable_address,$param_image,$param_no_bed,$param_no_bath,$param_price);
				
				// Set parameters
				$param_county = $county;
				$param_country = $country;
				$param_town = $town;
				$param_description= $description;
				$param_displayable_address=$address;
				$param_image = $image_full;
				$param_no_bed=$num_bedrooms;
				$param_no_bath=$num_bathrooms;
				$param_price=$price;
				
				mysqli_stmt_execute($stmt);
				
			}
				
				echo "Records created successfully";
			
				mysqli_stmt_close($stmt);
				
				
			mysqli_close($link);

	 
		}
	 
	 
 }
 
 


	//}

?>
