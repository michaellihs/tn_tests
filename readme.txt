Themen für Schulung - 5.6.201 und so weiter...
==============================

0. Grundsätzliche Dinge

- IDE (PhpStorm)
- Versionskontroller mit GIT (am Beispiel Extension tn_tests)
- Remote Debugging
- Einbindung von T3 libs und Extbase / Fluid für Debugging


1. Mapping fremder Datensätze

- Ich verstehe nicht, was mit "fremden" Datensätzen gemeint ist. Wenn es dabei um Datensätze aus Tabellen geht, die nicht Teil der Extension sind, sollte das gehen, wenn fremde Datenbanken angesprochen werden, müsste vermutlich ein eigenes Backend geschrieben werden. Eine Mischung aus T3 und nicht-T3 Datensätze dürfte nicht gehen.


2. Ajax-Dispatching

- Einige Erläuterungen:
  BE: http://typo3.org/documentation/document-library/core-documentation/doc_core_api/4.2.0/view/3/9/
  FE: http://www.typo3-tutorials.org/tutorials/extensions/eid-mechanismus.html
  Extbase: http://mimi.kaktusteam.de/blog-posts/2012/05/using-extbase-for-ajax-requests/
- T3-Mechanismus: EID Script --> eigene Registrierung in ext_localconf.php:
  
  FE:
  $TYPO3_CONF_VARS['FE']['eID_include']['ptxAjax'] = t3lib_extMgm::extPath('pt_extbase').'Classes/Utility/eIDDispatcher.php';
  
  BE:
  $TYPO3_CONF_VARS['BE']['AJAX']['ptxAjax'] = t3lib_extMgm::extPath('pt_extbase').'Classes/Utility/	
  AjaxDispatcher.php:Tx_PtExtbase_Utility_AjaxDispatcher->initAndDispatch';
  
- Unterschied: Initialisierung des T3-Stack vor Ausführung des eigentlichen Ajax Aufrufs --> Performance
- Testen durch Aufruf in Browser und Zeitmessung
- Besser: Profiling (nicht-trivial)


3. Signal-Slot

==> würde ich gerne auf eine andere Sitzung verschieben, weil kein T3 4.6 / 4.7 vorhanden

- Grundsätzliche Frage: Notwendig?
- Alternativen: DependencyInjection, Konfiguration über TS (Beispiel pt_extlist)
- Modulare Klassen, Austauschbarkeit von kleinen Bausteinen
- Krasses Beispiel: Austausch eines ganzen Controllers via ObjectManager TS settings

- Grundgedanke hinter Signal/Slot: Observer Pattern
  - Observer = Slot
  - Signal wird von Quelle gesendet und alle registrierten Observer entsprechend aufgerufen
    http://de.wikipedia.org/wiki/Signal-Slot-Konzept
    http://de.wikipedia.org/wiki/Beobachter_(Entwurfsmuster)
    
    
4. Unit Tests

- Generell: Möglichst allen Code testen
  - Anlegen von Unit Tests für Modelle hat nichts mit Notwendigkeit zu tun, weiteren Code zu testen
- Problem: Es gibt schwer testbare Klassen, z.B. Controller
- Lösungen: 
  - Wann immer möglich DI verwenden
  - Kleine Klassen
  - So programmieren, "dass gut getestet werden kann"
  
- Wichtig für Unit Tests: Nur die Klasse selbst, nicht deren Abhängigkeiten testen. Evtl. Erklärung zu mocks.
  
- Beispiel Service für SWIFT-Mailer
  - Sehr gutes Beispiel!
  - SWIFT-Mailer injecten lassen
  - Service ist nichts anderes als ein Wrapper für SWIFT
  - In Test können Aufrufe auf SWIFT mail geprüft werden
  
  
5. Externe Daten

- Verstehe die Frage nicht
