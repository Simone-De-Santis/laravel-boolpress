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
<!-- ? - 10 CRUD POST  Admin (back and)-->
<!-- # index  (R)-->
<!-- andiamo a creare le pagine blade per le crud -->
<!-- specifichiamo in PostsController le rotte e creiamo le pagine di riferimento .  -->
<!-- possiamo inserire anche un order by  e scrivere qui anche linguaggio sql facendo $post=DB::query('.............')-->
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
<!-- * pagination  -->
<!-- in laravel possiamo paginare  i risultati semplicemente impostando al posto di all nel controller di riferimento paginate e tra parentisi impostare la relets dei risultati  -->
<!-- dopo fatto questo nella pag della view di riferimento arriverà un parametro che noi possiamo prendere con  {{ $posts->links() }} per far apparire i link delle pagine dei post mancanti -->
<!-- andiamo ad imposta le rotte nei pulsanti della index -->
<!-- ! il punsante della cancellazione -->
<!-- il pulsante delete non deve restituire una pagina e la chiamata che deve eseguire è la delete ma lo facciamo con un form ---- vai a delete per ulteriori dettagli  -->
<!-- # CREATED (C) -->
<!-- visto che created e edit condividono lo stesso form ma con delle differenze per non entrare in un errore adiamo ad inizializzare una istanza vuota che in un secondo momento andremo a controllarne l'esistenza con la presenza o meno dell'id per visualizzare il form di creazione o modifica  -->
<!-- nel form in blade ricordarsi di mettere il name nei vari input dando ad esso il nome del parametro che troveremo in tabella -->
<!-- l'action porta allo store -->
<!-- inserire il token di autentificazione -->
<!-- # Edit () -->
<!-- nel controller passiamo alla view tutta l'istanza del post perché avremo i campi pre fillati da modificare, utilizziamo la depended inception -->
<!-- essendo un form pre fillato andremo ad aggiungere il value all'input   -->
<!-- andiamo ad unificare il form creando un include in resource ed includendo il'componente dove serve (create ed editi)'-->
<!-- andiamo a modificare il form del post per renderlo universale sia per il create che per l'edit -->
<!-- controlliamo l'esistenza del post passato tramite controller e andiamo ad impostare il metodo di output  -->
<!-- per l'update avremo bisogno del method patch mentre per lo store andrà bene il method post -->

<!-- #Store -->
<!-- nello store ci arrivano tutti i campi compilati dal form proveniente da create -->
<!-- recuperiamo i dati  da request -->
<!-- utilizziamo fill per comporre l'istanza aggiungiamo lo slug , salviamo , e facciamo un redirect allo show passando il post con compact -->
<!-- # update -->
<!-- nell' update ci arriva l'id del post ma andando ad usare la depended inception prendiamo tutta l'istanza-->
<!-- prendiamo in $data i dati ricevuti da request aggiungiamo lo slag e facciamo l'update -->
<!-- # DESTROY (D) -->
<!-- nel post controller andiamo nella funzione destroy e impostiamo i parametri della dependence inception per prendere il post specifico , poi applichiamo al post la funzione delete e nel return facciamo un redirected all'index -->
<!-- con la whit possiamo passare alla nuova index che è passata pre la funzione destroy una coppia di chiave valore con la quale andremo a creare un aller per l'avvenuta cancellazione ... questa coppia si chiama variabile di sessione che ha vita fino al prossimo refresh della pagina -->
<!-- in index prendiamo la variabile di sessione con l' @if(session(e il cosa abbiamo passato dal controller )) -->
<!-- * allert di conferma -->
<!-- creiamo un allert di conferma per la cancellazione , nel layout deve essere specificato uno yeld(segnaposto) per inserire il nostro eventuiale script poi apriamo una sezione nella nostra index e apriamo il tago script -->
<!-- creiamo la costante per prendere i bottoni e con la funzione 'document.querySelectorAll('')'     prendiamo tutti i btn elimina presenti in pagina (avremo usato getelementbyid se i FORM da prendere erano 1) e selezioniamo con i SELETTORI CSS LA CLASSE delete button -->
<!-- con un ciclo andiamo ad attaccare a tutti i form di delete un eventListener per rimanere in attesa dello scatenarsi dell'evento submit del btn al suo interno e blocchiamo il flusso dell'evento del form con e.preventDefault poi con confirm attendiamo che l'utenti confermi o meno se conferma si riprende con il submit senno l'esecuzione rimarrà annullata -->

