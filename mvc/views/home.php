<?php
while($row = mysqli_fetch_array($data["user"])){
    echo "<p>" . $row["hoten"] . "</p><br>";
}
?>
