<?php
/*
= LuxCal event calendar on-line user guide = ROMANIAN / ROMÂNĂ

Traducerea în limba română realizată de Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).
This file has been translated in română by Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).

© Copyright 2009-2012 LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ug language file version
define("LUG","2.7.2");

?>
<div  class="floatR">
<img src="../../calende/lang/lang/ug-layout.png" alt="LuxCal page layout"/><br>
a: bara de titlu&nbsp;&nbsp;b: bara de navigare&nbsp;&nbsp;c: calendar&nbsp;&nbsp;d: zi
</div>
<br>
<div  style="margin:0 20px">
<h4>Cuprins</h4>
<ol>
<li><p><a href="#ov">Generalităţi</a></p></li>
<li><p><a href="#li">Autentificare</a></p></li>
<li><p><a href="#co">Opţiuni Calendar</a></p></li>
<li><p><a href="#cv">Vizualizare Calendar</a></p></li>
<li><p><a href="#ts">Text Căutare</a></p></li>
<?php if ($privs > 1) { //if post rights ?>
<li><p><a href="#ae">Adăugare / Editare / Ştergere Eveniment</a></p></li>
<?php } ?>
<li><p><a href="#lo">Deautentificare</a></p></li>
<?php if ($admin) { //if administrator ?>
<li><p><a href="#ca">Administrare Calendar</a></p></li>
<?php } ?>
<li><p><a href="#al">Despre LuxCal</a></p></li>
</ol>
</div>
<div class="help">
<br>
<ol>
<li id="ov"><h4>Generalităţi</h4>
<p>Calendarul <b>LuxCal</b> rulează pe un server web cu suport php şi mySQL şi poate fi vizualizat şi configurat prin intermediul oricărui browser web (Firefox, Internet Explorer, Opera etc.).</p>
<p>În bara de titlu sînt afişate titlul calendarului, data şi numele utilizatorului curent.
Imediat sub bara de titlu apare bara de navigare care conţine cîteva meniuri drop-down şi link-uri care permit navigarea, autentificarea, adăugarea şi vizualizarea evenimentelor precum şi adminstrarea şi configurarea calendarului. Aceste opţiuni pot fi sau nu afişate funcţie de drepturile de acces ale utilizatorului.
Imediat sub bara de navigare, funcţie de opţiunile selectate, sînt afişate evenimentele din calendar.
</p>
<br></li>
<li id="li"><h4>Autentificare</h4>
<p>Pentru a putea folosi calendarul este necesar mai întîii să vă autentificaţi (faceţi click pe opţiunea <b>'Log In'</b> situată în colţul din dreapta sus, în bara de navigare). În fereastra de autentificare introduceţi numele sau adresa de email şi parola. Dacă selectaţi opţiunea "Memorare Utilizator" data următoare nu veţi mai fi obligat să vă autentificaţi. Dacă aţi uitat parola puteţi primi o parolă nouă pe email folosind opţiunea <b>'(trimitere parolă nouă)'</b>.</p>
<p>Deasemenea puteţi schimba în orice moment adresa de email şi parola introducînd pe rînd adresa şi parola curente urmate de adresa nouă şi/sau parola nouă</p>
<p>Dacă administratorul calendarului a setat drepturi publice de vizualizare a calendarului, nu va mai fi nevoie să vă logaţi pentru vizualizarea evenimentelor ci doar dacă doriţi să introduceţi alte evenimente sau să modificaţi unele.</p>
<br></li>
<li id="co"><h4>Opţiuni calendar</h4>
<p>Selectarea butonului 'Opţiuni' determină deschiderea ferestrei 'Opţiuni Calendar'. Aici veţi putea selecta diverse opţiuni de afişare:</p>
<ul style="margin:0 20px">
<li><p>Modul de afişare calendar (lunar, anual, săptămînal, zilnic, evenimentele care urmează sau evenimentele modificate).</p></li>
<li><p>Un filtru de evenimente bazat pe utilizator. Pot fi afişate evenimentele corespunzătoare unui utilizator sau mai multor utilizatori simultan.</p></li>
<li><p>Un filtru de evenimente bazat pe categorie. Pot fi afişate evenimentele corespunzătoare unei singure categorii sau mai multor categorii simultan.</p></li>
<li><p>Limba folosită pentru afişare.</p></li>
</ul>
<p>Obs.: Afişarea meniului filtrare evenimente şi a meniului selecţie limbă poate fi activată-dezactivată în orice moment de către administrator.</p>
<p>După selectarea opţiunilor dorite în fereastra 'Opţiuni Calendar' validarea acestora se face selectînd din nou butonul 'Opţiuni'.</p> 
<br></li>
<li id="cv"><h4>Moduri Vizualizare Calendar</h4>
<p>În toate modurile de vizualizare, deplasînd cursorul mouse-lui deasupra evenimentului, putem obţine informaţii suplimentare despre eveniment. Pentru evenimente private culoarea de fundal a pop-up box va fi verde lumina. Mai mult, în modul <b>'Care Urmează'</b>, URL-urile din cîmpul <b>Descriere Eveniment</b> sînt convertite automat în link-uri către site-urile corespunzătoare putînd fi astfel accesate direct.</p>
<p>Events in a category for which the admin has activated one or two check boxes will have one or two check boxes displayed in front of the event title, which can be used to flag events for example as "approved" or "completed". When having sufficient rights, these check boxes can be clicked to check/uncheck them.</p>
<?php if ($privs > 1) { //if post rights ?>
<p>Funcţie de drepturile de acces pe care le aveţi:</p>
<ul style="margin:0 20px">
<li><p>În toate modurile, făcînd click pe eveniment se deschide fereastra <b>'Editare Eveniment'</b> care permite vizualizarea, editarea sau ştergerea evenimentului.</p></li>
<li><p>În modurile <b>'Anual'</b> şi <b>'Lunar'</b> un eveniment nou poate fi adăugat, la o anumită dată, făcînd click pe linia din celulă unde este afişată ziua din lună.</p></li>
<li><p>În modurile <b>'Săptămînal'</b> şi <b>'Zilnic'</b> fereastra <b>'Adăugare Eveniment'</b> poate fi deschisă selectînd cu mouse-ul o zonă oarecare. În acest mod cîmpurile dată şi timp sînt automat completate funcţie de zona selectată.</p></li>
</ul>
<p>În modul de afişare <b>'Modificări'</b> se poate introduce o dată de început, aici fiind afişate toate evenimentele adăugate sau modificate de la data specificată</p>
<p>Pentru a muta un eveniment la o nouă dată şi/sau oră, deschideţi fereastra <b>Editare Eveniment</b> şi modificaţi data/ora funcţie de necesităţi. Evenimentele nu pot fi mutate ('trase') cu mouse-ul la o nouă dată/oră.</p>
<?php } ?>
<br></li>
<li id="ts"><h4>Text Căutare</h4>
<p>Pentru căutarea unui text oarecare oriunde în calendar apăsaţi butonul cu simbolul unui triunghi din partea dreaptă a meniului. Se va deschide pagina de căutare, aici găsind toate detaliile necesare pentru utilizare.</p>
<br></li>
<?php if ($privs > 1) { //if post rights ?>
<li id="ae"><h4>Adăugare / Editare / Ştergere Eveniment</h4>
<p>Adding, editing and deleting events is done via the Event window, which can be opened in several ways as explained hereafter.</p>
<br><h5>a. Adăugare Eveniment</h5>
<p>Evenimentele pot fi adăugate în mai multe moduri:</p>
<ul style="margin:0 20px">
<li><p>făcînd click pe butonul <b>'Adăugare Eveniment'</b> din bara de navigare</p></li>
<li><p>făcînd click pe titlul celulei în modul  de vizualizare <b>Lunar</b> sau <b>Anual</b> (metoda cea mai folosită)</p></li>
<li><p>prin operaţiunea de 'drag' (tragere) efectuată asupra unei zone a calendarului în modul de vizualizare <b>Zilnic</b> sau <b>Săptămînal</b>.</p></li>
</ul>
<p>Folosirea oricărei metode v-a deschide fereastra <b>'Eveniment'</b> prin care pot fi introduse toate datele corespunzatoare evenimentului. Unele cîmpuri sînt deja predefinite funcţie de metoda folosită pentru a adăuga evenimentul.</p>
<p>În această fereastră pot fi introduse denumirea evenimentului, locaţia, categoria, precum şi descrierea acestuia. Oricare eveniment poate fi definit ca <b>'Privat'</b> prin selectarea opţiunii corespunzătoare. Definind un eveniment ca <b>'Privat'</b> acesta va fi vizibil doar pentru dumneavoastră.  Ca recomandare, titlul e bine să fie minimal, descrierea, locaţia, alte amănunte rămînînd să fie introduse în cîmpurile corespunzătoare. Trebuie remarcat că definirea cîmpurilor <b>'Locaţia'</b> şi <b>'Categoria'</b> este opţională. Pentru lizibilitate, fiecare categorie poate avea o culoare particulară. Modificînd culoarea unei categorii din opţiunea <b>'Categorii'</b> din bara de navigare, se schimbă culoarea tuturor evenimentelor corespunzatoare, în toate modurile de afişare. </p>
<p>Tot în acest formular pot fi definite şi orele de început şi de sfîrşit corespunzătoare evenimentului. Dacă se selectează opţiunea <b>'Zilnic'</b> nu va fi afişat niciun timp. Data de final este opţională şi poate fi utilizată pentru evenimentele care se întind pe mai multe zile. Datele şi orele specifice evenimentului pot fi introduse manual sau selectate folosind butonul calendar. Se pot defini şi evenimente recurente (care se repetă periodic) folosind un formular special accesibil prin butonul <b>'Modificare'</b>. Aici se poate defini direct modul de repetiţie fie se poate specifica intervalul în care se doreşte repetiţia evenimentului. Dacă nu se specifică nicio dată de final, evenimentul se va repeta la nesfirşit, situaţie care apare spre exemplu în cazul zilelor de naştere.</p>
<p>Suplimentar, tot din acest formular, se poate defini dacă şi cînd vor fi trimise notificări privind evenimentul respectiv la una sau mai multe adrese de email. Avem opţiunea <b>'acum'</b> şi/sau cu un număr definit de zile înainte de eveniment. Totodată va fi trimis un email de notificare şi în ziua evenimentului. Pentru evenimentele recurente email-urile de notificare vor fi trimise cu un număr de zile (specificat aici) înainte şi în fiecare zi în care evenimentul se repetă.</p>
<p>La final validarea/salvarea evenimentului se face folosind butonul <b>'Adăugare Eveniment'</b>.</p>
<p>Dacă opţiunea 'Nu închide fereastra' este activată, apăsarea butonului <b>'Adăugare Eveniment'</b> nu va închide fereastra de editare, în acest caz în fereastră fiind afişate trei butoane noi: adăugare eveniment, ştergere eveniment, respectiv utilizarea datelor curente pentru un alt eveniment.</p>
<br>
<h5>b. Editare / Ştergere Eveniment</h5>
<p>În fiecare mod de vizualizare al calendarului, un eveniment poate fi vizualizat, editat sau şters. Făcînd click pe eveniment se va deschide fereastra <b>'Editare Eveniment'</b> care este similară ferestrei <b>'Eveniment'</b> descrisă mai sus, cu excepţia celor trei butoane de la bază.</p>
<p>Funcţie de drepturile de acces pe care le aveţi, veţi putea vizualiza/edita sau şterge evenimente (cele personale sau chiar cele ale altor utilizatori).</p>
<p>Cîmpurile din această fereastră au aceleaşi funcţii cu cele descrise mai sus (fereastra <b>'Eveniment'</b>). Pentru o descriere a cîmpurilor vedeţi descrierea făcută cîmpurilor din fereastra <b>'Adăugare Eveniment'</b> de mai sus. ATENŢIE: butonul <b>Ştergere Eveniment</b> determină ştergerea instantanee a evenimentului din calendar, <strong>fără a cere nicio confirmare suplimentară</strong>.</p>
<p>Ştergerea unui eveniment recurent va determina ştergerea tuturor instanţelor evenimentului, nu doar pentru o dată anume.</p>
<br></li>
<?php } ?>
<li id="lo"><h4>Deautentificare</h4>
<p>Pentru a vă de-autentifica faceţi click pe opţiunea <b>Log Out</b> din bara de navigare. Dacă ieşiţi din calendar fără a vă deloga este posibil ca la o noua deschidere a calendarului să nu vă mai fie cerută parola.</p>
<br></li>
<?php if ($admin) { //administrator only ?>
<li id="ca"><h4>Administrare Calendar</h4>
<p>- următoarele opţiuni necesită drepturi de administrator -</p>
<p>Cînd un utilizator se loghează ca administrator, suplimentar, în bara de navigare apare şi opţiunea <b>Administrare</b>. Folosind această opţiune veţi putea accesa diverse funcţii specifice de administrare:</p>
<br>
<h5>a. Setări</h5>
<p>Această pagină afişează setările curente ale calendarului, permiţînd şi modificarea lor. Toate setările sînt explicate suficient de detaliat în fereastra <b>Detalii Setări Calendar</b>.</p>
<br>
<h5>b. Categorii</h5>
<p>Adăugarea de categorii folosind culori diferite - deşi acest lucru nu este obligatoriu - va îmbunătăţi într-un mod evident modul de afişare al evenimentelor în calendar. Exemple posibile de evenimente pot fi: 'vacanţă', 'întîlnire', 'zi de naştere', 'important', etc.</p>
<p>Iniţial, la instalarea calendarului, nu este definită decît o categorie - 'no cat'. Selectînd opţiunea <b>Categorii</b> va fi afişată lista de categorii curentă, existînd posibilitatea de a le modifica pe cele existente sau de a adăuga altele noi.</p>
<p>Cînd se adaugă/modifică diferite evenimente, categoria dorită se poate selecta direct din lista de categorii. Ordinea în care apar categoriile  în listă depinde de valoarea setată în cîmpul <b>Secvenţă</b>. </p>
<p>Cînd se adaugă/modifică o categorie se poate seta şi un mod de repetiţie, toate evenimentele definite cu această categorie în calendar repetîndu-se conform setării. The checkbox 'Public' can be used to hide events belonging to this category from being viewed by public access users (not logged in users) and exclude them from the RSS feeds.</p>
<p>One or two check marks can be activated, resulting in the calendar in the display of one or two check marks in front of the event title for all events in this category. The user can use these check marks to flag events for example as "approved" or "completed". The fields Text Color and Background define the colors used to display events in the calendar belonging to this category.</p>
<p>Cîmpurile <b>Culoare Text</b> şi <b>Fundal</b> definesc culorile utilizate la afişarea evenimentelor în calendar funcţie de categoria de care aparţin.</p>
<p>Atunci cînd se şterge o categorie, evenimentele care au fost definite folosind această categorie, vor trece automat la categoria 'no cat'.</p>
<br>
<h5>c. Utilizatori</h5>
<p>Pagina <b>Utilizatori</b> permite administratorilor calendarului să gestioneze utilizatorii acestuia (adăugare / modificare / ştergere utilizatori). Aici găsim definite două zone principale: numele utilizatorului/adresa de email/parola şi drepturile de acces. Drepturile de acces care pot fi definite sînt: vizualizare, editare evenimente proprii, editare toate evenimentele şi administrator. Este important ca adresa de email să fie corectă pentru a putea primi notificări prin email privind diferite evenimente din calendar sau pentru a recupera parola pierdută.</p>
<p>Prin intermediul paginii <b>Setări</b> administratorul poate permite autoînregistrarea utilizatorilor (opţiunea <b>'autoînregistrare utilizatori'</b>) şi seta drepturile de acces pe care le vor primi aceştia în mod automat. Dacă opţiunea este activată utilizatorii se pot înregistra direct folosind interfaţa browser-ului.</p> 
<p>Doar dacă administratorul nu a setat modul <b>'acces public'</b>, utilizatorii trebuie să se autentifice (prin nume şi parolă) pentru a putea accesa şi vitualiza calendarul.</p>
<p>Suplimentar, pentru fiecare utilizator, individual, se poate defini limba implicită pentru interfaţa web a calendarului. Dacă nu se specifică nicio limbă în profilul utilizatorului, pentru afişare va fi folosită limba implicită a calendarului.</p>
<br>
<h5>d. Baza de Date</h5>
<p>Pagina <b>'Baza de Date'</b> permite administratorilor sa execute următoarele funcţii:</p>
<ul>
<li><b>Verificare şi Reparare</b>, pentru a verifica şi corecta eventualele erori</li>
<li><b>Compactare Bază de Date</b>, pentru a optimiza baza prin eliminarea înregistrările nule sau marcate pentru ştergere</li>
<li><b>Back-up Bază de Date</b>, pentru a crea o copie de rezervă a bazei de date, utilă pentru refacerea acesteia în cazuri extreme (pierderea bazei, mutatea calendarului pe alt server, etc.)</li>
</ul>
<p>Prima funcţie, <b>Verificare şi Reparare Bază</b>, e recomandabil să fie utilizată doar dacă sînt observate disfuncţionalităţi în utilizarea calendarului. A doua funcţie,  <b>Compactare Bază de Date</b>, poate fi utilizată peridodic (este suficient o dată pe an) pentru optimizarea bazei. Similar, funcţia  <b>Back-up Bază de Date</b>, poate fi folosită periodic pentru a crea copii de siguranţă ale bazei de date,  uzual ori de cîte ori sînt operate modificări majore în calendar.</p>
<br>
<h5>e. Import CSV</h5>
<p>Această opţiune poate fi utilizată pentru a importa evenimente în calendar din fişiere de tip <b>CVS - Comma Separated Values</b> (evenimente exportate spre exemplu din aplicaţii gen Microsoft Outlook). Mai multe informaţii despre utilizarea acestei opţiuni pot fi găsite în pagina <b>'Import CSV'</b>.</p>
<br>
<h5>f. Import iCal</h5>
<p>Această opţiune poate fi utilizată pentru a importa evenimente în calendar din fişiere de tip <b>iCal</b> (extensie <b>.ics</b>). Pot fi importate doar evenimentele compatibile cu acest calendar. Alte cîmpuri cum ar fi cîmpuri de tipul: 'De Făcut', 'Jurnal', 'Liber / Ocupat', 'Fus Orar' şi 'Alarme' vor fi ignorate. Mai multe informaţii despre utilizarea acestei opţiuni pot fi găsite în pagina <b>'Import iCal'</b>.</p>
<br>
<h5>g. Export iCal</h5>
<p>Această opţiune poate fi utilizată pentru a exporta evenimente din calendar în fişiere de tip <b>iCal</b> (extensie <b>.ics</b>). Mai multe informaţii despre utilizarea acestei opţiuni pot fi găsite în pagina <b>'Export iCal'</b>.</p>
<br></li>
<?php } ?>
<li id="al"><h4>Despre LuxCal</h4>
<p>Produs de: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Website şi forum: <b><a href="http://www.luxsoft.eu/" target="_blank">www.luxsoft.eu/</a></b></p>
<p>LuxCal este un produs gratuit şi poate fi distribuit cu respectarea termenilor specificţi în <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b>.</p>
<br></li>
</ol>
</div>