<?php
    require 'db.php';

    $card_id=mysqli_real_escape_string($con, $_REQUEST['element']);
    $cat=$_REQUEST['targetelement'];
    if(is_numeric($cat))
    {
        $query="SELECT category FROM cards WHERE id='$cat'";
        $run_query=mysqli_query($con,$query);
        if($run_query)
        {
            $row = mysqli_fetch_assoc($run_query);
            $cat=$row['category'];
        }
    }
    $query="UPDATE cards SET category='$cat' WHERE id='$card_id'";
    $run_query=mysqli_query($con,$query);
    
    // Create a response data array
    $responseData = array(
        'category' => $cat
    );

    // Encode the data as JSON (optional but recommended for structured data)
    $responseJson = json_encode($responseData);

    // Set the response content type to JSON
    header('Content-Type: application/json');

    // Output the JSON response
    echo $responseJson;
?>