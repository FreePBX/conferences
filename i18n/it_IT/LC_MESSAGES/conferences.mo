��    b      ,  �   <      H     I     Q  	   U  
   _  J   j  r   �  ,   (	     U	     b	  
   n	     y	     �	     �	     �	     �	     �	     �	     
     
     #
     :
     A
     M
     Y
     x
  <   }
  �   �
  	   �      �  :   �     �                    -  	   6     @     M     Y  8   j     �     �  �   �     [    a     i     w     �  �   �     ?     L     O     X  $   ]     �     �     �     �  $   �  &   �  \     B   t  
   �  +   �     �        :       V    \     s     z     �  �  �  2   1  �   d              )  C  =  ,   �  
   �     �     �     �     �  T   �     4  [   G     �  �   �  �   �  Y        x     �     �      �     �  �  �     �     �     �     �  S   �  �   D  @   �          (     8     A     O     _          �     �  
   �     �     �     �     �     �                 #   ?   ,     l      q!  %   y!  ?   �!  "   �!     "     
"      "     >"     E"     M"     _"     n"  7   �"     �"     �"  �   �"     �#  '  �#     �$     �$     �$  �   �$     �%     �%     �%     �%      �%     &     &     &     7&  '   J&  )   r&  q   �&  P   '     _'  N   t'     �'     �'  _  �'  
   J)  /  U)     �*     �*     �*  �  �*  @   �,  �   �,     �-     �-  M  �-  �  �.  6   �0     �0  
   �0     �0     �0     �0  K   1     N1  m   d1     �1     �1  �   �2  }   �3     4     %4     >4  %   F4     l4     =         )   S   T      .   *   '      ^       A   @   ;       X               F      Z              >   Y   R             U      8       /       2          a             +          b         D      	          #   P   ,   C   E   5      K   V           W   0      [                                              (   9   "   <   6   _   H   1           G   -       M   &   \   %       J      I          L              N   O   !       3   ]   :   4      7   B   `   Q   ?   $               
    Actions Add Admin PIN Allow Menu Allow creation of conference rooms where multiple people can talk together Announce user join/leave. If enabled this will require the user to record their name before joining the conference Announce user(s) count on joining conference Applications Conf Number Conference Conference Name Conference Number Conference Number is missing. Conference Room %s : %s Conference Status Conference number used. Conference:  Conference: %s Conferences Conflicting Extensions Delete Description Desctiption Desctiption of the conference. Edit Enable Music On Hold when the conference has a single caller Enter a PIN number for the admin user.<br><br>This setting is optional unless the 'leader wait' option is in use, then this PIN will identify the leader.<br>This pin should be different than the user pin. Extension Force Allow Conference Recording Give this conference a brief name to help you identify it. Import/Export Conferences Inherit Join Message Join message id. Language Language. Leader Leave Leader Wait List Conferences Maximum Number of users allowed to join this conference. Maximum Participants Member Timeout Message to be played to the caller before joining the conference.<br><br>To add additional recordings please use the "System Recordings" MENU above Music Music (or Commercial) played to the caller while they wait in line for the conference to start. Choose "inherit" if you want the MoH class to be what is currently selected, such as by the inbound route.<br><br>  This music is defined in the "Music on Hold" above. Music on Hold Music on Hold Class Music. Mute everyone when they initially join the conference. Please note that if you do not have 'Leader Wait' set to yes you must have 'Allow Menu' set to Yes to unmute yourself Mute on Join No No Limit None Option of the Conference is missing. Option of the Conference. Options PIN code for admin. PIN code for user. Please enter a valid Conference Name Please enter a valid Conference Number Please note depending on hardware and settings a higher limit may cause call quality issues. Present Menu (user or admin) when '*' is received ('send' to menu) Quiet Mode Quiet mode (do not play enter/leave sounds) Record Conference Record the conference call Record the conference call. Note: This is broken when using %s or lower, and is therefore disabled. Enable "Force allow conference recording" under Advanced settings to override this. The Recording will not be available in either the CDR nor in Call Recordings and has to be downloaded by logging into the backend. Reset Sets talker detection. Asterisk will send events on the manager interface identifying the channel that is talking. The talker will also be identified on the output of the conference list CLI command. Note: If Conferences Pro is installed and licensed this will always be enabled Submit Talker Detection Talker Optimization The language for the conference. If set to inherit or blank the language will be inherited from the first person who joins the conference esentially making the language of this conference dynamic. After the first person has joined the language can not be changed until all users have left the conference. If you set a value here the langauge will be forced irregardless of what language users have set The user and admin can not have the same pin code. This specifies the number of seconds that the participant may stay in the conference before being automatically ejected. 0 = disabled, default is 21600 (6 hours) Timeout Timeout of the conference. Turns on talker optimization. With talker optimization, Asterisk treats talkers who are not speaking as being muted, meaning that no encoding is done on transmission and that received audio that is not registered as talking is omitted, causing no buildup in background noise. Until Asterisk 14+ a random timestamp would be added to the end of the conference call recording which could not be determined in post call handling. Thus enabling conference call recording is disabled if using Asterisk 13 or lower. Enable this option to allow Conference Call recording to be enabled in Astrisk 13 or lower Use this number to dial into the conference. User Count User PIN User join/leave Users Users. Wait until the conference leader (admin user) arrives before starting the conference Warning! Extension When the conference leader (admin user) leaves all users will be kicked from the conference Yes You can require callers to enter a password before they can enter this conference.<br><br>This setting is optional.<br><br>If either PIN is entered, the user will be prompted to enter a PIN.<br> This pin should be different than the Admin pin You must set Allow Menu to Yes when not using a Leader or Admin in your conference, otherwise you will be unable to unmute yourself You must set an admin PIN for the Conference Leader when selecting the leader wait option default description is blank. inherit is not allowed for your account. join message id Project-Id-Version: 2.5
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2021-06-23 05:15+0000
PO-Revision-Date: 2020-11-18 13:00+0000
Last-Translator: Danilo Smaldone <dsmaldone@sangoma.com>
Language-Team: Italian <http://weblate.freepbx.org/projects/freepbx/conferences/it/>
Language: it_IT
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: Weblate 3.0.1
X-Poedit-Language: Italian
X-Poedit-Country: ITALY
 Azioni Aggiungi PIN Amministratore Menu consenti Consenti la creazione di tanze Riunioni in cui più persone possono parlare insieme Annuncia l'utente che si unisce / abbandona. Se abilitato, si richiederà all'utente di registrare il proprio nome prima di partecipare alla Riunione Comunica il numero di utenti quando si partecipa ad una Riunione Applicazioni Numero Riunione Riunione Nome Riunione Numero Riunione Manca il numero della Riunione. Riunione %s: %s Stato Riunione Numero Riunione usato. Riunione:  Conferenza: %s Riunioni Interni in conflitto Elimina Descrizione Descrizione Descrizione Riunione. Modifica Attiva Musica di Attesa quando solo un utente è nella Riunione Inserisci un codice PIN per l' amministratore.<br><br> Si tratta di un' impostazione facoltativa, a meno che non sia in uso l'opzione 'Attesa Leader' nel quale caso il PIN identificherà il leader. <br> Questo PIN dovrebbe essere diverso da quello dell'utente. Interno Forza Consenti registrazione Riunione Dai alla Riunione un nome breve per una facile identificazione. Importazione/Esportazione Riunioni Eredita Messaggio all'Accesso Id del messaggio all'Accesso. Lingua Lingua. uscita del Leader Attendi leader Elenco delle Riunioni Numero massimo di utenti consentiti in questa Riunione. Massimo partecipanti Timeout di un membro Messaggio da riprodurre al chiamante prima di partecipare alla Riunione.<br><br>Per aggiungere ulteriori messaggi, utilizzare il "MENU delle Registrazioni di Sistema" in alto Musica La musica (o annunci publicitari) riprodotti al chiamante mentre in attesa dell'inizio della Riunione. Scegli "eredita" se vuoi che la classe MoH sia quella attualmente selezionata, ovvero quella dalla rotta in entrata.<br><br>Questa informazione è definita nel menù "Musica d'attesa" in alto. Musica di attesa Categoria Musica in attesa Musica. Disattiva audio per tutti quando si partecipa inizialmente alla conferenza. Se non si è impostato 'Leader Wait' su Si, è necessario avere 'Allow Menu' impostato su Si per riattivare l'audio Muto all'Accesso No Senza limiti Nessuno Manca l'opzione per la Riunione. Opzione Riunione. Opzioni Codice PIN Amministratore. Codice PIN Utente. Definire un Nome valido per la Riunione Definire un Numero valido per la Riunione A seconda dell'hardware e delle impostazioni, un valore elevato può causare problemi di qualità delle chiamate. Presenta il menu (Utente o Amministratore) quando si preme '*' ('invia' al menu) Modalità silenziosa Modalità silenziosa (non riproduce suoni quando si entra/esce dalla Riunione) Registra Riunione Registra la Riunione Registra la Riunione. Nota: questo non funziona se si usa il valore %s1 o inferiore e viene quindi disabilitato. Abilita "Forza Consenti  registrazione della Riunione" in Impostazioni avanzate per sovrascriverlo. La registrazione non sarà disponibile né nel CDR né nelle registrazioni delle chiamate e dovrà essere scaricata accedendo al back-end. Ripristina Imposta il rilevamento di chi parla. Asterisk invierà eventi sull'interfaccia manager per identificare il canale attivo. Colui che parla verrà mostrato anche sull'output del comando CLI relativo all'elenco delle Riunioni. Nota: Se Conferences Pro è installato ed attivo, questo sarà sempre abilitato Invia Rileva chi parla Ottimizza chi parla La lingua usata per la Riunione. Se impostato su eredita o nullo, la lingua verrà scelta concordemente con quella della prima persona che partecipa alla conferenza di modo che la lingua di questa conferenza sia dinamica. Dopo l'accesso della prima persona, la lingua  non può essere modificata finché tutti gli utenti non hanno abbandonato la Riunione. Se si imposta un valore qui, la lingua verrà forzata non considerando quella lingua impostata dagli utenti partecipanti Utente ed Amministratore non possono avere lo stesso codice PIN. Specifica il numero di secondi per cui il partecipante può rimanere nella conferenza prima di essere espulso automaticamente. 0 = disabilitato, impostazione predefinita è 21600 (6 ore) Timeout Timeout per la Riunione. Attiva l'ottimizzazione audio di chi parla. Con l'ottimizzazione attiva, Asterisk considera i partecipanti non in conversazione come silenziati, il che significa che non viene eseguita alcuna codifica in trasmissione e che tale audio ricevuto che non è registrato come valido viene omesso, eliminando eventuali rumori di sottofondo. Fino ad Asterisk 14+ un timestamp casuale veniva aggiunto alla fine della registrazione della Riunone che non poteva essere determinato ed usato nella successiva gestione della chiamata. Per questo motivo, la registrazione dell'audio delle Riunioni è disabilitata se si utilizza Asterisk 13 o inferiore. Abilitare questa opzione per consentire la registrazione della Riunioni per Asterisk 13 o inferiori Utilizzare questo numero per accedere alla conferenza. Numero Utenti PIN Utente Accesso/Uscita Utente Utenti Utenti. Attendi l'arrivo dell'Amministratore (leader) prima di iniziare la Riunione Attenzione! L'interno Quando il leader della Riunione (utente Amministratore) la abbandona, tutti gli altri utenti verranno espulsi Sì Puoi richiedere ai partecipanti di inserire una password prima di poter accedere alla Riunione. <br><br>Questa impostazione è facoltativa. <br><br>Se viene inserito uno dei due PIN, all'utente verrà chiesto di inserire un PIN. > Questo pin dovrebbe essere diverso dal PIN Amministratore È necessario impostare Consenti Menu su Sì quando non si utilizza un leader o un Amministratore nella Riunione, altrimenti non sarà possibile riattivare l'audio È necessario impostare un PIN amministratore per il leader della Riunione quando si seleziona l'opzione di attesa del leader predefinito la descrizione è vuota. eredita non è consentito per il tuo account. Id messaggio ingresso 