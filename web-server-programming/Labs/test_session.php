<?php
session_start();

if (isset($_SESSION["user_country"])) {
    $country = $_SESSION["user_country"];
    echo "Ваша страна:". htmlspecialchars($country);
} else {
    echo "Ничего";
}
?>