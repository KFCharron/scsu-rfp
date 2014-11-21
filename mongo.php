<?php
function display()
{
    echo "TESTING ".$_POST["summary"];
}
if(isset($_POST['phpsub']))
{
   display();
} 
?>