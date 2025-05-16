1) English
2) Greek

1)Title: Volunteer Coordination Platform for Natural Disasters

Functional Specifications
The system includes three types of users: Administrator (Base), Rescuer, and Citizen.

Administrator

1)Login – Logout: The administrator can log into the system using an appropriate username and password and log out when needed. The system should not allow access to any content if the user is not logged in. If a user attempts to access any page without prior login, they should be redirected to the login page.

2)Base Warehouse Management: The administrator defines the items for distribution and their relevant details by creating item categories and then adding or modifying items within these categories via a suitable form. They can also load item descriptions and categories from a JSON file (see Initialization). Database updates for new categories and products can be done in two ways:
Direct call to the JSON URL in the public repository
Uploading a separate JSON file, which should have the same structure as the repository file.
Based on the defined products and categories, the administrator can add or remove available products for distribution from the base and adjust their quantities. Quantities are automatically updated during task execution by rescuers (adding or removing quantities) and can also be manually updated by the administrator.

3)Map View: The administrator can view the base, all rescue vehicles, pending requests, and citizen item offers on a map, using appropriate markers. Requests and offers that have been taken up by rescuers are displayed differently from pending ones (e.g., different marker colors). Requests are visually distinguished from offers using different marker types. Clicking on a marker opens a pop-up balloon with the following details:
Vehicles: Vehicle username, vehicle cargo, vehicle status (see Rescuer section), and if the vehicle has active tasks, the marker is connected to the task markers with straight lines.
Requests: Citizen's full name and phone number, date of submission, requested item type and quantity, date taken by a vehicle, and vehicle username (if assigned). If assigned, the vehicle marker is linked to the request marker with straight lines.
Offers: Citizen's full name and phone number, date of submission, offered item type and quantity, date taken by a vehicle, and vehicle username (if assigned). If assigned, the vehicle marker is linked to the offer marker with straight lines.
The administrator can set the base's location on the map by clicking and dragging, with confirmation required before any change is finalized.

4)Map Filters: The map view should include toggle filters for:

Assigned Requests

Pending Requests

Offers

Vehicles with Active Tasks

Vehicles without Active Tasks

Connecting Lines

5)Warehouse Status Overview: The administrator can view a detailed status of all available items, whether stored at the base or loaded onto vehicles, in a table format. The table can be filtered by item categories to display only selected categories (one or more).

6)Service Statistics: The administrator can view graphs showing the number of new requests, new offers, completed requests, and completed offers, with the ability to select the time period covered by the graph.

7)Rescuer Account Creation: The administrator can create new rescuer accounts to allow them to log into the system.

8)Announcement Creation: The administrator can create announcements that will be displayed in the citizen application, specifying needs for various items. Each announcement includes one or more items from the base inventory.

Rescuer

1)Login – Logout: Similar to the administrator.
2)Cargo Management: There is no limit to the cargo each vehicle can carry (for simplicity). Rescuers can view their vehicle's current cargo at any time. When within 100 meters of the base, the "Load" button allows them to select items (and their quantities) from the base inventory to add to their vehicle's cargo. The "Unload" button transfers all items from the vehicle back to the base inventory.
3)Map View: Rescuers can view their location, the base, all unassigned requests and offers, and their own active tasks on the map. Tasks taken up by the rescuer are visually distinguished from pending ones (e.g., different marker colors). If a vehicle has active tasks, its marker is linked to the task markers with straight lines. Clicking on each marker displays a pop-up balloon with:
Requests: Citizen's full name, phone number, submission date, requested item type and quantity, assignment date, and vehicle username (if assigned). Rescuers can accept a request by pressing the appropriate button, as long as it hasn't been assigned yet.
Offers: Citizen's full name, phone number, submission date, offered item type and quantity, assignment date, and vehicle username (if assigned). Rescuers can accept an offer by pressing the appropriate button, as long as it hasn't been assigned yet.
Note: Each rescue vehicle can have up to 4 active tasks (requests or offers) simultaneously. Rescuers can set their vehicle's location on the map by clicking and dragging.
4)Map Filters: Similar to the administrator's filters.
5)Task Management: Alongside the map, a separate panel displays the list of active tasks assigned to the rescuer. For each task, the panel shows the citizen's full name, phone number, submission date, requested or offered item type and quantity. The panel includes two buttons for each task:
"Completed": When the task is finished, pressing this button changes its status to completed, removes it from all user maps, and updates the vehicle's cargo accordingly. This button is only enabled when the rescuer is within 50 meters of the task.
"Cancel": The rescuer can abandon a task at any time, making it available for other rescuers.

