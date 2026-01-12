<?php
    $link = new mysqli('localhost','root','','wynajem');
    $sql = "SELECT * 
            FROM pokoje
    ";
    $result = $link -> query($sql);
    $rooms = $result -> fetch_all(1);

    $sql = "
    SELECT id_pok, nazwa, sezon
FROM pokoje
    INNER JOIN rezerwacje ON pokoje.id = rezerwacje.id_pok
WHERE liczba_dn >= 7";

    $result = $link -> query($sql);
    $rooms2 = $result -> fetch_all(1);

    $sql = "SELECT sezon, SUM(liczba_dn) AS razem_rezerwacji
FROM rezerwacje
GROUP BY sezon;";

    $result = $link -> query($sql);
    $rooms3 = $result -> fetch_all(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>nazwa</th>
            <th>cena</th>
        </tr>

      <!-- <tr>
            <td>['id']</td>
            <td>['nazwa']</td>
            <td>['cena']</td>
        </tr>  -->

        <?php
        foreach($rooms AS $room){
            echo"
           
                <tr>
                        <td>{$room['id']}</td>
                        <td>{$room['nazwa']}</td>
                        <td>{$room['cena']}</td>
                    </tr> 
                ";
        }
  ?>
    </table>
  
    <h2>Rezerwacje</h2>
    <ul> 
        <li>
            <!-- <li>[id_pok]<strong>[nazwa]</strong><em>[sezon]</em></li> -->

            <?php
            foreach($rooms2 as $room2){
                echo "
                <li> {$room2['id_pok']} <strong>{$room2['nazwa']}</strong> <em>{$room2['sezon']}</em> </li>
                ";
            }
            ?>
   </li>
</ul>


<h2>Suma dni Rezerwacji</h2>

<!-- <h4>sezon</h4>
<p>suma dni rezerwacji dla sezonu [sezon] wynosi [razem_rezerwacji]</p> -->

<?php
foreach($rooms3 as $room3){
    echo "<h4>sezon</h4>
<p>suma dni rezerwacji dla sezonu {$room3['sezon']} wynosi {$room3['razem_rezerwacji']}</p>";

}
?>
</body>
</html>