<?php
if($_SERVER["REQUEST_METHOD"]=="GET" and isset($_GET["nm"])){
echo "Name: ".$_GET["nm"]."<br>";
echo "Observation: GET shows data in URL.<br>";
}else{
echo "<form method='get'>Name: <input name='nm'><button>Submit</button></form>";
}
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
