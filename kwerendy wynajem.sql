SELECT * 
FROM pokoje;

SELECT id_pok, nazwa, sezon
FROM pokoje
    INNER JOIN rezerwacje ON pokoje.id = rezerwacje.id_pok
WHERE liczba_dn >= 7;

SELECT sezon, SUM(liczba_dn) AS razem_rezerwacji
FROM rezerwacje
GROUP BY sezon;