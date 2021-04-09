<h1>SWap Variables without using Third Variable</h1>
<?php

// swap varaibles using arthmatic varaibles 

echo getSwapArth(27, 56);

echo getWapMul(27, 45);

echo getWapBit(20, 54);
echo getWapWithoutArth(43, 65);
function getSwapArth($x, $y)
{
    $data = '<h2>With Arthmatic</h2>';
    $data .= 'Before Swaping X = ' . $x . ', Y = ' . $y . '</br>';

    $x = $x + $y;
    $y = $x - $y;
    $x = $x - $y;
    $data .= 'After Swaping X = ' . $x . ', Y = ' . $y;
    return $data;
}
function getWapMul($x, $y)
{

    $data = '<h2>With Multiplication and devide</h2>';
    $data .= 'Before Swaping X = ' . $x . ', Y = ' . $y . '</br>';

    $x = $x * $y;
    $y = $x / $y;
    $x = $x / $y;
    $data .= 'After Swaping X = ' . $x . ', Y = ' . $y;
    return $data;
}
function getWapBit($x, $y)
{

    $data = '<h2>With Bitwise Operator</h2>';
    $data .= 'Before Swaping X = ' . $x . ', Y = ' . $y . '</br>';

    $x = $x ^ $y;
    $y = $x ^ $y;
    $x = $x ^ $y;
    $data .= 'After Swaping X = ' . $x . ', Y = ' . $y;
    return $data;
}
function getWapWithoutArth($x, $y)
{

    $data = '<h2>With Bitwise Operator</h2>';
    $data .= 'Before Swaping X = ' . $x . ', Y = ' . $y . '</br>';

    $x = ($x & $y) + ($x | $y);
    $y = $x + (~$y) + 1;
    $x = $x + (~$y) + 1;
    $data .= 'After Swaping X = ' . $x . ', Y = ' . $y;
    return $data;
}