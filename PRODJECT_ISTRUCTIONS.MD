<!-- ! !!!!!!!!! INIZIALIZZAZIONE !!!!!!!!!!!!!! !-->
<!-- progetto inizializzato con il comando in powerschell 'composer create-project --prefer-dist laravel/laravel:^7.0 laravel-boolpress' -->
<!-- ? -1 db -->
<!-- creato db boolpress_db  aggancianto al fikle .env e cambiato nome db e psw e username in root-->
<!-- ? -2 autentication -->
<!-- installiamo i pacchetti di autentificazione con 'composer require laravel/ui:^2.4'
      Laraverl ui predispone pacchetti di autentificazione per registrazioni nuovi utenti, controllo di login,
     controller per mandare email per reimpostare la psw  il controller per il restarte e lo spazio di archiviazione nomi -->
<!-- ? -2.1 vue -->
<!-- installiamo i pacchetti di vue --auth ('php artisan ui vue --auth') questo è possibile perche abiamo installato il pack precedente di laravel ui -->
<!-- ?-2.1.1 attenzione -->
<!-- dopo l'installazione ci chiderà di fare'npm install && npm run dev' l'&& non funziona in powershell apripre il promt con bash per avviare e attendere -->
<!-- ! allert con laravel ui ad oggi si usa ancora boodstrap 4 con jquery e popper.js -->
<!-- ? -3 migrate -->
<!-- dopo fatto tutto bisogna andare a fare una migerazione per connettere le tabelle create da laravel ui con il server (crea le cartelle di psw e utente e tutti i collegamenti per la 'protezione') -->
<!-- ? -4 login -->
<!-- dopo l'avvio del server(npm artisan serve) facciamo la registrazione ' simone-agentelazio -password' -->
<!-- dopo la registrazione eliminiamo la rotta per essa con un array in Auth e aggiungiamo ['register' => false] per non permettere altre registrazioni   -->
<!-- ? -5 refactoring -->
<!-- all'inerno dell reorurces\ views creiamo le cartelle admin e guest grazie alle quali andremo a dividere tra ciò che vedrà l'amministratore e ciò che vedrà l'utente -->
<!-- cambiare le varie rotte tra web e homeController che riportano alle view -->
<!-- per cambiare la landing page da home ad admin bisogna cambiare ...public const HOME = '/home';.... in app/Providers/RouteServiceProvider.php  -->
<!-- cambiamo in guest/welcome in guest/home (cambiare anche la route in web.php) -->
<!-- ? -6 controller -->
<!-- creiamo un contoller per gestire le rotte admin con il comando 'php artisan make:controller Admin/HomeController -->
<!-- eliminiamo il controlle middleware in home controller (non admin ma quello libero 'guest') -->
<!-- ? -7 web -->
<!-- aggiungiamo il middleware(auth) alla route /Admin cosi da non scriverlo nell controller -->
<!-- creiamo un group dove inserire le rotte che hanno admin/... , il middleware , il name della rotta. il prefix, il name space-->
<!-- ?model -->
<!-- cereiamo il models del post (ogetto del nostro progetto) e la relativa migration per il server con il comando 'php artisan make:model Models/Post -m' -->
<!-- andiamo a modificare i paramiti della migration che creerà le nostre colonne nel db $table.... andando ad aggiungere i relativi parametri per definire il tipo di dato nel db (unique, string('title',50) ecccc) -->
<!-- in caso non sia stata creata dal comando nella migration dobiamo aggiungere la parte relativa alla funzione down per il rolle back -->
<!-- lanciamo la migration con il comando ?php artisan migrate' e creiamo la nostra 'tupla ' nel db -->
