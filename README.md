#IBB PHP, Basics

Link: https://www.ibb.com/weiterbildung/php-basics

PHP ist eine serverseitige Skriptsprache mit einer an C und Perl angelehnten Syntax, die 
hauptsächlich zur Erstellung dynamischer Webseiten oder Webanwendungen verwendet wird. 
Lernen Sie mit Ihren HTML-Kenntnissen die Sprachelemente und die Möglichkeiten der Programmablaufsteuerung 
kennen und erstellen Sie Ihre ersten interaktiven Webseiten.

## Inhalt der Weiterbildung

- Konzepte von PHP
- Die Rolle von PHP in der Internetprogrammierung
- Sprachelemente von PHP
- PHP und HTML
- Ein- und Ausgabe
- Operatoren
- Programmablaufsteuerung
- Funktionen
- Sessions
- Arrays
- PHP und MySQL

### PHP

- Umgebungsvariablen GET, POST, SESSION
- ARRAYS (indiziert, assoziativ)
- Empfang/Verwaltung Upload Bild
- Anlage Javascript Array/PHP Array in Ausgabedokument
- Erstellung eines Demo-Eingabeformulars

### MySQL

- Definitionen einer Datenbank
- phpmyadmin für Datenverwaltung
- einfache SQL-Abfragen für Datenbank
- Umgebungsvariablen auslesen und in Datenbank ablegen

### Vorbereitung für die Datenerfassung

- Formular mit Upload-Möglichkeiten
- Photoshop-Bildaufbereitung für Slideshow
- html-Gerüst für „alle Gruppenmitglieder“ erstellen
- Datenbank: Einrichtung von Tabellen

### Ausgabemodul

- Auslesen der Daten mit SQL
- Empfang der Daten in Ajax-Modul
- html-Ausgabe
- Projektgestaltung und Präsentation des CMS

## 1. Installieren von Docker und Docker Compose

Siehe hierzu: https://github.com/knackw/docker_nginx_php8_mariadb10_phpmyadmin410

## 2. Installation der HTML Entwicklungsumgebung

**a) Webserver erzeugen**

Quellangaben:

PHP's development with Docker the easy way: https://stefan-poeltl.medium.com/php-development-with-docker-the-easy-way-13621ec5d39b

Mit dem unten angegeben Terminal Kommando wird Entwicklungsumgebung generiert 
und anschließen der Service (Server) gestartet. Du musst Dich im Verzeichnis des Projektes befinden, 
indem sich die Datei docker-compose.yml befindet.

`docker-compose up`

Sollte ein Fehler aufgetreten sein und am Setup Anpassungen vorgenommen haben musst Du folgenden Befehl ausführen.

`docker-compose up --build`

Zum Beenden des Services gibst du

`docker-compose down`

ein.

**b) Tabelle anlegen**

Um die Tabelle zu erzeugen muss das Script `tables_creator.php` im Verzeichnis `./www/public/connection/` ausgeführt werden.

## 5. Linksammlung

W3Schools

https://www.w3schools.com

PHP

https://www.php.de/
https://www.php.net/

## 4. Schlussbemerkung

Solltest Du Fehler entdecken, Vorschläge oder Anregungen haben scheu Dich nicht mir ein Ticket zu schreiben. 

Happy coding :)





