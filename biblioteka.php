<?php
$link = new mysqli('localhost','root','','biblioteka2');
    $sql = "SELECT imie, nazwisko
        FROM czytelnicy
        ORDER BY nazwisko;";
    $result = $link -> query($sql);
    $readers = $result -> fetch_all(1);

    $sql = "SELECT tytul 
            FROM ksiazki
            JOIN kategoria ON ksiazki.id.kategoria = kategoria.id
            WHERE nazwa = 'dramat';";
    $result = $link -> query($sql);
    $titles = $result -> fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Czytelnicy</h2>
    <!-- <p>[imie] <strong>[nazwisko]</strong></p> -->
    <?php
    foreach($readers as $reader){
        echo "<p> {$reader['imie']} <strong> {$reader['nazwisko']}</strong></p>";
    }
    ?>

    <h2>tytuły dramatów</h2>
    <ul>
       <!-- <li>['tytul']</li> -->
        <?php
        foreach($titles as $title)
            echo "<li>{$title['tytul']}</li>";
        ?>
    </ul>
</body>
</html>
<?php
    $link -> close();
?>