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
   �     �     �     �     �  T   �     4  [   G     �  �   �  �   �  Y        x     �     �      �     �  �  �     �     �     �     �  ]   �  �     8   �     �     �  	   �     �               3     I     Y     u     �     �     �     �     �     �     �  
   �  O   �  �   J      G!     S!  _   s!  #   �!     �!     �!  .   "     E"     M"     V"     b"     t"  I   �"     �"  #   �"  �   #     �#  %  �#     �$     %     %  �   "%     	&     &&  
   +&     6&  "   =&     `&     {&     �&     �&  ,   �&  +   �&  {   '  P   �'  	   �'  4   �'     (     ((  �  C(     �)  W  �)     -+     6+     H+  �  \+  ?   J-  �   �-  	   N.  "   X.  `  {.  �  �/  >   k1     �1     �1     �1     �1  	   �1  T   �1     K2  r   `2     �2  #  �2  �   �3  v   �4     35     <5     P5  !   V5  /   x5     =         )   S   T      .   *   '      ^       A   @   ;       X               F      Z              >   Y   R             U      8       /       2          a             +          b         D      	          #   P   ,   C   E   5      K   V           W   0      [                                              (   9   "   <   6   _   H   1           G   -       M   &   \   %       J      I          L              N   O   !       3   ]   :   4      7   B   `   Q   ?   $               
    Actions Add Admin PIN Allow Menu Allow creation of conference rooms where multiple people can talk together Announce user join/leave. If enabled this will require the user to record their name before joining the conference Announce user(s) count on joining conference Applications Conf Number Conference Conference Name Conference Number Conference Number is missing. Conference Room %s : %s Conference Status Conference number used. Conference:  Conference: %s Conferences Conflicting Extensions Delete Description Desctiption Desctiption of the conference. Edit Enable Music On Hold when the conference has a single caller Enter a PIN number for the admin user.<br><br>This setting is optional unless the 'leader wait' option is in use, then this PIN will identify the leader.<br>This pin should be different than the user pin. Extension Force Allow Conference Recording Give this conference a brief name to help you identify it. Import/Export Conferences Inherit Join Message Join message id. Language Language. Leader Leave Leader Wait List Conferences Maximum Number of users allowed to join this conference. Maximum Participants Member Timeout Message to be played to the caller before joining the conference.<br><br>To add additional recordings please use the "System Recordings" MENU above Music Music (or Commercial) played to the caller while they wait in line for the conference to start. Choose "inherit" if you want the MoH class to be what is currently selected, such as by the inbound route.<br><br>  This music is defined in the "Music on Hold" above. Music on Hold Music on Hold Class Music. Mute everyone when they initially join the conference. Please note that if you do not have 'Leader Wait' set to yes you must have 'Allow Menu' set to Yes to unmute yourself Mute on Join No No Limit None Option of the Conference is missing. Option of the Conference. Options PIN code for admin. PIN code for user. Please enter a valid Conference Name Please enter a valid Conference Number Please note depending on hardware and settings a higher limit may cause call quality issues. Present Menu (user or admin) when '*' is received ('send' to menu) Quiet Mode Quiet mode (do not play enter/leave sounds) Record Conference Record the conference call Record the conference call. Note: This is broken when using %s or lower, and is therefore disabled. Enable "Force allow conference recording" under Advanced settings to override this. The Recording will not be available in either the CDR nor in Call Recordings and has to be downloaded by logging into the backend. Reset Sets talker detection. Asterisk will send events on the manager interface identifying the channel that is talking. The talker will also be identified on the output of the conference list CLI command. Note: If Conferences Pro is installed and licensed this will always be enabled Submit Talker Detection Talker Optimization The language for the conference. If set to inherit or blank the language will be inherited from the first person who joins the conference esentially making the language of this conference dynamic. After the first person has joined the language can not be changed until all users have left the conference. If you set a value here the langauge will be forced irregardless of what language users have set The user and admin can not have the same pin code. This specifies the number of seconds that the participant may stay in the conference before being automatically ejected. 0 = disabled, default is 21600 (6 hours) Timeout Timeout of the conference. Turns on talker optimization. With talker optimization, Asterisk treats talkers who are not speaking as being muted, meaning that no encoding is done on transmission and that received audio that is not registered as talking is omitted, causing no buildup in background noise. Until Asterisk 14+ a random timestamp would be added to the end of the conference call recording which could not be determined in post call handling. Thus enabling conference call recording is disabled if using Asterisk 13 or lower. Enable this option to allow Conference Call recording to be enabled in Astrisk 13 or lower Use this number to dial into the conference. User Count User PIN User join/leave Users Users. Wait until the conference leader (admin user) arrives before starting the conference Warning! Extension When the conference leader (admin user) leaves all users will be kicked from the conference Yes You can require callers to enter a password before they can enter this conference.<br><br>This setting is optional.<br><br>If either PIN is entered, the user will be prompted to enter a PIN.<br> This pin should be different than the Admin pin You must set Allow Menu to Yes when not using a Leader or Admin in your conference, otherwise you will be unable to unmute yourself You must set an admin PIN for the Conference Leader when selecting the leader wait option default description is blank. inherit is not allowed for your account. join message id Project-Id-Version: PACKAGE VERSION
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2021-06-30 06:08+0000
PO-Revision-Date: 2019-04-10 07:36+0000
Last-Translator: florian alberts <alberts@ar-systems.de>
Language-Team: German <http://*/projects/freepbx/conferences/de/>
Language: de_DE
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: Weblate 3.0.1
 Aktionen Hinzufügen Administrator PIN Menü zulassen Erlaube die Erstellung von Konferenzräumen, wo mehrere Personen miteinander sprechen können Benutzer anmelden / abmelden Wenn dies aktiviert ist, muss der Benutzer seinen Namen aufzeichnen, bevor er der Konferenz beitritt Angemeldete Benutzer zählen beim Beitritt zur Konferenz Anwendungen Konferenznummer Konferenz Konferenzname Konferenznummer Die Konferenznummer fehlt. Konferenzraum %s : %s Konferenzstatus verwendete Konferenznummer. Konferenz:  Konferenz: %s Konferenzen Nebenstellenkonflikt Löschen Beschreibung Beschreibung Beschreibung der Konferenz. Bearbeiten Aktivieren Sie Music On Hold, wenn die Konferenz einen einzelnen Teilnehmer hat Geben Sie eine PIN-Nummer für den Benutzer admin ein. <br> <br> Diese Einstellung ist optional, es sei denn, die Option 'leader wait' wird verwendet, dann identifiziert diese PIN den Leader. <br> Dieser Pin sollte sich vom Benutzer-Pin unterscheiden . Nebenstelle Erzwingen der Konferenzaufnahme Geben Sie dieser Konferenz einen kurzen Namen, damit Sie diese leichter identifizieren können. Konferenzen importieren/exportieren Erben Join/Beitritt Mitteilung Identifikationsnummer der Begrüssungsmeldung. Sprache Sprache. Leiter geht Auf Leiter warten Konferenzen auflisten Maximale Anzahl der Benutzer, die an dieser Konferenz teilnehmen dürfen. Maximale Teilnehmerzahl Zeitüberschreitung für Mitglieder Nachricht, die dem Anrufer vorgespielt werden soll, bevor er der Konferenz beitritt. Um zusätzliche Aufnahmen hinzuzufügen, verwenden Sie bitte das "System Recordings" -Menü oben Musik Musik (oder Werbung), die einem Anrufer, der auf den Konferenzbeginn wartet, vorgespielt wird.Wählen Sie „erben“, wenn die Warteschleifenmusik zu übernehmen, die z.B. von der eingehenden Route vorgegeben wurde.<br /><br />Diese Musik wird oben unter „Warteschleifenmusik“ festgelegt. Musik bei Halten Musik bei Halten Klasse Musik. Jeden beim ersten Beitritt zur Konferenz stummschalten. Bitte beachten Sie, dass sie 'Menü zulassen auf 'ja' gestellt haben müssen, sofern Sie 'Auf Leiter warten' auf 'ja' gestellt haben, um ihre eigene Stummschaltung zu beenden Stummschalten beim Verbinden Nein Unbegrenzt Kein*e Diese Einstellung existiert nicht. Einstellung der Konferenz. Einstellungen Admini-PIN-Code. Benutzer-PIN-Code. Geben Sie einen gültigen Konferenznamen ein Geben Sie eine gültige Konferenznummer ein Bitte beachten Sie, dass ein höheres Limit, abhängig von Hardware und Einstellungen, zu Qualitätseinbußen führen kann. Menü ansagen (Benutzer oder Admin), wenn '*' empfangen wird (an Menü 'senden') Ruhemodus Ruhemodus (spielt keine Betreten/Verlassen Töne ab) Konferenz Aufzeichnen Zeichnet die Konferenz auf Konferenztelefonat aufzeichnen. Hinweis: Dies funktioniert mit %s oder älter nicht und ist deshalb deaktiviert. Aktivieren Sie 'Das Zulassen von Konferenzaufzeichnungen erzwingen' unter den erweiterten Einstellungen, um dies zu übersteuern. Die Aufzeichnung wird weder im CRD noch in den Rufaufzeichnungen verfügbar sein, sondern muss manuell über das Backend heruntergeladen werden. Zurücksetzen Stellt die Sprecher-Erkennung ein. Asterisk wird Ereignisse auf das Manager-Interface senden, die den Kanal identifizieren, der spricht. Der Sprecher wird außerdem in der Ausgabe der 'conference list'-Befehls auf der Kommandozeile identifiziert. Hinweis: Wenn "Konferenzen Pro" installiert und lizenziert ist, ist diese Option immer aktiviert Absenden Sprechererkennung Sprecheroptimierung Die Sprache für die Konferenz. Wird dies leer gelassen oder auf „Erben“ gestellt, wird die Sprache von der ersten Person übernommen, die die Konferenz betritt, wodurch die Sprache dieser Konferenz im Grunde dynamisch wird. Nachdem die erste Person die Konferenz betreten hat, kann die Sprache nicht geändert werden, bis alle Benutzer die Konferenz verlassen haben. Geben Sie hier eine Sprache vor, wird diese, unabhängig von den Einstellungen der Nutzer, für alle Teilnehmer erzwungen Der Benutzer kann nicht denselben PIN-Code haben wie der Admin. Diese Einstellung gibt eine Sekundenzahl an, für die ein Teilnehmer in der Konferenz bleiben kann, bevor er automatisch rausgeworfen wird. 0 = deaktiviert, Standardwert ist 21600 (sechs Stunden) Zeitlimit Zeitüberschreitung der Konferenz. Schaltet die Sprecheroptimierung ein. Mit der Sprecheroptimierung behandelt Asterisk Teilnehmer, die nicht sprechen als wären sie stummgeschaltet. Dies bedeutet, dass dass Übertragungen nicht encodiert werden und empfangene Töne, die nicht als Sprechen erkannt werden, ignoriert werden, wodurch ein Anstieg von Hintergrundgeräuschen vermieden wird. Vor Asterisk 14+ wurde am Ende der Aufzeichnung einer Konferenz ein zufälliger Zeitstempel ergänzt, der in der Anrufnachbehandlung nicht bestimmt werden konnte. Daher die Möglichkeit, Konferenzaufzeichnungen zu aktivieren, deaktiviert, wenn Sie Asterisk 13 oder älter nutzen. Aktivieren Sie diese Option, um die die Aktivierung von Konferenzaufzeichnungen in Asterisk 13 oder älter zu erlauben Diese Nummer verwenden, um sich in die Konferenz einzuwählen. Benutzerzähler Benutzer PIN Benutzer Beitritt/Verlassen Benutzer Benutzer. Warten bis der Konferenzleiter (Admin-Benutzer) ankommt, bevor die Konferenz beginnt Warnung! Nebenstelle Wenn der Konferenzleiter (Admin-Benutzer) die Konferenz verlässt, werden alle Benutzer von der Konferenz getrennt Ja Sie können Benutzer zur Eingabe eines Passworts zwingen, bevor sie dieser Konferenz beitreten können. <br /><br />Diese Einstellung ist optional.<br /><br />Wenn eine PIN angegeben wird, werden die Benutzer zur Eingabe der PIN aufgefordert.<br />Dies PIN muss anders sein als die Admin-PIN Sie müssen „Menü erlauben“ auf „Ja“ setzen, wenn Sie für Ihre Kopnferenz keinen Leiter oder Admin verwenden, anderenfalls können Sie Ihre eigene Stummschaltung nicht selbst aufheben Sie müssen eine Admin-PIN für den Konferenzleiter einstellen, wenn Sie die Option „Auf Leiter warten“ auswählen Standard Beschreibung fehlt. Erben ist für Ihr Konto nicht erlaubt. Identifikationsnummer der Begrüssungsnachricht 