<!-- ? -11 API -->
<!-- all'interno di routs/api.php possiamo creare le nostre rotte api per esporre i nostri dati e vederli sia dalla nostra app che da altre api -->
<!-- il processo rimane sempre lo stesso ... creiamo una rotta , creiamo un controller , nel controller leggo il modello , con eloquent prendo quello che mi serve e poi do una risposta-->
<!-- # CRUD API -->
<!-- creiamo un controller saparato in una carella a parte perciò eseguiamo il comando :'php artisan make:controller Api/PostController --api'  che ci creerà la cartella con un controller apposta per le api eliminando le funzioni che non ci servono -->
<!-- creiamo un RouteGroup per evitare di mettere sempre api\Post controller e poi andiamo a definire il la funzione index nel controller api -->
<!-- nel controller andiamo a definire il  modello del Post -->

<!-- ? INDEX -->
<!-- andiamo nella funzione index , prendiamo tutti i post con $posts = Post::all();   il suo risultato è una collection ma nella funzione return response()->json($posts) json si aspetta un array .... usando laravel questo problema si risolve in automatico  , per mandare piu dati dobbiamo mandare la risposta json con compact json(conpact('posts','frutta','verdura'))  -->
<!-- ? SHOW -->
<!-- nella funzione show restituiamo il json di uno specifico post perciò inseriamo l'ID -->
<!-- in route/api.php andiamo a definire la rotta dell'api show -->
<!-- in post controller usiamo la dependency inception per prendere l'istanza del modello  -->
<!-- ? DESTROY-->
<!-- nella destroy non mi aspetto di ritornare dietro un json ma uno status  Post::destroy($id);  return response(' ', 204); -->

<!-- % category -->
<!-- andiamo a creare le categorie  -->
<!-- creiamo sia il modello della categoria che la migration con il comando php artisan make:model Models/Category -m -->
<!-- laravel riconosce il plurale delle lettere che finiscono con la y mettendo ies per il plurale  -->
<!-- definiamo le funzioni up e down (role back) delle categorie -->
<!-- poi lanciamo al migration php artisan migrate -->
<!-- creiamo un seeder per riempire il db delle category con il comando php artisan make:seeder CategoriesTableSeeder -->
<!-- aggiungiamo la table al DatabaseSeeder.php cosi in caso di refresh verrà fatto tutto in automatico insieme ai post  -->
<!-- lanciamo il comando php artisan db:seed --class=CategoriesTableSeeder per caricare solo le category nel db -->
<!-- % relazione category post -->
<!-- # in questa situazione diremo albitrariamente che un post può avere solo una categoria poi la cambieremo -->
<!-- creiamo una relazione tra la tabella category e i post  -->
<!-- in questo caso sarà una relazione uno(category) a molti(post)  -->
<!-- perciò la principale sarà category e la foren key la prenderà la secondaria che sarà post -->
<!-- ?mod table -->
<!-- dobbiamo inserire nella tabella del modello dipendente la colonna della foren key riferita all'id della dominante (category_id) , per aggiungere la colonna dobbiamo fare una migration . creiamo la migration : php artisan make:migration add_foreign_category_id_on_posts_table --table=posts -->
<!-- nella migration della tabella POSTS definiamo la colonna (solo la colonna non di cosa si occupa ) $table->unsignedBigInteger('category_id')->after('id')->nullable();     la agganceremo alla colonna category id , inseriremo questa colonna dopo la colonna id . e questa colonna sarà nullable (non obligatoria ) cosi potremo creare post senza categorie e non rischieremo di rompere tutto visto che già esistono post che non avevano questa colonna inserita precedentemente -->
<!-- specifichiamo che la colonna è una foreign key category_id che fa riferimento alla colonna id della tabella categories e che se viene eliminata una categoria non viene eliminato il post ma questa fk viene settata su null  $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')  -->