Citizen
1)Account Creation: Citizens can create an account by choosing a username and password, and providing their full name, phone number, and location on the map.
2)Login – Logout: Similar to the administrator.
3)Request Management: Citizens can create new requests by selecting available items (without specifying quantity). They also indicate the number of people the request is for. Citizens can view their current and past requests, along with their details (e.g., if they have been accepted, when they were accepted, when they were completed).
4)Announcement and Offer Management: Citizens can view a list of announcements from the base and choose to offer items mentioned in the announcements. They can also view the details of their current and past offers. Citizens can cancel any active offer before it is accepted by a rescuer.





2)Τίτλος: Πλατφόρμα συντονισμού εθελοντών κατά τη διάρκεια φυσικών καταστροφών
Λειτουργικές προδιαγραφές:
Στο σύστημα υπάρχουν τρεις τύποι χρηστών: Διαχειριστής (βάση), Διασώστης και Πολίτης. 
  Διαχειριστής
1)Login – Logout: Ο διαχειριστής μπορεί να συνδεθεί στο σύστημα μέσω κατάλληλου
username/password και να αποσυνδεθεί από αυτό. Το σύστημα δε θα πρέπει να επιτρέπει την
εμφάνιση οποιουδήποτε περιεχόμενου στην περίπτωση που δεν είναι logged in κάποιος χρήστης.
Σε περίπτωση απόπειρας πρόσβασης σε οποιαδήποτε σελίδα χωρίς προηγούμενο login, γίνεται
ανακατεύθυνση στη σελίδα login.
2) Διαχείριση αποθήκης Βάσης: Ο διαχειριστής καθορίζει τα είδη προς διακίνηση και τις λεπτομέρειες
που τα αφορούν, ορίζοντας κατηγορίες ειδών, και στη συνέχεια για κάθε κατηγορία προσθέτοντας
ή τροποποιώντας τα σχετικά είδη μέσω κατάλληλης φόρμας. Έχει επίσης τη δυνατότητα να
φορτώσει τις περιγραφές ειδών και τις κατηγορίες τους από αρχείο json (βλ. Αρχικοποίηση). Η
ενημέρωση της βάσης δεδομένων για νέες κατηγορίες και προϊόντα γίνεται α) με απευθείας κλήση
προς το URL του JSON που υπάρχει στο κοινό αποθετήριο και β) με μεταφόρτωση (upload)
ξεχωριστού αρχείου JSON που θα πρέπει να έχει την ίδια δομή με αυτή του αποθετηρίου. Με βάση
τα καθορισμένα προϊόντα και κατηγορίες, ο διαχειριστής προσθέτει ή αφαιρεί διαθέσιμα προϊόντα
προς διακίνηση από τη βάση και την ποσότητά τους. Στη συνέχεια, η ποσότητα ενημερώνεται
αυτόματα κατά τη διεκπεραίωση tasks από τους διασώστες (προσθήκη ή αφαίρεση ποσοτήτων) και
χειροκίνητα από το διαχειριστή.
3)Προβολή χάρτη: Ο διαχειριστής βλέπει με κατάλληλους markers σε χάρτη τη βάση, τη θέση όλων
των οχημάτων διασωστών, τα αιτήματα και τις προσφορές ειδών από τους πολίτες που δεν έχουν
ακόμα διεκπεραιωθεί (βλ. Διασώστης, σημείο 5). Τα αιτήματα / προσφορές που έχουν αναληφθεί
από διασώστες προς διεκπεραίωση απεικονίζονται με διαφοροποιημένο τρόπο από τα εκκρεμή (π.χ.
διαφορετικό χρώμα marker). Επίσης διαφοροποιούνται οπτικά τα αιτήματα από τις προσφορές
ειδών (διαφορετικό είδος marker). Κάνοντας κλικ πάνω σε κάθε marker εμφανίζεται pop-up balloon
με τις ακόλουθες πληροφορίες:
a. Οχήματα: Το username του οχήματος, το φορτίο του οχήματος, την κατάστασή του (βλ.
ενότητα διασωστών) και επίσης αν υπάρχουν ενεργά tasks για το όχημα, ο marker του
οχήματος ενώνεται με ευθείες γραμμές με τους markers των tasks που έχει αναλάβει.
b. Αιτήματα: Το ονοματεπώνυμο και τηλέφωνο του πολίτη, την ημερομηνία καταχώρησης, το
είδος και την ποσότητα που αιτείται ο πολίτης, την ημερομηνία ανάληψης από όχημα και το
user name του οχήματος (αν έχει αναληφθεί). Σε περίπτωση ανάληψης, ο marker του
οχήματος ενώνεται με ευθείες γραμμές με τον marker του αιτήματος.
c. Προσφορές: Το ονοματεπώνυμο και τηλέφωνο του πολίτη, την ημερομηνία καταχώρησης,
το είδος και την ποσότητα που προσφέρει ο πολίτης, την ημερομηνία ανάληψης από όχημα
και το user name του οχήματος (αν έχει αναληφθεί). Σε περίπτωση ανάληψης, ο marker του
οχήματος ενώνεται με ευθείες γραμμές με τον marker της προσφοράς.O διαχειριστής 
μπορεί να ορίσει την τοποθεσία της βάσης στο χάρτη, επιλέγοντας με click and drag
τη θέση της (με επιβεβαίωση πριν επικυρωθεί οποιαδήποτε αλλαγή).
4)Εφαρμογή φίλτρων στο χάρτη: Στην προβολή του χάρτη θα πρέπει να υλοποιηθούν φίλτρα (toggle)
που αφορούν: Τα αιτήματα που έχουν αναληφθεί, τα αιτήματα που είναι εκκρεμή, τις προσφορές,
τα οχήματα με ενεργά tasks, τα οχήματα χωρίς ενεργά tasks, τις ευθείες γραμμές.
5) Προβολή κατάστασης αποθήκης: Ο διαχειριστής βλέπει αναλυτική κατάσταση όλων των διαθέσιμων
ειδών, είτε αυτά βρίσκονται στη βάση, είτε φορτωμένα επί οχημάτων, με τη μορφή πίνακα. Τα
περιεχόμενα του πίνακα φιλτράρονται με βάση τις κατηγορίες ειδών, ώστε να εμφανίζονται μόνο
τα είδη από τις επιλεγμένες κατηγορίες (1 ή περισσότερες). 
6)Στατιστικά εξυπηρέτησης: Ο διαχειριστής βλέπει γράφημα που απεικονίζει το πλήθος νέων
Αιτημάτων, νέων Προσφορών, διεκπεραιωμένων Αιτημάτων και διεκπεραιωμένων Προσφορών με
δυνατότητα επιλογής χρονικής περιόδου την οποία καλύπτει το γράφημα.
7) Δημιουργία accounts διασωστών: Ο διαχειριστής μπορεί να δημιουργεί νέα accounts διασωστών
ώστε να μπορούν να κάνουν login στο σύστημα.
8) Δημιουργία ανακοινώσεων: Ο διαχειριστής δημιουργεί νέες ανακοινώσεις που θα εμφανίζονται
στην εφαρμογή του πολίτη, και αφορούν ανάγκες για διάφορα είδη. Σε κάθε ανακοίνωση
προστίθεται ένα ή περισσότερα είδη από αυτά που υπάρχουν στη βάση.

