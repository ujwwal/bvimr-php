<?php
if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["nm"])){
echo "Name: ".$_POST["nm"]."<br>";
echo "Observation: POST does not show data in URL.<br>";
}else{
echo "<form method='post'>Name: <input name='nm'><button>Submit</button></form>";
}
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
