CREATE TABLE blogs (
  id INT(11) NOT NULL AUTO_INCREMENT,
  header VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  image VARCHAR(255) NOT NULL,
  author VARCHAR(255),
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO
  blogs (header, content, image, author)
VALUES
("Vilken tur jag hade", "Laga, fixa, hamra, snickra, idag är dagen då man kan få visa upp alla sina färdigheter.", "image_01.jpg", ""),
("Vilken tur du har", "Varför går det så tungt på word-feud, det går segt och tung och jag får bara X och Z hela tiden.", "image_01.jpg", ""),
("Alla har tur idag", "Nu verkar det som att min egen bloggsida är uppe och rullar. Jippi!", "image_02.jpg", ""),
("Idag är det höst ser du", "Kalle kanin och alla hans vänner bor i Sysselstad. Men ingen har fått en egen bananbil.", "image_02.jpg", "");