CREATE DATABASE biblioteka2;
use biblioteka2;

SELECT imie, nazwisko
FROM czytelnicy
ORDER BY nazwisko;

SELECT tytul 
FROM ksiazki
JOIN kategoria ON ksiazki.id.kategoria = kategoria.id
WHERE nazwa = 'dramat';

SELECT tytul
FROM ksiazki
 INNER JOIN wypozyczenia ON ksiazki.id = wypozyczenia.id_ksiazka
WHERE id_czytelnik = 2;