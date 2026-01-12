<!DOCTYPE html>
<?php $link = new mysqli('localhost','root','','kadry');
$sql = "SELECT pensja, COUNT(*) AS ilosc
FROM pracownicy
GROUP BY pensja
ORDER BY pensja DESC";
$result = $link -> query($sql);
$kadry = $result -> fetch_all(1);

$sql = "SELECT imie, nazwisko, nazwa
FROM pracownicy
INNER JOIN stanowiska on pracownicy.stanowiska_id = stanowiska.id
WHERE staz > 10";
$result = $link -> query($sql);
$kadry2 = $result -> fetch_all(1);

$sql = "SELECT ROUND(AVG(pensja),2) AS srednia_pensja, nazwa
FROM pracownicy
    INNER JOIN stanowiska ON pracownicy.stanowiska_id = stanowiska.id
GROUP BY stanowiska.id";
$result = $link -> query($sql);
$kadry3 = $result -> fetch_all(1);
?>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styluś.css">
</head>
<body>
    <h2>Statystki dotyczące pencji</h2>
    <table>
        <th>Pensja</th>
        <th>Ilość Pracowników</th>        <?php foreach ($kadry as $kadra): ?>
    <tr>
        <td><?= $kadra['pensja'] ?></td>
        <td><?= $kadra['ilosc'] ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <h1>Pracownicy ze stażem wyższym niż 10 lat</h1>
<table>
    <th>Imię</th>
      <th>Nazwisko</th>
        <th>Stanowisko</th>
    <?php foreach ($kadry2 as $kadra2) : ?>
        <tr>
            <td><?= $kadra2['imie'] ?></td>
            <td><?= $kadra2['nazwisko'] ?></td>
            <td><?= $kadra2['nazwa'] ?></td>
            
        </tr>
        <?php endforeach; ?>
</table>

    <hr>

    <div class="statistic">
    <?php foreach ($kadry3 as $kadra3){
        echo"
         <h3>{$kadra3['nazwa']}</h3>
    <p>Średnia pensja na stanowisku {$kadra3['nazwa']} wynosi: {$kadra3['srednia_pensja']} złotych</p>
        ";
    } ?></div>

</body>
</html>