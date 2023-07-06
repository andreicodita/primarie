# primarie

Site-ul intitulat “Interactiunea cu primaria”, avand sloganul „Primăria Nevoilor Tale!” vine în ajutorul cetățenilor, dar și a primăriilor. Acesta are ca scop implementarea unui sistem de reclamații/sugestii, respectiv anunțuri la nivelul tuturor reședințelor de județ pentru a facilita cu ușurință comunicarea dintre cetățean și primărie(un sistem asemănător cu cel implementat pe site-ul primariabt.ro, dar la un nivel mult mai larg).
	Proiectul are în spate o bază de date MySQL cu ajutorul căreia este pus la punct un sistem de conturi, cu diferite funții: utilizator(funție default), moderator, admin si admin-general.
	- Utilizatorul: este contul cu funcția cea mai de jos, cea default în tabelul „users” coloana „functie”, iar singura acțiune pe care o poate face este de a crea postări de tipul reclamație/sugestie;
	- Moderatorul: această funcție este acordată pe reședință, la fel ca și cea de admin. Un mod poate modifica postări, pentru a menține corectitudinea din punct de vedere gramatical, dar și al încadrării unei postări în categoria corespunzătoare;
  - Administratorul: acesta are acces la un meniu special, având posibilitatea de a modifica sau șterge atât conturile cât și postările din reședința din care face parte, pentru a menține site-ul cât mai „curat”, dar și de a crea anunțuri;
Mod-ul si admin-ul au acces la aceste modificări doar în reședința din care sunt, un cont cu una dintre aceste funcții are acces doar de a posta în oricare altă reședință.
	- Administratorul general are acces la toate modificările, poate șterge sau modifica orice cont sau postare din baza de date, adăuga anunțuri, indiferent de reședință.

 Site-ul este creat în:
•	HTML;
•	CSS;
•	PHP;
•	XAMPP;
•	JavaScript.
	Este adaptabil în funcție de dispozitiv, schimbându-și aspectul odată cu reducerea pixelilor sau schimbarea orientării, fiind optimizat atât pentru desktop, cât și pentru tableta sau telefon;
	A fost testat și funcționează pe toate browserele(Chrome, Microsoft Edge, Opera, Brave, etc.);
	Permite zoom-ul oricărei pagini pentru o citire mai ușoară;
	Imaginile atribuite postărilor sunt salvate într-un folder, iar datele,  în baza de date „sql7630250” pe serverul „sql7.freesqldatabase.com”;
	Afișează diferite tipuri de erori, dar și mesaje de tipul „Postarea a fost modificată!”, respectiv ștearsă, în funcție de situație. Spre exemplu un utilizator nu poate crea o postare fără conținut(titlu, descriere) sau un cont nu poate fi creat dacă email-ul nu este valid sau introdus corespunzător, parolele la fel sau dacă există deja un cont cu acel email;
	Parolele sunt criptate prin BCrypt înainte de a fi stocate în baza de date.
	Conținutul fiecărei pagini se schimbă în funcție de reședința selectată în pagina „welcome.php”.
