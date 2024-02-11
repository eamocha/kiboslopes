<?php
/*
= LuxCal event calendar on-line user guide =

Oversat til dansk af Lars J. Helbo. Kommentarer, forbedringsforslag osv. til 
lars(at)salldata.dk

© Copyright 2009-2012 LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

The LuxCal Web Calendar is free software: you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software Foundation, 
either version 3 of the License, or (at your option) any later version.

The LuxCal Web Calendar is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with the LuxCal 
Web Calendar. If not, see <http://www.gnu.org/licenses/>.
*/

//LuxCal ug language file version
define("LUG","2.7.2");

?>
<div  class="floatR">
<img src="../../calende/lang/lang/ug-layout.png" alt="LuxCal page layout"/><br>
a: titelbjælk&nbsp;&nbsp;b: navigationsbjælk&nbsp;&nbsp;c: kalender&nbsp;&nbsp;d: dag
</div>
<br>
<div  style="margin:0 20px">
<h4>Indholdsfortegnelse</h4>
<ol>
<li><p><a href="#ov">Oversigt</a></p></li>
<li><p><a href="#li">Logge på</a></p></li>
<li><p><a href="#ae">Tilføje begivenhed</a></p></li>
<li><p><a href="#ee">Editere / slette begivenhed</a></p></li>
<li><p><a href="#co">Kalender options</a></p></li>
<li><p><a href="#cv">Kalendertyper</a></p></li>
<li><p><a href="#ts">Text Search</a></p></li>
<li><p><a href="#lo">Logge af</a></p></li>
<li><p><a href="#ca">Kalender administration</a></p></li>
<li><p><a href="#al">About LuxCal</a></p></li>
</ol>
</div>
<div class="help">
<br>
<ol>
<li id="ov"><h4>Oversigt</h4>
<p>LuxCal kalenderen kører på en webserver og kan ses og administreres via din webbrowser.</p>
<p>Titelbjælken viser kalenderens titel, datoen og navnet på den aktuelle bruger.
Lige under titelbjælken findes navigationsbjælken med flere drop-down menuer og links til at navigere med, til at logge på og af, tilføje en begivenhed og vælge administratorfunktioner. Hvilke menuer og links, der vises, afhænger af brugerens rettigheder.
Under navigationsbjælken vises de forskellige kalendertyper</p>
<br></li>
<li id="li"><h4>Logge på</h4>
<p>For at bruge kalenderen log på i højre side af navigationsbjælken. Dermed kommer du til login-skærmen. Indtast dit brugernavn eller din email-adresse (en af de to) og det password, som du fik fra administratoren og klok så på Log ind. If you select "Remember me" before clicking Log In, next times you launch the calendar you will be automatically logged in. Hvis du har glemt dit password, klik på Log ind og derefter på linket for at få tilsendt et nyt password.</p>
<p>Du kan ændre din email-adresse og dit password ved at indtaste dit brugernavn/email og aktuelle password samt en ny email-adresse og et nyt password.</p>
<p>Hvis kalender-administratoren har givet offentlig adgang til kalenderen, kan kalenderen ses uden at logge på.</p>
<br></li>
<li id="ae"><h4>Tilføj begivenhed</h4>
<p>Begivenheder kan tilføjes på flere forskellige måder:</p>
<ul style="margin:0 20px">
<li><p>ved at klikke på knappen Tilføj begivenhed i navigationsbjælken</p></li>
<li><p>ved at klikke øverst i cellen for en dag på en års- eller månedskalender</p></li>
<li><p>ved at trække hen over en del af en dag i en uge- eller dagskalender</p></li>
</ul>
<p>Hver metode vil fremkalde vinduet Begivenhed med en formular, hvor informationer om begivenheden indtastes. Nogle felter i formularen er allerede udfyldte, alt efter, hvilken af ovenstående metoder, der blev brugt.</p>
<p>I øverste del af formularen indtastes titel, sted, kategori og en beskrivelse, og muligheden Privat kan vælges. Titlen bør være kort og detaljerne placeres under beskrivelse. Felterne sted og kategori er frivillige. Hvis der vælges en kategori, får begivenheden en farvekode i alle kalendere alt efter kategorifarven. Stedet og beskrivelsen vises, når musen føres hen over begivenheden  kalenderen. En privat begivenhed er kun synlig for dig selv og ikke for andre.</p>
<p>Internet-adresser tilføjet i begivenhedsbeskrivelsen, i formatet [ url | navn ] (for eksempel [www.mysite.com | mit navn]), omdannes automatisk til links, som kan vælges i månedsvisning, kommende begivenheder og annoncerings-emails.</p>
<p>I anden halvdel af formularen kan datoer og tidspunkter angives. Hvis Hele dagen vælges, vises ingen tidspunkter i kalendrene. Sidste dato er frivillig og kan bruges til begivenheder, der går over flere dage. Datoer og tider kan indtastes manuelt eller via dato- og tidsvalgsknapperne. Following the date and time fields, events can be defined as recurring via a separate dialogue box, which opens when clicking the Change button. I så fald gentages begivenheden som angivet fra startdatoen til slutdatoen. Hvis der ikke anføres nogen slutdato, gentages begivenheden evigt, hvilket er særlig praktisk til fødselsdage.</p>
<p>I den nederste del af formularen, med alarm-funktionen, kan du vælge at sende en email-påmindelse til en eller flere email-adresser directly, if the 'now' checkbox is selected, and/or et antal dage før selve datoen for begivenheden. Derudover sendes en email på selve dagen for begivenheden. For begivenheder, der gentages sendes en email det valgte antal dage før hver gang begivenheden gentages og på selve datoen for hver gentagelse.</p>
<p>Når alt er udfyldt, tryk på Tilføj begivenhed.</p>
<br></li>
<li><a id="ee"></a><h4>Editere / slette begivenhed</h4>
<p>I hver kalendertype, kan du klikke på en begivenhed for at se, editere eller slette den. Dermed åbnes vinduet Editer begivenhed, der ser ud som vinduet Tilføj begivenhed beskrevet herover, bortset fra titlen og knapperne nederst i vinduet.</p>
<p>Alt efter dine rettigheder, kan du se begivenheder, se/editere/slette dine egne begivenheder eller se/editere/slette alle begivenheder, herunder andre brugeres begivenheder.</p>
<p>For en beskrivelse af felterne se under Tilføj begivenhed herover. Bemærk at et klik på Slet begivenhed straks sletter begivenheden fra kalenderen, <strong>uden at spørge om bekræftelse</strong>.</p>
<p>Sletning af en begivenhed, der gentages sletter alle forekomster af begivenheden, ikke bare den valgte dato.</p>
<p>If the "Don't close this window" checkbox is checked, the Event window will not close when pressing Add Event. In this case three new buttons will appear at the bottom of the window, to update the added event, to delete the added event, or to re-use the current event data to create an other new event, for instance to duplicate the event on an other date.</p>
<br></li>
<li id="co"><h4>Kalender Options</h4>
<p>Clicking the Options button on the navigation bar will open the calendar's Options Panel. On this panel you can select the following via check boxes:</p>
<ul style="margin:0 20px">
<li><p>The calendar view (year, month, week, day, upcoming or changes).</p></li>
<li><p>An event filter based on event owners. Events of one single owner or multiple owners can be selected.</p></li>
<li><p>An event filter based on event categories. Events in one single category or multiple categories can be selected.</p></li>
<li><p>The user interface language.</p></li>
</ul>
<p>Note: The display of the event filter menus and the language menu can be enabled/disabled by the calendar administrator.</p>
<p>After having made your choices in the Options Panel, the Options button in the navigation bar should be clicked again to activate your choices.</p> 
<br></li>
<li id="cv"><h4>Kalendertyper</h4>
<p>I alle typer vil flere detaljer om en begivenhed poppe op, når musen bevæges over den. For private events the background color of the pop up box will be ligh green. I typen kommende, vil URLs i beskrivelsesfeltet automatisk blive omdannet til links til den tilhørende webside.</p>
<p>Events in a category for which the admin has activated one or two check boxes will have one or two check boxes displayed in front of the event title, which can be used to flag events for example as "approved" or "completed". When having sufficient rights, these check boxes can be clicked to check/uncheck them.</p>
<p>Hvis du har tilstrækkelige rettigheder:</p>
<ul style="margin:0 20px">
<li><p>I alle typer, når du klikker på en begivenhed, åbnes vinduet editer for denne begivenhed, hvor du så kan se, editere og slette begivenheden.</p></li>
<li><p>I typerne måned og år kan en ny begivenhed tilføjes for en bestemt dato ved at klikke øverst i cellen for dagen (linien hvor datoen vises).</p></li>
<li><p>I typerne uge og dag, kan et tilføj-vindue åbnes ved at trække cursoren hen over en del af adgen; felterne dato og tid fyldes automatisk med den valgte periode.</p></li>
</ul>
<p>I typerne forandringer, en startdato kan specificeres. En liste med alle begivenheder tilføjes, redigeres eller slettes, da den angivne startdato vises</p>
<p>For at flytte en begivenhed til en ny dato eller tid, luk Editer-vinduet op ved at klikke på begivenheden og lav så om på dato og tid. Begivenheder kan ikke trækkes til nye dage eller tider.</p>
<br></li>
<li id="ts"><h4>Text Search</h4>
<p>When clicking the button with the triangle on the right side in the navigation bar, the Text Search page will open. On this page the text search can be defined. The Text Search page contains detailed instructions.</p>
<br></li>
<li id="lo"><h4>Logge ud</h4>
<p>For at logge ud, klik på Log ud i navigationsbjælken. Hvis du lukker kalenderen uden at logge ud, kan det ske, at du ikke bliver bedt om at logg på næste gang kalenderen åbnes.</p>
<br></li>
<li id="ca"><h4>Kalenderadministration</h4>
<p>- de følgende funktioner kræver administratorrettigheder -</p>
<p>Når en bruger logger ind med administratorrettigheder, vises en drop-down-menu kaldet Administration i højre side af navigationsbjælken. Med denne menu er følgende funktioner tilgængelige:</p>
<br>
<h5>a. Indstillinger</h5>
<p>Siden viser de aktuelle kalenderindstillinger, som derefter kan ændres. Alle indstillinger forklares på siden Ændre kalenderindstillinger. Siden giver en god beskrivelse af alle mulige indstillinger.</p>
<br>
<h5>b. Kategorier</h5>
<p>Tilføjelse af kategorier med forskellig farve vil - selv om det ikke er nødvendigt - forbedre oversigten over kalenderen. Mulige kategorier er 'ferie', 'aftaler', 'fødselsdage', 'vigtigt', etc.</p>
<p>Den oprindelige installation har kun en kategori, kaldet 'ingen'. Når du vælger Kategorier fra administrationsmenuen, kommer du til en side med en liste med alle kategorier og mulighed for at tilføje nye kategorier eller editere/slette eksisterende kategorier.</p>
<p>Når der tilføjes / editeres begivenheder, kan de definerede kategorier vælges i en pull-down-liste. Den rækkefølge, hvori kategorier vises i listen bestemmes med sekvens-feltet.</p>
<p>When adding / editing categories a 'repeat' value can be set; events in this category will automatically repeat as specified. The checkbox 'Public' can be used to hide events belonging to this category from being viewed by public access users (not logged in users) and exclude them from the RSS feeds.</p>
<p>One or two check marks can be activated, resulting in the calendar in the display of one or two check marks in front of the event title for all events in this category. The user can use these check marks to flag events for example as "approved" or "completed".</p>
<p>Felterne tekstfarve og baggrund definerer de farver, som begivenheder i denne kategori vises med i kalenderen.</p>
<p>Når en kategori slettes, vil begivenheder der tilhører denne kategori bliver overført til kategorien 'ingen'.</p>
<br>
<h5>c. Brugere</h5>
<p>På brugersiden kan administratoren tilføje og editere brugere samt deres kalenderrettigheder. To hovedområder kan editeres: brugerens navn/email/password og brugerens rettigheder. Mulige rettigheder er: Se, Sende egne, Sende alle og Admin. Det er vigtigt at bruge en gyldig email-adresse, så brugerne kan modtage email-påmindelser om kommende begivenheder.</p>
<p>Via the Settings page, the administrator can enable "user self-registration" and set the access rights for self registered users. When self-registration is enabled, users can register to the calendar via the browser interface.</p> 
<p>Medmindre kalender-administratoren har givet Se-adgang til offentlige brugere, skal brugerne logge på med deres brugernavn eller email og password. Alt efter typen af bruger, kan brugeren få forskellige adgangsrettigheder.</p>
<p>For each user the default user-interface language on log-in can be specified. If no language is specified, the default calendar language specified on the settings page will be used.</p>
<br>
<h5>d. Database</h5>
<p>The database page allows the calendar administrator to execute the following fucntions:</p>
<ul>
<li>Check and Repair the database, to find and solve inconsistencies in the database tables</li>
<li>Compact database, to free unused space and to avoid overhead</li>
<li>Backup database, to create a backup file which can be used to recreate the database tables structure and content</li>
</ul>
<p>The first function, Check and Repair database, only needs to be run when the calendar views don't work properly. The second function, Compact database, could be run once a year to clean up the database, and the third function, Backup database, should be run more frequently, depending on the number of calendar updates.</p>
<br>
<h5>e. CSV fil-import</h5>
<p>Denne funktion kan bruges til at importere begivenhedsdata til LuxCal kalenderen fra andre kalendere (f.eks. MS Outlook). Nærmere vejledning findes på CSV import-siden.</p>
<br>
<h5>f. iCal fil-import</h5>
<p>Denne funktion kan bruges til at importere begivenheder fra iCal-filer (filendelse .ics) til LuxCal-kalenderen. Mere vejledning findes på iCal-importsiden. Kun begivenheder, som er kompatible med LuxCal-kalenderen importeres. Andre komponenter, så som: To-Do, Jounal, Fri / optaget, Tidszone og Alarm, ignoreres.</p>
<br>
<h5>g. iCal fil-eksport</h5>
<p>Denne funktion kan bruges til at eksportere LuxCal-begivenheder til iCal-filer (filendelse .ics). Mere vejledning findes på iCal-eksportsiden.</p>
<br>
</li>
<li id="al"><h4>About LuxCal</h4>
<p>Produced by: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Website and forum: <b><a href="http://www.luxsoft.eu/" target="_blank">www.luxsoft.eu/</a></b></p>
<p>LuxCal is freeware and may be redistributed and/or modified under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b>.</p>
<br></li>
</ol>
</div>