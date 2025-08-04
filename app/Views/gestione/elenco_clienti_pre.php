<?php foreach ($clienti as $key => $value) {
    echo "<pre>";   
    echo "Key: " . $key . "\n";
    echo "Value: ";
    if (is_array($value)) {
        print_r($value);
    } else {
        echo $value;
    }   
    echo "\n";
    echo "------------------------\n";
    echo "</pre>";
    echo "<br>";

}
?>