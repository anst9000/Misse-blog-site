CREATE TABLE poems (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  body TEXT NOT NULL,
  topic VARCHAR(255),
  image VARCHAR(255),
  author VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO
  poems (title, body, topic, image, author)
VALUES
  (
    "Höstqvällen",
    "Hur blekt är allt,
hur härjadt,
vissnadt,
dödt ! Hvar är den blomning nu,
som sommarn födt ? I dalen domnar allt,
i skogen tiges,
Och till en graf den skumma jorden viges.Dock,
ögat lyftes sällt från grafven opp,
En högre verld har grytt för hjertats hopp,
I jordens skymning klarna stjernelanden,
Och oförgängligt ler ett hem mot anden.Så drömmer jag i höstens qväll och ser,
Hur löfvet faller stelt från björken ner,
En naken strand i vikens djup sig speglar,
Och öfver månen silfvermolnet seglar.",
    "Årstider",
    "",
    "Johan Ludvig Runeberg"
  ),
  (
    "Jag såg ett träd...",
    "Jag såg ett träd som var större än alla andra och hängde fullt av oåtkomliga kottar;
jag såg en stor kyrka med öppna dörrar och alla som kommo ut voro bleka och starka och färdiga att dö;
jag såg en kvinna som leende och sminkad kastade tärning om sin lycka och såg att hon förlorade.En krets var dragen kring dessa ting den ingen överträder.",
    "Livet",
    "",
    "Edith Södergran"
  ),
  (
    "Claras pretentioner",
    "Om jag någon gång vill gifta mig,
Yttrade den vackra fröken Clara,
Bör den ädling,
som anmäler sig,
Utaf tapperhet ett under vara.Detta är min första pretention,
Skönhet och förstånd — se der min andra;
Har han guld — bortåt en million — Tycks mig ej att detta jag bör klandra...Lärdom kan ej heller skada just,
Ergo bör han hafva tagit graden,
Att med heder kunna stå en dust Mot the professorer,
hela raden.Nobel hållning,
takt och ton och sätt,
Slaf af alla mina ljufva nycker...Här i korthet riddarns silhouett,
Sjelf nu kan han komma när han tycker.Och af friare det knöts en krans Kring den stolta,
som sitt domslut fäller;
Ingen skön och tapper nog befanns,
Ingen vis och ingen rik nog heller.Så af år två tiotal förgick Och som månen ensam stod vår fröken,
Såg på dnna med en svärmisk blick,
Frågte ungdomens orakel — göken.Gök och måne gåfvo intet svar — Fröken — fruktande för nunnans galler — Med resignation två suckar drar Och i inspektorens armar faller.Ful och gammal var han,
har man sport,
Efter lärdom aldrig än han frågat : Tapper var han dock,
ty hvad han gjort Skulle ingen annan mera vågat...",
    "Livet",
    "",
    "Josefina Wettergrund"
  );