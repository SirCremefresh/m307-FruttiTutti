# m307-FruttiTutti Gruppe 14
## 1 Inhaltsverzeichnis
* [2 Projekt Informationen](#Informationen) 
* [3 Konzeptionierung](#Konzeptionierung)  
  * [3.1 Formulare](#Formulare)  
    * [3.1.1 Mockup](#Mockup)  
    * [3.1.2 Formularfelder](#Formularfelder)  
    * [3.1.3 Validierung](#Validierung)  
  * [3.2 Datenbank](#Datenbank) 
    * [3.2.1 Table fruit](#fruit) 
    * [3.2.2 Table quantityCategory](#quantityCategory) 
    * [3.2.3 Table parchOrder](#parchOrder) 
  * [3.3 Testfälle](#Testfälle)  
  * [3.4 Roadmap](#Roadmap)  
* [4 Testbericht](#Testbericht)  
* [5 REST-API](#rest-api)

<a name="Informationen"/>

# 2 Projekt Informationen
## 2.1 Teammitglieder
Gian Ott   
Donato Wolfisberg   

## 2.2 Projektstart   
21.03.2018   

## 2.3 Projektende    
28.03.2018   

<a name="Konzeptionierung"/>

# 3 Konzeptionierung
Die Firma TuttiFrutti möchte die Verwaltung von Dörraufträgen mit einem Webtool vereinfachen. Dabei sollen alle noch nicht fertig verarbeiteten Dörraufträge angezeigt werden. In den Eingabefenstern können neue Aufträge erfasst, und die Daten bereits erfasster Aufträge bearbeitet werden. 

<a name="Formulare"/>

## 3.1 Formulare

<a name="Mockup"/>

### 3.1.1 Mockup
#### 3.1.1.1 Dörr-Aufträge anzeigen
Die Anzeige Seite ist die Hauptseite. Hier werden alle Dörrauftröge angezeigt, welche noch nicht abgeschlossen sind. Wird auf "Dörrauftrag erfassen" geklickt, wird ein Eingabefenster geöffnet (Siehe Dörraufträge erfassen). In der Tabelle stehen einige Informationen zum Dörrauftrag sowie dem Kunden. Der Status enthält entweder einen roten Apfel 🍎, um einen Frucht innerhalb der Frist, oder eine braune, verdorbene Frucht 🥔, um eine Frucht ausserhalb der Frist, zu kennzeichnen. Jeder offene Dörrauftrag kann mit einem klick auf "Auftrag bearbeiten" verändert werden, indem ein Eingabefenster geöffnet wird (Siehe Dörraufträge bearbeiten). 

![Dörr-Aufträge Anzeigen](/images/anzeigen.jpg)

#### 3.1.1.2 Dörr-Aufträge erfassen
Das Eingabefenster wird in der Dörraufträgeanzeige geöffnet. Es müssen alle Felder bis auf die Telefonnummer erfasst werden. Mit "Auftrag erstellen" werden die Daten in der Datenbank erfasst, mit "Auftrag abbrechen" wird nichts erfasst und das Eingabefenster schliesst sich.

![Dörr-Aufträge Erfassen](/images/erfassen.jpg)

#### 3.1.1.3 Dörr-Aufträge bearbeiten
Das Eingabefenster wird in der Dörraufträgeanzeige geöffnet. Es können alle Felder bearbeitet werden, aber erst durch "Änderungen speichern" werden die Daten in der Datenbank verändert.

![Dörr-Aufträge Bearbeiten](/images/bearbeiten.png)

<a name="Formularfelder"/>

### 3.1.2 Formularfelder
* Vorname (forename), enthält Vorname des Bestellers als Text
* Nachname (lastname), enthält Nachname des Bestellers als Text
* Email (email), enthält die Email des Bestellers als Text
* Telefon (phone), enthält die Telefonnummer des Bestellers als Text
* Frucht (fruit name), enthält die ausgewählte Frucht als Text
* Menge (quantityCategory description), enthält die ausgewählte Menge als Text
* Status (isDone), enthält den Status der Bestellung als Boolean
  
<a name="Validierung"/>

### 3.1.3 Validierung
* Vorname: nicht leer, nur Buchstaben
* Nachname: nicht leer, nur Buchstaben
* Email: nicht leer, text(min. 1 lang) + @ + text(min. 1 lang) + . + text(min. 2 lang)
* Telefon: nur Ziffern 0-9, am Anfang ein + erlaubt
* Frucht: nicht leer, keine sonstige Validierung nötig da Auswahl
* Menge: nicht leer, keine sonstige Validierung nötig da Auswahl
* Status: keine Validierung nötig da Checkbox

<a name="Datenbank"/>

## 3.2 Datenbank FruttiTutti

<a name="fruit"/>

###  3.2.1 Table fruit
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| fruitId 🔑             | int(11)        | True      | True          | True            |
| name                   | varchar(255)   | True      | False         | False           |

<a name="quantityCategory"/>

### 3.2.2 Table quantityCategory
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| quantityCategoryId 🔑  | int(11)        | True      | True          | True            |
| description            | varchar(255)   | True      | False         | False           |
| additionalDays         | varchar(255)   | True      | False         | False           |
| totalDays              | varchar(255)   | True      | False         | False           |

<a name="parchOrder"/>

### 3.2.3 Table parchOrder
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

<a name="Testfälle"/>

## 3.3 Testfälle

```
GEGEBEN SEI   Ich bin auf der Ansichtsseite
WENN          nicht abgeschlossene Dörraufträge in der Datenbank erfasst sind
DANN          werden diese in einer Tabelle aufgelistet.
```

```
GEGEBEN SEI   Ich bin auf der Ansichtsseite
WENN          der Dörrauftrag noch nicht abgeschlossen ist und das Enddatum des Auftrages überschritten ist
DANN          wird bei der Frucht das Icon zu verdorben gewechselt.
```

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

```
GEGEBEN SEI   Ich bearbeite oder erstelle einen Dörrauftrag
WENN          ich keinen Vornamen oder Nachnamen angebe, oder er andere Zeichen als Buchstaben enthält 
DANN          wird mir die entsprechende Fehlermeldung zurückgemeldet.
```

```
GEGEBEN SEI   Ich bearbeite oder erstelle einen Dörrauftrag
WENN          ich keine Email Adresse angebe, oder dieser ein @ oder ein danach . fehlt
DANN          wird mir die entsprechende Fehlermeldung zurückgemeldet.
```

```
GEGEBEN SEI   Ich bearbeite oder erstelle einen Dörrauftrag
WENN          ich in der Telefonnummer andere Zeichen als Zahlen und Leerschläge verwende, jedoch darf ein + am Anfang stehen
DANN          wird mir die entsprechende Fehlermeldung zurückgemeldet.
```

```
GEGEBEN SEI   Ich bearbeite oder erstelle einen Dörrauftrag
WENN          ich keine Frucht oder keine Menge auswähle
DANN          wird mir die entsprechende Fehlermeldung zurückgemeldet.
```

<a name="Roadmap"/>

## 3.4 Roadmap

![Trello Screenshot](/images/trello.png)

<a name="Testbericht"/>

# 4 Testbericht
## 4.1

<a name="rest-api"/>

# 5 REST-API
| METHOD   | PATH                 | RESPONSE            | REQUEST BODY |
| -------- | ---------------------| ------------------- | ------------ |
| GET      | /fruit               | Fruit[]             | NONE         |
| GET      | /quantitycategory    | Quantitycategory[]  | NONE         |
| GET      | /parchorder/notdone  | Parchorder[]        | NONE         |
| POST     | /parchorder          | Parchorder          | Parchorder   |
| PUT      | /parchorder/{id}     | Parchorder          | Parchorder   |

