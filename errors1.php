<?php
if (isset($errors) && is_array($errors) && count($errors) > 0) { // Check if $errors is set, is an array, and is not empty
    foreach ($errors as $error) {
        echo "<p>$error</p>"; // Output each error message
    }
}
?>
