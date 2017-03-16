<?php
//Controlla che l'utente in face di regisrazione stia selezionando un username non usato
include("connection.php");


if (!empty(mysqli_real_escape_string($conn, $_POST["user"]))) {
    $sql = "SELECT count(*) FROM users WHERE user='" . $_POST["user"] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    if ($user_count > 0)
        echo "<span style='color:red;' class='status-not-available'> Username non disponibile</span>";
    else
        echo "<span style='color:green;' class='status-available'> Username disponibile</span>";
}

$conn->close();
?>