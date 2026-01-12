<?php
    $link = new mysqli('localhost','root','','filmoteka');
    $sql = "SELECT tytul
            FROM filmy
            WHERE gatunek = 'SF'";
    $result = $link -> query($sql);
    $titles = $result -> fetch_all(1);

    $sql = "SELECT tytul, nazwisko
            FROM filmy JOIN rezyserzy ON filmy.RezyserID = rezyserzy.IDRezyser;"
    $result = $link -> query($sql);
    $movies = $result -> fetch_all(1);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>filmoteka</h1>
    <h2>tytulu sf</h2>
    <ol>
       <!-- <li>[tytul]</li> -->
        <?php
        foreach($titles as $title){
            echo "<li>  {$title['tytul']}  </li>";
        }
        ?>
</ol>
<h2>Tytuły</h2>
<ul>
    <li><b>tytul</b></li>
</ul>
</body>
</html>
<?php
    $link -> close()
?>