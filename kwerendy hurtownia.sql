-- ‒ Zapytanie 1: wybierające z tabeli Klienci posortowane malejąco według punktów jedynie imię, nazwisko i punkty trzech klientów, których liczba punktów jest najwyższa
SELECT imie, nazwisko, punkty
FROM klienci
ORDER BY punkty DESC
LIMIT 3;

-- ‒ Zapytanie 2: wybierające nazwę z tabeli Typy oraz liczbę klientów przypisanych do każdego typu. Należy posłużyć się relacją
SELECT nazwa, COUNT(klienci.id) AS liczba_klientow
FROM typy 
    INNER JOIN klienci ON typy.id = klienci.Typy_id
GROUP BY nazwa;
-- ‒ Zapytanie 3: wybierające jedynie pola zdjecie, imie z tabeli Klienci oraz odpowiadające im pole opinia z tabeli opinie dla klientów, których typ ma id o wartościach 2, 3. Należy posłużyć się relacją
SELECT zdjecie, imie, opinie.opinia
FROM klienci
    INNER JOIN opinie on klienci.id = opinie.Klienci_id
    INNER JOIN typy ON klienci.Typy_id = typy.id
WHERE typy.id = 2 OR typy.id = 3;
-- ‒ Zapytanie 4: dodające do tabeli Klienci kolumnę o nazwie adres i typie napisowym, maksymalnie 50-znakowym
ALTER TABLE klienci
ADD adres VARCHAR(50) NOT NULL;