<!-- ! !!!!!!!!! INIZIALIZZAZIONE !!!!!!!!!!!!!! !-->
<!-- progetto inizializzato con il comando in powershell 'composer create-project --prefer-dist laravel/laravel:^7.0 laravel-boolpress' -->
<!-- ? -1 db -->
<!-- creato db boolpress_db  aggancianto al file .env e cambiato nome db e psw e username in root-->
<!-- ? -2 authentication -->
<!-- installiamo i pacchetti di autentificazione con 'composer require laravel/ui:^2.4'
      Laraverl ui predispone pacchetti di autentificazione per registrazioni nuovi utenti, controllo di login,
     controller per mandare email per reimpostare la psw  il controller per il restante e lo spazio di archiviazione nomi -->
<!-- ? -2.1 vue -->
<!-- installiamo i pacchetti di vue --auth ('php artisan ui vue --auth') questo è possibile perche abbiamo installato il pack precedente di laravel ui -->
<!-- ?-2.1.1 attenzione -->
<!-- dopo l'installazione ci chiderà di fare'npm install && npm run dev' l'&& non funziona in powershell aprire il prompt con bash per avviare e attendere -->
<!-- ! allert con laravel ui ad oggi si usa ancora bootstrap 4 con jquery e popper.js -->
<!-- ? -3 migrate -->
<!-- dopo fatto tutto bisogna andare a fare una migrazione per connettere le tabelle create da laravel ui con il server (crea le cartelle di psw e utente e tutti i collegamenti per la 'protezione') -->
<!-- ? -4 login -->
<!-- dopo l'avvio del server(npm artisan serve) facciamo la registrazione ' simone-agentelazio -password' -->
<!-- dopo la registrazione eliminiamo la rotta per essa con un array in Auth e aggiungiamo ['register' => false] per non permettere altre registrazioni   -->
<!-- ? -5 refactoring -->
<!-- all'interno dell resources\ views creiamo le cartelle admin e guest grazie alle quali andremo a dividere tra ciò che vedrà l'amministratore e ciò che vedrà l'utente -->
<!-- cambiare le varie rotte tra web e homeController che riportano alle view -->
<!-- per cambiare la landing page da home ad admin bisogna cambiare ...public const HOME = '/home';.... in app/Providers/RouteServiceProvider.php  -->
<!-- cambiamo in guest/welcome in guest/home (cambiare anche la route in web.php) -->
<!-- ? -6 controller admin-->
<!-- creiamo un contoller per gestire le rotte admin con il comando 'php artisan make:controller Admin/HomeController -->
<!-- eliminiamo il controller middleware in home controller (non admin ma quello libero 'guest') -->
<!-- ? -7 web -->
<!-- aggiungiamo il middleware(auth) alla route /Admin cosi da non scriverlo nel controller -->
<!-- creiamo un group dove inserire le rotte che hanno admin/... , il middleware , il name della rotta. il prefix, il name space-->
<!-- ? -8 model -->
<!-- cereiamo il models del post (oggetto del nostro progetto) e la relativa migration per il server con il comando 'php artisan make:model Models/Post -m' -->
<!-- andiamo a modificare i paramiti della migration che creerà le nostre colonne nel db $table.... andando ad aggiungere i relativi parametri per definire il tipo di dato nel db (unique, string('title',50) ecc..) -->
<!-- in caso non sia stata creata dal comando nella migration dobbiamo aggiungere la parte relativa alla funzione down per il role back -->
<!-- lanciamo la migration con il comando ?php artisan migrate' e creiamo la nostra 'tuple ' nel db -->
<!-- ? -9 controller 'Posts'-->
<!-- creazione controller per la parte Post'lato back per le crud'  con il comando php artisan make:controller Admin/PostContoller --resource (con resource ci creerà tutte le funzioni crud nel controller in automatico ) -->
<!-- nel PostController agganciamo il modello creato precedentemete  use App\Models\Post -->
<!-- andiamo a collegare tutte le rotte in web.php utilizzando Route::resource... per prendere tutte le rotte inserite nel controller relativo al post -->
<!-- inserendo le rotte nel group admin tutte le rotte erediteranno i valori inseriti precedentemente nelle specifiche del group -->
<!-- ? CRUD POST  Admin (back and)-->
<!-- # index  (R)-->
<!-- specifichiamo in PostsController le rotte e creiamo le pagine di riferimento .  -->
<!-- Cominciamo con l'index nel controller e creiamo la pagina 'rotta presente nel view' in views/admin/index-->
<!-- nel layout presente di base in laravel ui è gia caricato il link per js css ecc -->
<!-- ! laravel ui usa bootsrap 4 -->
<!-- utilizzando carbon possiamo stilizzare le date -->
<!-- andiamo nella sezione del modello 'in questo caso Posts' importiamo Carbon con 'use Carbon\Carbon; -->
<!-- all'interno della classe model andremo a creare una funzione che grazie a parametri esterni ci permetterà di restituire una data     public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    } -->
<!--# Show (R)  -->
<!-- creiamo un file show dove andremo a descrivere il dettaglio del post  poi andiamo nel controller e passiamo il dettaglio del'articolo (id) all view-->
<!-- in Laravel con la laravel dependency inception possiamo passare alle view direttamente il parametro del dettaglio senza andare a specificare il parametro tramite il quale ciò avviene -->

