<?php

    $x = FALSE?
    1:2;
    echo $x."<br>";

    $x = null ?? 32;
    $x = "hi";
    $x = 10;
//    unset($x);
    echo $x."<br> :". isset($x)."<br> emp:".(int)(empty($x))."<br>";
    var_dump($x);
    const v =10;
    
    $ar = array("a"=>array("x"=>array(11,22,33),2,3),"b"=>6);
    print($ar["a"]["x"][0]*v);

?>
<DOCTYPE html>
<html>
    <body>

</body>
</html>