Διασώστης
1)Login – Logout: Όπως και για το διαχειριστή.
2) Διαχείριση φορτίου: Θεωρούμε ότι δεν υπάρχει περιορισμός στο φορτίο που μπορεί να μεταφέρει
κάθε όχημα (για λόγους απλότητας του project). Ο διασώστης μπορεί να δει τα είδη που βρίσκονται
στο όχημά του ανά πάσα στιγμή. Όταν ο διασώστης είναι εντός 100 μέτρων από τη βάση, μπορεί να
πατήσει στο κουμπί «φόρτωση» και να επιλέξει όσα είδη (και το πλήθος τους) επιθυμεί από το
inventory της βάσης. Αυτά προστίθενται στο φορτίο του. Αντίστοιχα το κουμπί «εκφόρτωση»
μεταφέρει όλα τα είδη που βρίσκονται στο φορτίο του διασώστη, στο inventory της βάσης.
3)Προβολή χάρτη: Ο διασώστης βλέπει με κατάλληλους markers σε χάρτη τη θέση του, τη βάση, όλα
τα αιτήματα και προσφορές που δεν εξυπηρετούνται ήδη από άλλο όχημα, και τα αιτήματα ή
προσφορές που έχει αναλάβει ο ίδιος. Τα αιτήματα / προσφορές που έχουν αναληφθεί από τον
διασώστη προς διεκπεραίωση απεικονίζονται με διαφοροποιημένο τρόπο από τα εκκρεμή (π.χ.
διαφορετικό χρώμα marker). Επίσης διαφοροποιούνται οπτικά τα Αιτήματα από τις Προσφορές
ειδών (διαφορετικό είδος marker). Αν υπάρχουν ενεργά tasks για το όχημα, ο marker του οχήματος
ενώνεται με ευθείες γραμμές με τους markers των tasks που έχει αναλάβει. Κάνοντας κλικ πάνω σε
κάθε marker αιτήματος ή προσφοράς εμφανίζεται pop-up balloon με τις ακόλουθες πληροφορίες:
o Αιτήματα: Το ονοματεπώνυμο και τηλέφωνο του πολίτη, την ημερομηνία καταχώρησης, το
είδος και την ποσότητα που αιτείται ο πολίτης, την ημερομηνία ανάληψης από όχημα και το
user name του οχήματος (αν έχει αναληφθεί). Ο διασώστης μπορεί να επιλέξει να αναλάβει
την παράδοση στο αίτημα πατώντας κατάλληλο κουμπί, αν αυτό δεν έχει ήδη αναληφθεί.
o Προσφορές: Το ονοματεπώνυμο και τηλέφωνο του πολίτη, την ημερομηνία καταχώρησης,
το είδος και την ποσότητα που προσφέρει ο πολίτης, την ημερομηνία ανάληψης από όχημα
και το user name του οχήματος (αν έχει αναληφθεί). Ο διασώστης μπορεί να επιλέξει να
αναλάβει την παραλαβή της προσφοράς, πατώντας κατάλληλο κουμπί, αν αυτή δεν έχει ήδη
αναληφθεί.
Σημειώνεται ότι ένα όχημα διάσωσης μπορεί αναλάβει μέχρι 4 tasks ταυτόχρονα (Αιτήματα ή
Προσφορές). O διασώστης μπορεί να ορίσει την τοποθεσία του οχήματός του στο χάρτη,
επιλέγοντας με click and drag τη θέση του.
4) Εφαρμογή φίλτρων στο χάρτη: Αντίστοιχα με τον διαχειριστή.
5)Διαχείριση τρέχοντων tasks: Μαζί με το χάρτη εμφανίζεται σε ξεχωριστό panel η λίστα των
τρέχοντων tasks που έχει αναλάβει ο διασώστης. Για κάθε task εμφανίζεται το ονοματεπώνυμο και
το τηλέφωνο του πολίτη, η ημερομηνία καταχώρησης, το είδος και η ποσότητα που αιτείται ή
προσφέρει ο πολίτης. Επίσης εμφανίζονται για κάθε task δύο κουμπιά:
a. «Ολοκληρώθηκε»: μόλις ο διασώστης διεκπεραιώσει το task μπορεί να πατήσει αυτό το
κουμπί. Η κατάσταση του task αλλάζει σε διεκπεραιωμένο και πλέον δεν εμφανίζεται σε
κανένα χάρτη οποιουδήποτε χρήστη. Το φορτίο του οχήματος ενημερώνεται με βάση τις
λεπτομέρειες του task (αφαιρείται ή προστίθεται είδος). Το κουμπί αυτό ενεργοποιείται
μόνο όταν ο διασώστης βρίσκεται 50 μέτρα το πολύ από το task.
b. «Ακύρωση»: ο διασώστης μπορεί οποτεδήποτε να επιλέξει να εγκαταλείψει ένα task που
έχει αναλάβει. Σε αυτή την περίπτωση το task μπορεί να αναληφθεί από οποιοδήποτε άλλο
διασώστη.

