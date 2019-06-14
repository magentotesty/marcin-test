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
    * Przycisk **'Delete'** -  usuwama wybraną podróż (rekordy) z bazy danych. 
