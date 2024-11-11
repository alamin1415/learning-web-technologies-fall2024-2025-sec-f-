<?php
$array = [3, 7, 12, 5, 9, 21, 34, 45, 8, 18];

$searchElement = 9;

$found = false;

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] == $searchElement) {
        $found = true;
        echo "Element $searchElement found at index $i.<br>";
        break;
    }
}

if (!$found) {
    echo "Element $searchElement not found in the array.<br>";
}
?>
