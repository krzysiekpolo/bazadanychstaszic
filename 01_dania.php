<?php
    $link = new mysqli('localhost', 'root', '', 'raporty_01');
    $sql = "SELECT nazwa FROM dania";
    $result = $link->query($sql);
    $dishes = $result -> fetch_all(1);

    $sql = "SELECT imie, nazwisko
            FROM pracownicy";
    $result = $link->query($sql);
    $humans = $result -> fetch_all(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista dań</h1>
    <ol>
        <!-- li> [nazwa] </li> -->
         <?php
         foreach( $dishes as $dish ) {

            echo "
            
            <li> {$dish['nazwa']} </li>
            ";
         }
         ?>
    </ol>

    <ul>
        <li> [imię] [nazwisko]</li>
    </ul>
</body>
</html>

<?php
    $link->close();
?>