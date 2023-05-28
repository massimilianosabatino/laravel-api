# Laravel API - Backend per progetto Boolfolio
Progetto backend per applicazione Vue "Vite-Boolfolio", sito portfolio personale.  
Il progetto prevede una dashboard alla quale si può accedere previa registrazione utente.  
Nella dashboard è presente un feed con le ultime 3 notizie pubblicate sul sito laravel-news.com, un contatore dei progetti e una parte relativa alle statistiche, come ad esempio quale categoria ha più progetti.  
Inoltre sono presenti dei bottoni per l'accesso rapido alle funzioni principali, come la crazione di un nuovo progetto.  
Sono state realizzate le CRUD per i progetti, le categorie e le tecnologie, quindi è possibile gestire liberamente la creazione, la modifica e la cancellazione.  
Per ogni progetto è possibile inserire:  
- Un titolo
- Una cover (è possibile inserirla tramite link o tramite upload di un file immagine)
- Una descrizione
- La categoria (a scelta tra quelle disponibili)
- Le tecnologie utilizzate (a scelta tra quelle disponibili)
- Impostare lo stato di privato sui progetti

È disponibile una pagina contenente l'elenco completo dei progetti, inoltre è possibile visualizzare un elenco dei progetti non marcati come privati anche senza registrazione.  

Oltre a queste funzionalità il sistema risponde anche tramite API, restituendo in formato JSON, l'elenco completo dei progetti o il singolo progetto ricercato tramite id.

## Tecnologie
- HTML + CSS
- Laravel + Blade
- MySql
- Dbal
- Axios
- Scss
- Bootstrap
### Istruzioni
Per inizializzare l'ambiente di sviluppo Laravel:
Configurare nel file `.env`   
- I dati di accesso al database 
- Modificare il valore di `FILESYSTEM_DISK` in `public`
- Creare symlink alla cartella storage in `public` tramite il comando `php artisan storage:link`
- Aggiungere la chiave `APP_FRONTEND_DOMAIN` e inserire il dominio per l'accesso tramite API (CORS Policy). Ad es. "https://my.domine.com"
- Eseguire il comando `composer install` per installare tutti i pacchetti necessari
- Generare la App key con il comando `php artisan key:generate`
- Inizializzare il database e popolarlo con dei dati fittizi tramite il comando `php artisan migrate --seed`
- Avviare il server con `php artisan serve`

Per inizializzare l'ambiente di sviluppo Vue:
- `npm install`
- `npm run dev`

### TODO
- Possibilità di creare nuove categorie direttamente durante la creazione di un progetto
- Possibilità di creare nuove tecnologie direttamente durante la creazione di un progetto
- Filtro categorie e technologie
- Restituire al frontend, solamente i progetti marcati come pubblici
- Aggiungere un sistema di controllo accessi per recuperare elenco completo progetti (inclusi i privati)
- utilizzare slug per singolo progetto al posto dell'id
- realizzare grafica uniforme
- aggiungeri galleria immagine per singolo progetto
- aggiungere footer
- Modificare feed rss per inserire più url
- Aggiungere possibilità di modifica gestione feed tramite interfaccia utente
- Migliorare gestione errori feed
- Cambiare modalità di visualizzazione contenuto della descrizione nel feed

### Laravel 9 + Bootstrap Template + Auth
Questo projetto è stato realizzato con una versione modificata del pacchetto `laravel/laravel`. Tale versione differisce nei seguenti punti:

- È stato installato Laravel / Breeze e rivista la parte di gestione login / registrazione / recupero password in ottica bootstrap / sass.
- `PostCSS` è stato rimosso
- È stato installato `SASS`
- È stato installato `Bootstrap`
- La cartella `resources/css` è stata rimossa
- È stata aggiunta la cartella `resources/scss` contenente il file `app.scss`
- Il file `vite.config.js` è stato modificato al fine di includere i file `resources/scss/app.scss` e `resources/js/app.js` nella compilazione. Sono stati inoltre aggiunti gli alias per le cartelle `/resources/` e `node_modules/bootstrap`