<!-- * VUE -->
<!-- in questa applicazione gestiremo la parte admin da laravel e la parte user experience con vue  -->
<!-- andiamo a creare in web.php una rotta di fallback cioè una rotta generiche ... una rotta che intercetta tutte le rotte che non possono entrare (per un motivo o per un altro ) nelle rotte create per l'admin o le auth
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');-->

<!--'{any?}' -> è un parametro dinamica che sta per 'accetta qualsiasi cosa'
where('any', '.*'); -> è una espressione regolare che dice prendi any che può essere di qualsiasi tipo qualsiasi carattere e in qualsiasi quantità
-->
<!--  nella guest home blade andiamo a gestire la nostra classica pagina html dove inseriremo vue . importiamo css e js dalle classiche rotte di compilazione -->
<!-- # problem compilazione js -->
<!-- essendo che abbiamo diviso tutto tra back e font andiamo a dividere anche la compilazione di js  -->
<!-- andiamo in resources / js e creiamo un nuovo file per il (front 'user') e in questo file inseriremo tutto lo script che andrà poi compilato da webpack -->
<!-- in app (back) andremo a lasciare (per quello che serve a noi in questo momento ) solo l'importazione di bootstrap ' che usa js per le modali e altre utility e in front -->
<!-- andiamo poi in webpack  e gli diciamo di compilare anche il nostro file front.js -->
<!-- # cambiamo la predisposizione di vue  -->
<!-- in resources/js/components prendiamo il file .vue e lo rinominiamo in App.vue-->
<!-- andiamo poi ad impostare vue come il solito
<script>
    export default {
        name:"App",
    }
</script>
  -->
<!-- in front.js andiamo a preparare lo scaffolding per la compilazione a componenti nel quale andiamo a importare il componente madre 'App'  -->
<!--
window.Vue = require("vue");
import App from "./components/App.vue";
const app = new Vue({
    el: "#root",
    render: h => h(App)
});
-->
<!-- con questo codice andiamo a dire a JS di importare vue , importare il componente app vue, inizializza una nuova applicazione che parte dall'elemento con id #root e come render della home sarà il componente app   -->
<!-- webpack compilerà il tutto e con npm run dev lo faremo compilare -->
<!-- potremo fare lo stesso con sass per  importare 2 file separati uno per il back(admin9 e uno per il front(guest)-->
<!-- * Nella views gust  -->
<!-- Dove andremo ad impostare il div con id root per vue andiamo ad inserire il template di html dove andremo a caricare il link per il css e le varie cdn se ne avremo bisogno e cosa importante nel body sarà presente solo il div con id root e in fine importiamo lo script 'front' dove abbiamo impostato la compilazione di vue  -->