<!-- dobbiamo inserire le specifiche per il rol back  -->
<!-- eliminiamo il vincolo inserendo il nome che viene composto direttamente da laravel in questo modo : nome tabella + _ (posts_) , nome colonna +_ (category_id), tipo di vincolo (foreign) = $table->dropForeignKey('posts_category_id_foreign'); -->
<!-- eliminiamo la colonna con $table->dropColumn('category_id') -->
<!-- lanciamo la migrazione php artisan migrate -->
<!-- ?relazione model -->
<!-- nei modelli di post e category andiamo a creare le funzioni per le relazioni
post->category
public function category(){return $this->belongsTo('App\Models\Category'); }
category _> post
  public function Posts(){ return $this->hasMany('App\Models\Post'); } -->

<!-- inserite tutte le varie relazioni lato db e lato model andiamo a modificare il form per inserire la category nell' edit e nel create -->
<!-- ?change form -->
<!-- inseriamo una selected e modifichiamo id e inseriamo il name per mandare i dati nel db , lo chiameremo perciò con il nome della tabella  -->
<!-- dall'Admin post controller ci passeremo le categorie presenti nel db per creare le option della select nel form -->
<!-- nel post controller (admin) passiamo il modello category e poi   lo passiamo nel compact di create -->
<!-- ora nel form arrivano i dati relativi a categories -->
<!-- cicliamo su questi dati e stampiamo il nome e come valore dobbiamo restituire l'id -->
<!-- dopo aver premuto il pulsante salva si passa in store dove dovremo andare ad aggiungere la colonna categories nella cartella dei dati da fillare -->
<!-- validiamo la category senza value(nessuna categoria)
 'category_id' => 'nullable|exists:categories,id' controlla se il valore inserito è nella tabella categories, colonna id altrimenti metti null -->
 <!-- NELLO views/SHOW GESTIAMO IL SENZA CATEGORIA CON UN IF -->
 <!-- lo stesso lo facciamo nell'index  -->
 <!-- passiamo i dati della category nel form di edit tramite il post/controller->edit  poi andiamo a stampare la propietà relativa all'oggetto aggiungendola all'old-->
 <!-- aggiungiamo la validazione della categoria nel controller post nella sezione update -->

<!-- ?mod index admin -->
<!-- creiamo un riassunto dove mostriamo quanti post ci sono in ogni categoria -->
<!-- passiamo dal controller le categorie nell'index e stampaimo in pagina -->
<!-- aggiungendo with('category') in cardPostController index insieme al post viene mandata tutta l'istanza della categoria per ogni post  -->

