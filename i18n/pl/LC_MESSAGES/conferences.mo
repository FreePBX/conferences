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
   �     �     �     �     �  T   �     4  [   G     �  �   �  �   �  Y        x     �     �      �     �  �  �  
   �     �     �     �  l   �  �   a  >     	   L     V     h     t     �     �     �     �     �     �              '   '      O      U      Z      _      q   M   x   �   �      �!  +   �!  M   �!     4"  
   O"     Z"  %   p"     �"     �"     �"     �"     �"  O   �"     ##     B#  �   W#     �#  &  �#     &%     9%     R%  �   Z%     ;&     T&  
   X&     c&     j&     �&     �&     �&     �&  )   �&  1   �&  �   ('  Z   �'  
   (  ?   (     O(  !   c(  k  �(     �)  ^  �)  
   Y+     d+     y+  �  �+  A   V-  �   �-     G.     T.  C  n.  �  �/  ;   @1     |1     �1  !   �1     �1     �1  c   �1     D2  {   d2     �2  8  �2  �   4  b   �4  	   %5     /5  
   @5  "   K5  &   n5     =         )   S   T      .   *   '      ^       A   @   ;       X               F      Z              >   Y   R             U      8       /       2          a             +          b         D      	          #   P   ,   C   E   5      K   V           W   0      [                                              (   9   "   <   6   _   H   1           G   -       M   &   \   %       J      I          L              N   O   !       3   ]   :   4      7   B   `   Q   ?   $               
    Actions Add Admin PIN Allow Menu Allow creation of conference rooms where multiple people can talk together Announce user join/leave. If enabled this will require the user to record their name before joining the conference Announce user(s) count on joining conference Applications Conf Number Conference Conference Name Conference Number Conference Number is missing. Conference Room %s : %s Conference Status Conference number used. Conference:  Conference: %s Conferences Conflicting Extensions Delete Description Desctiption Desctiption of the conference. Edit Enable Music On Hold when the conference has a single caller Enter a PIN number for the admin user.<br><br>This setting is optional unless the 'leader wait' option is in use, then this PIN will identify the leader.<br>This pin should be different than the user pin. Extension Force Allow Conference Recording Give this conference a brief name to help you identify it. Import/Export Conferences Inherit Join Message Join message id. Language Language. Leader Leave Leader Wait List Conferences Maximum Number of users allowed to join this conference. Maximum Participants Member Timeout Message to be played to the caller before joining the conference.<br><br>To add additional recordings please use the "System Recordings" MENU above Music Music (or Commercial) played to the caller while they wait in line for the conference to start. Choose "inherit" if you want the MoH class to be what is currently selected, such as by the inbound route.<br><br>  This music is defined in the "Music on Hold" above. Music on Hold Music on Hold Class Music. Mute everyone when they initially join the conference. Please note that if you do not have 'Leader Wait' set to yes you must have 'Allow Menu' set to Yes to unmute yourself Mute on Join No No Limit None Option of the Conference is missing. Option of the Conference. Options PIN code for admin. PIN code for user. Please enter a valid Conference Name Please enter a valid Conference Number Please note depending on hardware and settings a higher limit may cause call quality issues. Present Menu (user or admin) when '*' is received ('send' to menu) Quiet Mode Quiet mode (do not play enter/leave sounds) Record Conference Record the conference call Record the conference call. Note: This is broken when using %s or lower, and is therefore disabled. Enable "Force allow conference recording" under Advanced settings to override this. The Recording will not be available in either the CDR nor in Call Recordings and has to be downloaded by logging into the backend. Reset Sets talker detection. Asterisk will send events on the manager interface identifying the channel that is talking. The talker will also be identified on the output of the conference list CLI command. Note: If Conferences Pro is installed and licensed this will always be enabled Submit Talker Detection Talker Optimization The language for the conference. If set to inherit or blank the language will be inherited from the first person who joins the conference esentially making the language of this conference dynamic. After the first person has joined the language can not be changed until all users have left the conference. If you set a value here the langauge will be forced irregardless of what language users have set The user and admin can not have the same pin code. This specifies the number of seconds that the participant may stay in the conference before being automatically ejected. 0 = disabled, default is 21600 (6 hours) Timeout Timeout of the conference. Turns on talker optimization. With talker optimization, Asterisk treats talkers who are not speaking as being muted, meaning that no encoding is done on transmission and that received audio that is not registered as talking is omitted, causing no buildup in background noise. Until Asterisk 14+ a random timestamp would be added to the end of the conference call recording which could not be determined in post call handling. Thus enabling conference call recording is disabled if using Asterisk 13 or lower. Enable this option to allow Conference Call recording to be enabled in Astrisk 13 or lower Use this number to dial into the conference. User Count User PIN User join/leave Users Users. Wait until the conference leader (admin user) arrives before starting the conference Warning! Extension When the conference leader (admin user) leaves all users will be kicked from the conference Yes You can require callers to enter a password before they can enter this conference.<br><br>This setting is optional.<br><br>If either PIN is entered, the user will be prompted to enter a PIN.<br> This pin should be different than the Admin pin You must set Allow Menu to Yes when not using a Leader or Admin in your conference, otherwise you will be unable to unmute yourself You must set an admin PIN for the Conference Leader when selecting the leader wait option default description is blank. inherit is not allowed for your account. join message id Project-Id-Version: Polish (FreePBX)
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2023-12-13 01:39+0000
PO-Revision-Date: YEAR-MO-DA HO:MI+ZONE
Last-Translator: FULL NAME <EMAIL@ADDRESS>
Language-Team: Polish <http://weblate.freepbx.org/projects/freepbx/conferences/pl/>
Language: pl
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=3; plural=n==1 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2;
X-Generator: Weblate 3.0.1
 Działania Dodaj PIN administratora Menu zezwoleń Zezwalaj na tworzenie pokojów konferencyjnych, w których wiele osób może prowadzić jednoczesne dyskusje Ogłoś dołączenie/odejście użytkownika. Jeśli ta opcja jest włączona, użytkownik będzie musiał wypowiedzieć imię i nazwisko przed dołączeniem do konferencji Ogłoś liczbę użytkowników dołączających do konferencji Aplikacje Numer konferencji Konferencja Nazwa konferencji Numer konferencji Brak numeru konferencji. Pokój konferencyjny %s : %s Status konferencji Używany numer konferencji. Konferencja:  Konferencja: %s Konferencje Numery wewnętrzne powodujące konflikt Usuń Opis Opis Opis konferencji. Edytuj Włącz muzykę na czekanie, gdy w konferencji bierze udział jeden rozmówca Wprowadź numer PIN administratora.<br><br>To ustawienie jest opcjonalne, chyba że używana jest opcja „czekaj na lidera”, wtedy ten PIN będzie identyfikować lidera.<br>Ten PIN powinien być inny niż PIN użytkownika. Numer wewnętrzny Wymuś zezwolenie na nagrywanie konferencji Nadaj tej konferencji krótką nazwę, która pomoże Ci ją zidentyfikować. Import/eksport konferencji Odziedzicz Wiadomość powitalna Identyfikator wiadomości powitalnej. Język Język. Lider opuścił Lider czeka Lista konferencji Maksymalna liczba użytkowników, którzy mogą dołączyć do tej konferencji. Maksymalna liczba uczestników Limit czasu członka Wiadomość do odtworzenia dzwoniącemu przed dołączeniem do konferencji.<br><br>Aby dodać dodatkowe nagrania skorzystaj z MENU "Nagrania systemowe" powyżej Muzyka Muzyka (lub reklama) odtwarzana dzwoniącemu podczas oczekiwania w kolejce na rozpoczęcie konferencji. Wybierz opcję „Dziedzicz”, jeśli chcesz, aby klasa MoH była aktualnie wybrana, np. trasa przychodząca.<br><br> Ta muzyka jest zdefiniowana w sekcji „Muzyka na czekanie” powyżej. Muzyka na czekanie Klasa Muzyki na czekanie Muzyka. Wycisz wszystkich, którzy dołączają do konferencji. Pamiętaj, że jeśli nie masz ustawionej opcji „Przywódca czekania” na „tak”, musisz mieć opcję „Zezwalaj menu” na „Tak”, aby wyłączyć wyciszenie Wycisz przy dołączeniu Nie Bez limitu Żaden Brakuje opcji Konferencji. Opcja konferencji. Opcje PIN dla administratora. PIN dla użytkownika. Wprowadź prawidłową nazwę konferencji Proszę wprowadzić prawidłowy numer konferencji Należy pamiętać, że w zależności od sprzętu i ustawień wyższy limit może powodować problemy z jakością połączeń. Obecne menu (użytkownika lub administratora) po odebraniu „*” („wyślij” do menu) Tryb cichy Tryb cichy (nie odtwarzaj dźwięków dołączenia/opuszczenia) Nagraj konferencję Nagraj połączenie konferencyjne Nagraj połączenie konferencyjne. Uwaga: ta funkcja nie działa, gdy używasz %s lub starszego i dlatego jest wyłączona. Aby zastąpić tę opcję, włącz opcję „Wymuś zezwolenie na nagrywanie konferencji” w menu Ustawienia zaawansowane. Nagranie nie będzie dostępne ani w CDR, ani w Nagraniach rozmów i należy je pobrać, logując się do backendu. Zresetuj Ustawia wykrywanie rozmówcy. Asterisk będzie wysyłać zdarzenia do interfejsu menedżera, identyfikując kanał, z którym się łączy. Osoba mówiąca zostanie również zidentyfikowana na wyjściu polecenia CLI listy konferencji. Uwaga: jeśli aplikacja Konferencje Pro jest zainstalowana i posiada licencję, opcja ta będzie zawsze włączona Zatwierdź Wykrywanie rozmówcy Optymalizacja rozmówcy Język konferencji. Jeśli ustawisz opcję dziedziczenia lub pustą, język zostanie odziedziczony od pierwszej osoby, która dołączy do konferencji, co zasadniczo sprawi, że język tej konferencji będzie dynamiczny. Po dołączeniu pierwszej osoby nie można zmienić języka, dopóki wszyscy użytkownicy nie opuszczą konferencji. Jeśli ustawisz tutaj wartość, język zostanie wymuszony niezależnie od tego, jaki język ustawili użytkownicy Użytkownik i administrator nie mogą mieć tego samego kodu PIN. Określa liczbę sekund, przez jaką uczestnik może pozostać w konferencji, zanim zostanie automatycznie wyrzucony. 0 = wyłączone, wartość domyślna to 21600 (6 godzin) Koniec czasu Koniec czasu konferencji. Włącza optymalizację rozmówcy. Dzięki optymalizacji rozmówcy Asterisk traktuje rozmówców, którzy nie mówią, jako wyciszonych, co oznacza, że podczas transmisji nie jest wykonywane żadne kodowanie, a odebrany dźwięk, który nie jest zarejestrowany jako rozmowa, jest pomijany, dzięki czemu nie ma szumu tła. Do wersji Asterisk 14+ na końcu nagrania połączenia konferencyjnego dodawany był losowy znacznik czasu, którego nie można było określić podczas obsługi po połączeniu. Dlatego włączenie nagrywania rozmów konferencyjnych jest wyłączone, jeśli używasz Asterisk 13 lub niższej. Włącz tę opcję, aby umożliwić nagrywanie rozmów konferencyjnych w wersji Astrisk 13 lub starszej Zadzwoń na ten numer, aby połączyć się z konferencją. Liczba użytkowników PIN użytkownika Użytkownik dołączył/opuścił Użytkownicy Użytkownicy. Przed rozpoczęciem konferencji poczekaj, aż twórca/lider konferencji (administrator) przybędzie Ostrzeżenie! Numer wewnętrzny Kiedy twórca/lider konferencji (administrator) opuści konferencję, wszyscy użytkownicy zostaną wyrzuceni z konferencji Tak Możesz wymagać od rozmówców wprowadzenia kodu PIN przed dołączeniem do tej konferencji.<br><br>To ustawienie jest opcjonalne.<br><br>Jeśli zostanie wprowadzony którykolwiek PIN to użytkownik zostanie poproszony o wprowadzenie kodu PIN.<br> Kod PIN użytkownika powinien być inny niż PIN administratora Musisz ustawić Zezwól na Menu jeśli w Twojej konferencji nie ma Lidera ani Administratora, w przeciwnym razie nie będziesz mógł wyłączyć swojego wyciszenia Wybierając opcję oczekiwania na lidera musisz ustawić PIN administratora dla Lidera Konferencji domyślny opis jest pusty. odziedzicz jest niedozwolone na Twoim koncie. Identyfikator wiadomości dołączenia 