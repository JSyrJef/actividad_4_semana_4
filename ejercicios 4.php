<?php 
// 1. Ordenar Lista con Bubble Sort (Descendente)
function bubbleSortDesc($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - 1 - $i; $j++) {
            if ($arr[$j] < $arr[$j + 1]) {
                // Intercambiar los elementos
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

// Lista de prueba
$list = [4, -2, 5, 3, 5, 1, -1];
echo "Antes de ordenar: ";
print_r($list);

$list = bubbleSortDesc($list);
echo "Después de ordenar (descendente): ";
print_r($list);


// 2. Ordenar Lista con Merge Sort (Alfabético)
function mergeSort($arr) {
    if (count($arr) < 2) {
        return $arr;
    }
    $mid = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    while (count($left) > 0 && count($right) > 0) {
        if (strtolower($left[0]) < strtolower($right[0])) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }
    return array_merge($result, $left, $right);
}

// Lista de prueba
$words = ["manzana", "banana", "cereza", "pera", "kiwi"];
echo "Antes de ordenar: ";
print_r($words);

$words = mergeSort($words);
echo "Después de ordenar (alfabético): ";
print_r($words);


// 3. Ordenar Lista con Insertion Sort (Alfabético)
function insertionSort($arr) {
    for ($i = 1; $i < count($arr); $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        
        // Mover los elementos que son mayores que el key
        while ($j >= 0 && strtolower($arr[$j]) > strtolower($key)) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}

// Lista de prueba
$names = ["Carlos", "Ana", "Juan", "Lucía", "Pedro"];
echo "Antes de ordenar: ";
print_r($names);

$names = insertionSort($names);
echo "Después de ordenar (alfabético): ";
print_r($names);
?>