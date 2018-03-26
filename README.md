# m307-FruttiTutti Gruppe 14
## Inhaltsverzeichnis
* [Konzeptionierung](#Konzeptionierung)  
  * [Formulare](#Formulare)  

## Projekt Informationen
### Teammitglieder
Gian Ott   
Donato Wolfisberg   

### Projektstart   
21.03.2018   

### Projektende    
28.03.2018   

<a name="Konzeptionierung"/>
# Konzeptionierung
Die Firma TuttiFrutti möchte die Verwaltung von Dörraufträgen mit einem Webtool vereinfachen. Dabei sollen alle noch nicht fertig verarbeiteten Dörraufträge angezeigt werden. In den Eingabefenstern können neue Aufträge erfasst, und die Daten bereits erfasster Aufträge bearbeitet werden. 

<a name="Formulare"/>
## Formulare
<a name="Formulare"/>
### Mockup
#### Dörr-Aufträge anzeigen
Die Anzeige Seite ist die Hauptseite. Hier werden alle Dörrauftröge angezeigt, welche noch nicht abgeschlossen sind. Wird auf "Dörrauftrag erfassen" geklickt, wird ein Eingabefenster geöffnet (Siehe Dörraufträge erfassen). In der Tabelle stehen einige Informationen zum Dörrauftrag sowie dem Kunden. Der Status enthält entweder einen roten Apfel 🍎, um einen Frucht innerhalb der Frist, oder eine braune, verdorbene Frucht 🥔, um eine Frucht ausserhalb der Frist, zu kennzeichnen. Jeder offene Dörrauftrag kann mit einem klick auf "Auftrag bearbeiten" verändert werden, indem ein Eingabefenster geöffnet wird (Siehe Dörraufträge bearbeiten). 

![Dörr-Aufträge Anzeigen](/images/anzeigen.jpg)

#### Dörr-Aufträge erfassen
Das Eingabefenster wird in der Dörraufträgeanzeige geöffnet. Es müssen alle Felder bis auf die Telefonnummer erfasst werden. Mit "Auftrag erstellen" werden die Daten in der Datenbank erfasst, mit "Auftrag abbrechen" wird nichts erfasst und das Eingabefenster schliesst sich.

![Dörr-Aufträge Erfassen](/images/erfassen.jpg)

#### Dörr-Aufträge bearbeiten
Das Eingabefenster wird in der Dörraufträgeanzeige geöffnet. Es können alle Felder bearbeitet werden, aber erst durch "Änderungen speichern" werden die Daten in der Datenbank verändert.

![Dörr-Aufträge Bearbeiten](/images/bearbeiten.jpg)

<a name="Formulare"/>
### Formularfelder
* Vorname (forename), enthält Vorname des Bestellers als Text
* Nachname (lastname), enthält Nachname des Bestellers als Text
* Email (email), enthält die Email des Bestellers als Text
* Telefon (phone), enthält die Telefonnummer des Bestellers als Text
* Frucht (fruit name), enthält die ausgewählte Frucht als Text
* Menge (quantityCategory description), enthält die ausgewählte Menge als Text
* Status (isDone), enthält den Status der Bestellung als Boolean
  
<a name="Formulare"/>
### Validierung
* Vorname: nicht leer, nur Buchstaben
* Nachname: nicht leer, nur Buchstaben
* Email: nicht leer, text(min. 1 lang) + @ + text(min. 1 lang) + . + text(min. 2 lang)
* Telefon: nur Ziffern 0-9, am Anfang ein + erlaubt
* Frucht: nicht leer, keine sonstige Validierung nötig da Auswahl
* Menge: nicht leer, keine sonstige Validierung nötig da Auswahl
* Status: keine Validierung nötig da Checkbox

<a name="Formulare"/>
## Datenbank FruttiTutti
### Table fruit
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| fruitId 🔑             | int(11)        | True      | True          | True            |
| name                   | varchar(255)   | True      | False         | False           |


### Table quantityCategory
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| quantityCategoryId 🔑  | int(11)        | True      | True          | True            |
| description            | varchar(255)   | True      | False         | False           |
| additionalDays         | varchar(255)   | True      | False         | False           |
| totalDays              | varchar(255)   | True      | False         | False           |

### Table parchOrder
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| parchOrderId 🔑        | int(11)        | True      | True          | True            |
| forename               | varchar(255)   | True      | False         | False           |
| lastname               | varchar(255)   | True      | False         | False           |
| email                  | varchar(255)   | True      | False         | False           |
| phone                  | varchar(255)   | False     | False         | False           |
| orderDate              | timeStamp      | False     | False         | False           |
| isDone                 | tinyInt(1)     | False     | False         | False           |
| fruit_fk 🗝            | varchar(255)   | True      | False         | False           |
| quantityCategory_fk 🗝 | varchar(255)   | True      | False         | False           |

<a name="Formulare"/>
## Testfälle
```
GEGEBEN SEI   Ich bin auf der Ansichtsseite
WENN          ich einen Dörrauftrag erstelle möchte ("Dörrauftrag erfassen")
DANN          öffnet sich ein Eingabefenster um einen Benutzer zu efassen.
```

```
GEGEBEN SEI   Ich erfasse gerade einen neuen Dörrauftrag
WENN          ich die Angaben gemacht habe
DANN          können diese in der Datenbank gespeichert ("Auftrag erstellen") oder der Vorgang abgebrochen werden.
```

```
GEGEBEN SEI   Ich bin auf der Ansichtsseite
WENN          ich möchte einen Dörrauftrag bearbeiten ("Auftrag bearbeiten")
DANN          öffnet sich ein Eingabefenster um den ausgewählten Auftrag zu bearbeiten.
```

```
GEGEBEN SEI   Ich bearbeite gerade einen Dörrauftrag
WENN          ich fertig mit der Bearbeitung bin
DANN          können die Daten in der Datenbank gespeichert ("Änderungen speichern") oder der Vorgang abgebrochen werden.
```

<a name="Formulare"/>
## Roadmap
### MO 26.03.2018

### MI 28.03.2018

<a name="Formulare"/>
# Testbericht

