<?php
$ab = explode('/',dirname($_SERVER['PHP_SELF']));
// print_r($ab);
print_r(dirname($_SERVER['PHP_SELF']));
$countAb = count($ab) - 1;
$countAb1 = count($ab) - 2;
echo '<br>';

// echo $countAb;
// echo $countAb1;
$absultpath = '';
for ($i = 1; $i < $countAb; $i++) {
    $absultpath.=$ab[$i];
    if ($i < $countAb1) {
        $absultpath.='/';
    }
}
echo $absultpath;
?>