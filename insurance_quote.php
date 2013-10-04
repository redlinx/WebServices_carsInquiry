<!--Created by Francis Rey Padao-->
<!--Date Created March 17 2013-->
<?php
    require_once("WEB-INFO/BAI_server.php");
    
    $insuranceQuote1 = new BAI_server();
    $insurance = $insuranceQuote1->calculateInsurance($_POST["zipCode"],$_POST["autoType"]);

    if($insurance == null)
    {
        echo "Out of insurance coverage";
    }
    
    else
    {
        echo "The estimated insurance quote for your automobile";
        echo "<br>";
        echo "with a principal location of ".$_POST["zipCode"];
        echo "<br>";
        echo "is : ".$insurance;    
    }
?>