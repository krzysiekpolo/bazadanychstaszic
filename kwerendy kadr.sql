-- ‒ Zapytanie 1: wybierające jedynie liczbę wierszy i pensję grupując pracowników według pensji i sortując  dane malejąco ze względu na pensję. W wyniku zapytania są wyświetlane poszczególne pensje oraz liczba osób, które pobierają taką pensję. Alias dla pola z liczbą osób: ilosc
SELECT pensja, COUNT(*) AS ilosc
FROM pracownicy
GROUP BY pensja
ORDER BY pensja DESC;
-- ‒ Zapytanie 2: wybierające jedynie imiona i nazwiska pracowników oraz odpowiadające im nazwy stanowisk dla pracowników o stażu wyższym niż 10 lat. Należy posłużyć się relacją
SELECT imie, nazwisko, nazwa
FROM pracownicy
INNER JOIN stanowiska on pracownicy.stanowiska_id = stanowiska.id
WHERE staz > 10;

-- ‒ Zapytanie 3: liczące średnią pensję pracowników ze względu na rodzaj stanowiska. Zapytanie pokazuje średnią pensję na danym stanowisku i nazwę stanowiska. Należy posłużyć się
-- relacją. Średnia pensja powinna być zaokrąglona do dwóch miejsc po przecinku i mieć alias srednia_pensja
SELECT ROUND(AVG(pensja),2) AS srednia_pensja, nazwa
FROM pracownicy
    INNER JOIN stanowiska ON pracownicy.stanowiska_id = stanowiska.id
GROUP BY stanowiska.id;