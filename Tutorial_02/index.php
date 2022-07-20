<?php 

$row = 6;
    
for($i=1; $i<=$row; $i++) {
    for($j=$row; $j>$i; $j--) {
        echo "&nbsp;";
    }
    for($k=0; $k<$i*2-1; $k++) {
        echo "*";
    }
    echo "<br>";
}

for($i=1; $i<=$row-1; $i++) {
    for($j=0; $j<$i; $j++) {
        echo "&nbsp;";
    }
    for($k=($row-$i)*2-1; $k>0; $k--) {
        echo "*";
    }
    echo "<br>";
}

?>