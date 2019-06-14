# Marcin Test
Zadanie testowe zostało rozwiązane i przedstawione w formie aplikacji opartej o wzorzec projektowy MVC, napisany od podstaw, specjalnie na potrzeby realizacji w/w zadania.

## Przed uruchomieniem programu należy:

1. Uzupełnić plik konfiguracyjny config.php

	* Uwaga - Stała **SERVER_DIRECTORY** - to katalog, gdzie umieszczono aplikację na serwerze. 
W przypadku, gdy aplikacja znajduje się w katalogu **test**, należy przypisać wartość **'/test/'**. W przypadku braku katalogu, wartość to **'/'**.

2. Uruchomić composer.

## Informacje:
 W przypadku braku przykładowych tabel w bazie danych (podanych w treści zadania), nastąpi stworzenie ich przez aplikację.

 Program posiada system tłumaczeń, gdzie istnieje możliwość dodania własnych interpretacji (standardowe tłumaczenia są w języku angielskim).
 Analogiczna sytuacja dotyczy logów, gdzie oprócz podstawowego loggera można dodać własny.  
Wybór nowych rozszerzeń obsługuje plik konfiguracyjny.

Front obsługują biblioteki takie jak Bootstrap, jQuery i DataTables.  
Aplikacja jest otwartana na rozszerzenia.  Można również napisać do niej testy (PHPUnit).

## Menu programu:
* Home - przedstawia **'Listing 1.'** z treści zadania w formie DataTables. 
* Add Trip - możliwość dodania własnych parametrów w celu dokonania późniejszych obliczeń (pomiary GPS są generowane losowo).
* Calculate - forma DataTables, gdzie:  
    * Przycisk **'Calculate'** - oblicza maksymalną średnią prędkość na godzinę dla wybranej trasy.  
	Pod tabelą przedstawione zostają szczegóły dotyczące wykonywanych obliczeń (parametry) oraz wynik. 
    * Przycisk **'Delete'** -  usuwa wybraną podróż (rekordy) z bazy danych. 


## Wygląd programu: 
* Home:  


![Home](https://user-images.githubusercontent.com/48167156/59503738-7bd5d180-8ea1-11e9-918d-3e69070d6d0c.jpg)

* Add Trip:


![AddTrip](https://user-images.githubusercontent.com/48167156/59503804-a32c9e80-8ea1-11e9-800e-07d4f268d9b8.jpg)

* Calculate Trip:


![CalculateTrip](https://user-images.githubusercontent.com/48167156/59503811-a889e900-8ea1-11e9-8eea-a1ea0998b7c6.jpg)

* Calculate Trip - obliczenia:


![CalculateTrip2](https://user-images.githubusercontent.com/48167156/59503817-ac1d7000-8ea1-11e9-921d-3a9275e18444.jpg)
