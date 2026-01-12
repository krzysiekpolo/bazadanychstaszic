SELECT Tytul
FROM filmy
WHERE Gatunek = 'SF';

SELECT tytul, nazwisko
FROM filmy JOIN rezyserzy ON filmy.RezyserID = rezyserzy.IDRezyser;

SELECT tytul, ocena
FROM filmy JOIN recenzje ON filmy.RecenzjaID = recenzje.idrecenzja
WHERE ocena = '4';