<!-- # ROUTE CATEGORY -->
<!-- creiamo le rotte in web php -->
<!-- creiamo poi il controller con $php artisan make:controller Admin -->
<!-- in category Controller andiamo a definire tutte le crud -->
<!-- andiamo a modificare i vai valori delle selected per passare le categorie e i relativi valori -->
<!-- * aggiungiamo la colonna del totale dei post nella index delle category -->
<!-- ? RELAZIONE UNO A MOLTI TRA USER E POST -->
<!-- la relazione debole è post perché non puo esistere senza un autore ma l'autore può esistere senza creare post -->
<!-- andiamo a fare una migration per aggiungere una migratio alla tabella post nella quale inseriremo la fk (id dell'utente che ha creato il post ) con il comando php artisan make:migration add_user_id_to_posts_table --table=posts  -->
<!-- una volta gestita la creazione e il drop (prima il vincolo poi la colonna ) facciamo partire la migrazione-->
<!-- colleghiamo i modelli in post insertiamo la funzione con belongsTo perche può appartenere solo a un utente e in user  in user aggiungiamo la funzione hasMany -->
<!-- in Post controller admin nella sezione store andiamo a salvare i dati dell'utente loggato aggiungendo $data['user_id']=Auth::id() -->
<!-- dobbiamo aggiungere il fillable nel modello senno viene ignorato il parametro  -->
<!-- * possiamo cambiare nome alla funzione della tabella di relazione nel modello però dando il secondo parametro alla funzione con il nome della tabella da cercare ed eventualmente il terzo parametro con la chiave se nominata diverso da id  -->
<!-- ? relazione one to one -->
<!-- user user info -->
<!-- creaimo una nuova tabella per le info user php artisan make:model UserInfo -m -c --resource   genera modello  migration controller resource -->
<!-- avendo creato direttamente la tabella con la colonna della foreing key e il vincolo non c'è bisogno di specificare nel drop chi va tolto prima -->
<!-- fatto questo avviamo la migrazione -->
<!-- definiamo le relazioni nei modelli  -->
<!-- nel model di User definiremo il legame con hasOne visto che è dominante rispetto alle sue info visto che può vivere senza le sue info e non il contrario  -->
<!-- nel model di user info andremo a definire il legame con la regola belongs to visto che appartiene solo a user info -->
<!-- ! 89 start -->

||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||
||

<!-- ? VUE -->
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
<!--* Vue components -->
<!-- creiamo un componente esterno per importare l'header  -->
<!-- importiamo il componente in app -->
<!-- passiamo parte del titolo dell'header con prop -->
<!-- prepariamo il componente a ricevere le prop impostando in export e utilizzando la prop nel template -->
<!-- nel componente madre passiamo la prop o direttamente nel componente(no bind) o passando una proprietà 'un array|| un oggetto'(bind = dinamico) presente in data -->
<!-- # dopo le crud api -->
<!-- creiamo un componente per mostrare la lista dei post nella home guest -->
<!-- in data passiamo un array posts vuoto che andremo a riempire tramite una chiamata api che faremo nella sezione methods -->
<!-- la chiamata api in vue la faremo con axios che è gia installato in laravel a noi basta importarlo nel componente che farà la chiamata , ma possiamo importare axios a livello globale importandolo in front.js che carica vue -->
<!-- windows.axios = require("axios");    all'oggetto windows passiamo l'intera istanza di axios -->
<!-- per usare la proprietà axios non serve specificare window.axios nei file js ma solo axios -->
<!-- creiamo la funzione getPosts dove useremo axios per la chiamata prima prepariamo la Base uri per l'indice http e montiamo la chiamata, in catch troveremo gli errori che stamperemo con un consol log e in then la risposta della chiamata  -->
<!-- una volta creata la funzione bisognerà chiamarla e in questo caso la faremo chiamare in automatico alla creazione della pagina mettendola in create( questa funzione si chiama Lifecycle methods  ) -->
<!-- ora mettiamo i posts della chiamata nell'array vuoto messo precedentemente in data -->
<!-- * creiamo un componente card  -->
<!-- cicliamo sul componente per far creare tante card quante sono i post nel db e passiamo i dati del singolo post alla card per stamparlo tramite le prop -->
<!-- creiamo nella crd un method per formattare la data, useremo il Date di js... js formatta i mesi a partire da zero perciò aggiungeremo 1-->
<!-- ? vue loading -->
<!-- impostiamo un loading fino a quando la pagina non ha caricato tutti i post da mostrare -->
<!-- impostiamo in PostList che è colui che si occupa della chiamata il parametro loading in false di defaulter e lo settiamo  in true al momento dell'avvio della chiamata e false alla fine e gestiamo l'errore -->
<!-- creiamo un componente a parte per il loader e lo mettiamo nei componenti generali di vue -->
<!-- usiamo lo spinner di bootstrap 4 -->
<!-- una volta incorporato il componente facciamo su un v-if che si attiva solo nella partenza della chiamata e si elimina alla conclusione -->
<!-- ? pagination vue api  -->
<!-- senza la paginazione della api abbiamo un array sul quale giriamo per stampare la card ma con paginate ci viene restituito un array di informazioni con un data di elementi specifici che abbiamo richiesto in paginate -->
<!-- per risolvere questo problema andiamo a modificare la ress.data in ress.data.data -->
<!-- possiamo usare una nomenclatura che si chiama destructuring  al posto di this.posts = res.data.data; scriviamo const { data } = res.data;    this.posts = data;   questo sta per 'estraimi da res.data i data ma possiamo estrarre anche tutte le altre variabili  come in questo caso la pagina corrente e l'ultima pagina rispettando però la nomenclatura restituita da laravel nella chiamata api che possiamo vedere da postman
const { data, current_page, last_page } = res.data; -->
<!-- #inseriamo i link alle pagination -->
<!-- prendiamo da bootstrap il modello della paginazione e lo andiamo a modificare -->
<!-- avendo preso con il destructuring dal data anche pagina corrente e il numero totale di pagine possiamo gestire se far comparire o meno i pulsanti avanti e indietro della paginazione ciclando sopra con un vif e dicendo fai vedere il pulsante si la pagina corrente è maggiore di 1 (previous) o se la pagina corrente è minore dell valore dell'ultima pagina (next) -->
<!-- nella chiamata api rendiamo il parametro della pagina dinamica passandolo dalla funzione get post (se non viene passato nessun valore la chiamata restituisce la pagina 1 ) così da poter rendere funzionanti i pulsanti previous e next i quali renderemo funzionanti agganciando un evento vue one-click che andrà ad aggiungere o togliere uno al data della chiamata e farà eseguire una nuova chiamata -->
<!-- con un ciclo for andiamo a stampare i numeri delle pagine con i relativi link  -->
<!-- impostiamo la classe active dinamica solo alla veridicità di una condizione se current.page = index del ciclo for -->
<!-- visto che avremo un pagination sia sopra che sotto i post creiamo un componente e importiamolo  -->
<!-- #emit da pagination a postList.vue -->
<!-- andiamo a creare un emit dal figlio al padre per andare a dire al padre che è sto premuto un bottone e deve fare qualcosa -->
<!-- nel nostro caso facendo $emit('onPageChange', currentPage - 1) sul pulsante figlio emetemiamo un evento e passiamo dei parametri -->
<!-- quando verrà scatenato l'evento il padre lo intercetterà e farà partire la funzione changePage che in methods chiamerà la funzione getposts che utilizzerà i dati passati con(page) -->
<!-- ? order data api dinamici -->
<!-- richiediamo in maniera dinamica l'ordine alla chiamata api   -->
<!-- andremo ad agiungere alla chiamata il parametro order -->
<!-- in post controller api / index all'orderby al posto di asc o desc mettiamo un parametro dinamico $order  prima andiamo a definire order che prenderemo dalla query con $request->query('order') ?? 'asc' e con il codiscing operator andremo a dare un default -->
<!-- in post list nella chiamata andremo ad aggiungere un parametro order &order=${this.order} che in data andremo a definire dando un default  order: "desc", -->
<!-- andiamo a creare un btn che con il metodo @click="toggleOrder() chiamerà la funzione che cambiera asc in desc o viceversa e rifarà la chiamata poi blindando la classe e con il ternario faremo vedere o meno un colore in base al valore attuale di order -->

\|
\|
\|
\|
\|
\|
\|
\|

<!-- ? Seeders -->
<!-- i seeders  servono per popolare in automatico le tabelle -->
<!-- possiamo creare tanti seeder quante sono le tabelle  -->
<!-- con il comando php artisan make:seeder NomedellatabellaTableSeeder -->
<!-- php artisan make:seeder PostsTableSeeder ---- avviato questo comando creato file in database/seeds-->
<!-- nel file seeder/PostsTableSeeder creeremo la logica per la creazione dei record sul db (le tuple)-->
<!-- possiamo partire da un un array associativo per i dati (in questo caso dati per la creazione dei nostri post) che conterranno title , content, image, slug  -->
<!-- giriamo sul nostro array e instanziamo un nuovo Post assegniamo i valori in base alle colonne o a mano o con fill ( bisogna poi impostare i parametri fillable nel model ) -->
<!-- una volta creato per avviare il seeder facciamo partire il comando : 'php artisan db:seed --class=PostsTableSeeder ' -->
<!-- in DatabaseSeeder possiamo elencare tutti i nostri seeder e in una volta sola cliamarli tutti insieme con lo stesso comando di prima ma senza la --class -->
<!-- # per vuotare tutto il db e resettare tutte le tuple di tutto il db usiamo php artisan migrate:refresh  -->
<!-- * andiamo a creare un seeder per l'utente per evitare che quando facciamo il refresh dobbiamo andare a rifare la registrazione d'accapo  -->
<!-- creiamo il seeder php artisan make:seeder UsersTableSeeder -->
<!-- importiamo l'utente instanziamo il nuovo utente e andiamo a creare i campi di riempimento  name email e psw alla quale aggiungeremo la funzione bcrypt per la criptazione -->
<!-- aggiungiamo l'utente al database seeder per farlo prendere al momento del refresh -->

<!-- ? FAKER -->
<!-- in laravel possiamo creare dei dati fake ma plausibili per popolare il nostro db di dati verosimili per lo sviluppo  -->
<!-- bisogna disinstallare il vecchio pacchetto di fzaninotto installato di serie con :' composer remove fzaninotto/faker' ed installare il nuovo con :'composer require fakerphp/faker' -->
<!-- importiamo il 'modello faker' use Faker\Generator as Faker; e impostimao la funzione run come primo parametro dicendogli di usare la classe Faker e tutti i suoi metodi -->
<!-- non avendo più un array di riferimento useremo un ciclo for per dire quante tuple creare per riempire i dati  -->
<!-- passiamo i parametri prendendoli dalla docs di faker php  -->
<!-- inseriamo il parametro str del metodo string per lo slug (lo inseriamo noi ) -->
<!-- lanciamo il comando per il seed -->

<!-- ? validation -->
<!-- le validazioni le facciamo nei campi di interazione con la persona fisica che utilizza l'applicativo percio nel nostro caso lo faremo dove ci sono i form ( in store e in update) -->
<!-- prendiamo con $request i dati provenienti dal form e con il valore del campo di input facciamo le nostre validazioni  -->
<!-- se non viene passata una validazione si vieni rendirizzati verso la stessa pagina da dove è partita kla richiesta ma con l'agiunta della errorsbag che andremo a leggere con $errors nella stessa pagina -->
<!-- creiamo un if dove vedremo se c'è una proprietà nella pg con $errors e creiamo un allert per leggere gli errori  -->
<!-- possiamo customize i messaggi di errore sia per tipo sia per tipo specifico in un dato input   -->
<!-- apriamo un array di seguito alla validazione nel Post controller ' von i : possiamo prendere alcuni valori nel campo di appartenenza '-->
<!-- in edit che abbiamo la situazione dove modificando i dati potremo avere la necessità di baypassare la validazione unique essendo che non modifichiamo obbligatoriamente un campo che dovrebbeessere unico  -->
<!-- nella validazione lato controller update andremo a modificare la stringa del campo unique e creando un array andremo a dettare alcune regole per far saltare il controllo alla tuple con l'id che stiamo modificando -->
<!-- sostituiamo la stringa del tipo di controllo inserendo la classe Rule:: (Rule::unique('posts')->ignore($post->id))  Rule ovviamente va importata nel controller-->
<!-- andiamo nei campi del form ed aggiungiamo old per evitare che in caso di errore si refreschi il valore inserito precedentemente -->
<!-- aggiungiamo l'errore sotto il campo oggetto dell'errore e stampiamo l'errore ... grazie a bootstrap usiamo le classi css e la logica per vedere se c'è un errore  @error('title')   @enderror  controlla se c'è un errore nel campo title   con la classe invalid-feedback(bootstrap) mettiamo un div che in caso venga scritta la classe is invalid 'il che vuol dire se ha trovato un errore' farà apparire il div nella quale scriveremo l'errore -->

\|
\|
\|
\|
\|
\|
\|
\|

<!-- % RELAZIONI TRA LE TABELLE -->
<!-- dobbiamo andare a creare una relazione tra le varie tabelle  -->
<!-- le relazioni tra tabelle si hanno unendo in una tabella una foreign key dell'altra -->
<!-- !1 creare la colonna nel db  -->
<!-- !2 specificare la relazione nel modello   -->
<!-- #relazione uno a molti -->
<!-- one to many: nel nostro caso nella relazione tra post e utenti un utente avrà molti post ma i post un solo utente perciò è una relazione uno(utente || forte'che può esistere da solo') a molti(post ||debole 'esiste solo se legato con un utente')
, sia l'utente che i post avranno una loro tabella con i vari dati e gli id , per creare una relazione andremo a relazionare l'id dell'utente ai molti id della tabella che di conseguenza prenderà la foren key (l'id principale'del creatore' della dipendenza ) del'utente -->
<!-- per agiungere una foreign key ad una tabella già esistente abbiamo bisogno di una migration '-->
<!-- con laravel andremo a creare una migration con una colonna di tipo $table->unsignedBigInteger('user_id') e poi creeremo la relazione (VINCOLO)  l'id , $table->foreign('user_id')->reference('id)->on('user_id') che si traduce in "all'interno di questa migration che fa riferimento alla tabella posts aggiungi una colonna user_id(" $table->unsignedBigInteger('user_id')") e poi gli diciamo : questa migration contiene una foreign key  che sarebbe user id ( $table->foreign('user_id')) che fa riferimento all'id ("reference('id)") contenuto nella tabella users (on('user_id')), se seguiamo le convenzioni possiamo usare al posto delle 2 operazioni separate : $table->foreingn('user_id')->constraind()  -->
<!-- nella cancellazione (roll back) dovremo prima togliere il vincolo e poi eliminare la tabella nel db  -->
<!-- queste relazioni non saranno solo a livello tabellare (database) ma anche a livello modelli  -->
<!-- come abbiamo detto prima le relazioni sono bidirezionali cioè l' user è relazionato con i post (uno a molti ) e il post lo è con l'user (uno ad uno) -->
<!-- % model  -->
<!-- nel modello andremo a definire la relazione creando un metodo specifico ritornando la relazione con la tabella -->
<!-- nel nostro caso la predominante sarà user(uno) e la secondaria sarà posts(molti) -->
<!-- nel model di user avremo hasMany() :  Class User extends Model { public function posts(){ return $this->hasMany('App\Post')}} -->
<!-- nel model di post avremo belongsTo() :  Class Post extends Model { public function user(){ return $this->belongsTo('App\User')}} -->
<!-- #relazione diretta uno a uno  -->
<!-- user con info_user(dati specifici dell'utente) -->
<!-- nella relazione uno ad uno  ci sarà sempre una predominante(principale) rispetto all'altra , nel nostro caso il modello principale sarà user e il secondario sarà user info perche un utente può esistere senza delle info specifiche ma le info non possono esistere senza un utente -->
<!-- nel modello della predominante andremo a creare una funzione (metodo) pubblica/o nel quale andremo a restituire il tipo di relazione hasOne() e che avrà come nome della funzione il nome del modello secondario in camel case : Class User extends Model { public function UserInfo(){ return $this->hasOne('App\UserInfo')}} -->
<!-- nel modello secondario andremo a fare la stessa cosa ma la relazione sarà belongTo()    : Class UserInfo extends Model { public function user(){ return $this->belongsTo('App\User')}} -->
