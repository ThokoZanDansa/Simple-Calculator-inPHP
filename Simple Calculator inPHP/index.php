<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="apple-touch-icon" href="favicon.png">
<link rel="stylesheet" href="body.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Calculator</title>
</head>
<body class="j"><center>
    <form  class = " SF"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method= POST> 
    <input type="number" name= "FNumber" placeholder = "ENTER NUMBER" required> <br><br>
      <select name= "Operator" class="Oper">
      <option value="empty"> Select Operator</option>
        <option value="Subtract">-</option>
        <option value="multiply">*</option>
        <option value="Div">/</option>
        <option value="add">+</option>
      </select> <br>
      <input type="number" name="LNumber" placeholder="ENTER NUMBER" required > <br> 
        <button>Calculate</button></center>
    
    </form> 
   
    <?php  
    // Checking for submitted data 
    if( $_SERVER["PHP_SELF" ]=="POST"){
 $FNumber= filter_input(INPUT_POST, "FNumber", FILTER_SANITIZE_NUMBER_FLOAT); 
  $LNumber= filter_input(INPUT_POST, "LNumber", FILTER_SANITIZE_NUMBER_FLOAT);
   $Operator = htmlspecialchars($_POST["Operator"]);
   //error handlers
   $errors = false;
   if (enpty($FNumber)|| empty($LNumber)or  empty($Operator)){
    echo"<p class='calc-error'>Fill in all fields!</p>";
    $errors= true;

   }
   if(!is_numeric($FNumber) || !is_numeric($LNumber)){
    echo"<p class='calc-error'>Use numbers  in all fields!</p>";
    $errors= true;
   } // Calculating numbers if no errors!
    if(!$erros){
        $value;
        switch ($Operator) {
           
        
            case 'add':
                $value= $FNumber+$LNumber;
                break;
               case 'Sub':
                    $value= $FNumber-$LNumber;
                    break;
                    case 'mul':
                        $value= $FNumber*$LNumber;
                        break;
                        case 'Div':
                            $value= $FNumber/$LNumber;
                          break;
               
            
            default:
            echo"<p class='invalid operators!'</p>";
        
        }
        
    } echo'<p class="calc-result"> Answer ='. $value. '</p>';
    }
   
    ?>

    
</body>
</html>