Πολίτης
1)Δημιουργία λογαριασμού: Ο πολίτης μπορεί να δημιουργήσει το λογαριασμό του επιλέγοντας
username και password. Επίσης δίνει τα προσωπικά του στοιχεία (ονοματεπώνυμο, τηλέφωνο
επικοινωνίας) και τη θέση του στο χάρτη.
2) Login – Logout: Όπως και για το διαχειριστή.
3)Διαχείριση Αιτημάτων: Ο πολίτης μπορεί να δημιουργήσει ένα νέο αίτημα επιλέγοντας κάποιο από
τα διαθέσιμα είδη, χωρίς να αναφέρει ποσότητα (π.χ. «θέλω νερό»). Μαζί με το είδος, ο πολίτης
αναφέρει και το πλήθος ατόμων που αφορά το αίτημά του. Για κάθε είδος δημιουργείται ξεχωριστό
αίτημα. Για τη διευκόλυνση του, μπορεί να επιλέξει μεταξύ κατηγοριών και ειδών, ή να κάνει
αναζήτηση για συγκεκριμένο είδος (με autocomplete). Ο πολίτης μπορεί να δει μια λίστα με τα
τρέχοντα και παρελθόντα αιτήματά του, καθώς και τις λεπτομέρειές τους (αν έχουν γίνει δεκτά, πότε
έγιναν δεκτά, πότε ολοκληρώθηκαν κ.α.).
4) Διαχείριση ανακοινώσεων και Προσφορών: Ο πολίτης μπορεί να δει μια λίστα με τις ανακοινώσεις
που εκδίδει η βάση. Επιλέγοντας μία από αυτές, μπορεί να εκδηλώσει την προσφορά του για
συγκεκριμένα είδη που περιέχονται στην ανακοίνωση. Επίσης ο πολίτης μπορεί να δει μια λίστα με
τις τρέχουσες και παρελθούσες προσφορές που έχει υποβάλλει καθώς και τις λεπτομέρειές τους (αν
έχουν γίνει δεκτά, πότε έγιναν δεκτά, πότε ολοκληρώθηκαν κ.α.). Για οποιαδήποτε τρέχουσα
προσφορά, ο πολίτης μπορεί να επιλέξει την ακύρωσή της προτού έρθει να την παραλάβει κάποιος
διασώστης. 

