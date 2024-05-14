-- 1. Erstelle eine neue MySQL-Datenbank mit dem Namen "Schulverwaltung".
CREATE DATABASE schulverwaltung;
-- 2. Erstelle die Tabelle Lehrer mit den Spalten Lehrer_ID(Primärschlüssel), 
-- Vorname, Nachname, E-Mail und Geburtsdatum.
CREATE TABLE lehrer (
    Lehrer_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vorname VARCHAR(30) NOT NULL,
    Nachname VARCHAR(30) NOT NULL,
    `E-Mail` VARCHAR(50),
    Geburtsdatum DATE
);
-- 3. Erstelle die Tabelle Schüler mit den Spalten Schüler_ID 
-- (Primärschlüssel), Vorname, Nachname, E-Mail, Geburtsdatum und Klasse.
CREATE TABLE schueler (
    Schüler_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vorname VARCHAR(30) NOT NULL,
    Nachname VARCHAR(30) NOT NULL,
    `E-Mail` VARCHAR(50),
    Geburtsdatum DATE,
    Klasse VARCHAR(5) NOT NULL
);
-- 4. Erstelle die Tabelle Kurs mit den Spalten Kurs_ID (Primärschlüssel), 
-- Titel, Lehrer_ID (Fremdschlüssel) und Semester.
CREATE TABLE kurs (
    Kurs_ID INT AUTO_INCREMENT PRIMARY KEY,
    Titel VARCHAR(100) NOT NULL,
    Lehrer_ID INT NOT NULL,
    Semester VARCHAR(6) NOT NULL,
    FOREIGN KEY (Lehrer_ID) REFERENCES Lehrer(Lehrer_ID)
)
 AUTO_INCREMENT = 1000; 
 
ALTER TABLE kurs
ADD COLUMN Kategorie VARCHAR(50) NULL;

-- 5. Füge Daten in die Tabellen Lehrer, Schüler und Kurs ein.
INSERT INTO lehrer VALUES
(0,'Lukas', 'Müller', 'lukas.mueller@schule.com', '1980-02-10'),
(0,'Anna', 'Schmidt', 'anna.schmidt@schule.com', '1985-06-05'),
(0,'Jonas', 'Wagner', 'jonas.wagner@schule.com', '1963-11-15'),
(0,'Sophia', 'Becker', 'sophia.becker@schule.com', '1988-03-20'),
(0,'Leon', 'Fischer', 'leon.fischer@schule.com', '1992-09-25'),
(0,'Emma', 'Weber', 'emma.weber@schule.com', '1977-07-12'),
(0,'Felix', 'Hoffmann', 'felix.hoffmann@schule.com', '1983-04-30'),
(0,'Mia', 'Schäfer', 'mia.schaefer@schule.com', '1991-12-03'),
(0,'Timo', 'Richter', 'timo.richter@schule.com', '1980-08-08'),
(0,'Laura', 'Meier', 'laura.meier@schule.com', '1975-01-18'),
(0,'Joseph', 'Aoi', 'joseph.aoi@schule.com', '1970-02-10'),
(0,'Joe', 'Bächerei', 'joe.bäeckerei@schule.com', '1988-02-11')

INSERT INTO schueler (Vorname, Nachname, `E-Mail`, Geburtsdatum, Klasse)
VALUES 
    ('Max', 'Mustermann', 's100@schule.com', '2005-03-15', '12A'),
    ('Anna', 'Schmidt', 's101@schule.com', '2006-07-25', '10B'),
    ('Lukas', 'Müller', 's102@schule.com', '2005-11-12', '10C'),
    ('Sophie', 'Wagner', 's103@schule.com', '2005-09-30', '10D'),
    ('Jonas', 'Schneider', 's104@schule.com', '2006-01-08', '10A'),
    ('Emma-Sophie', 'Nürnberger', 's105@schule.com', '2005-04-20', '10B'),
    ('Felix', 'Weber', 's106@schule.com', '2006-08-03', '11C'),
    ('Lena', 'Becker', 's107@schule.com', '2005-12-18', '10D'),
    ('Maximilian', 'Hofmann', 's108@schule.com', '2005-10-10', '10A'),
    ('Marie', 'Koch', 's109@schule.com', '2006-02-28', '10B'),
    ('Paul', 'Schäfer', 's110@schule.com', '2005-06-14', '10C'),
    ('Laura', 'Bauer', 's111@schule.com', '2006-11-05', '10D'),
    ('Tim', 'Richter', 's112@schule.com', '2005-09-09', '10A'),
    ('Hannah', 'Schulz', 's113@schule.com', '2006-03-22', '10B'),
    ('David', 'Meyer', 's114@schule.com', '2005-05-17', '10C'),
    ('Lea', 'Herrmann', 's115@schule.com', '2006-07-01', '11D'),
    ('Julia', 'Walter', 's116@schule.com', '2005-10-28', '10A'),
    ('Ben', 'Peters', 's117@schule.com', '2006-04-12', '10B'),
    ('Sophia', 'Schreiber', 's118@schule.com', '2005-08-26', '10C'),
    ('Leon', 'Lange', 's119@schule.com', '2006-12-10', '10D'),
    ('Lisa', 'Hartmann', 's120@schule.com', '2005-07-03', '10A'),
    ('Moritz', 'Wild', 's121@schule.com', '2006-01-20', '10B'),
    ('Sarah', 'König', 's122@schule.com', '2005-04-05', '10C'),
    ('Nicole', 'Wolf', 's123@schule.com', '2006-08-17', '10D');

INSERT INTO kurs (Titel, Lehrer_ID, Semester, Kategorie)
VALUES
('Mathematik', '1', 'SS2024', 'Kernfach'),
('Deutsch', '2', 'SS2024', 'Kernfach'),
('Englisch', '3', 'SS2024', 'Kernfach'),
('Biologie', '5', 'SS2024', 'Naturwissenschaft'),
('Chemie', '6', 'SS2024', 'Naturwissenschaft'),
('Physik', '6', 'SS2024', 'Naturwissenschaft'),
('Geschichte', '8', 'SS2024', 'Gesellschaftswissenschaft'),
('Geographie', '8', 'SS2024', 'Gesellschaftswissenschaft'),
('Sozialkunde', '10', 'SS2024', 'Gesellschaftswissenschaft'),
('Französisch', '2', 'SS2024', 'Sprache'), 
('Spanisch', '2', 'SS2024', 'Sprache'), 
('Latein', '2', 'SS2024', 'Sprache'), 
('Kunst', '5', 'WS2425', 'Kunst und Musik'),
('Musik', '5', 'SS2024', 'Kunst und Musik'),
('Theater', '5', 'WS2425', 'Kunst und Musik'),
('Sport', '8', 'SS2024', 'Sport und Gesundheit'),
('Gesundheitserziehung', '8', 'SS2024', 'Sport und Gesundheit'),
('Ethik', '10', 'SS2024', 'Ethik und Religion'),
('Religion', '10', 'WS2425', 'Ethik und Religion'),
('Kochen', '1', 'SS2024', 'Hauswirtschaft');


-- 6. Nutze den JOIN-Befehl, um die Daten aus den Tabellen Lehrer und Kurs zu 
-- kombinieren und alle Lehrer und ihre Kurse anzuzeigen.
SELECT * FROM lehrer INNER JOIN kurs ON lehrer.Lehrer_ID = kurs.Lehrer_ID;

-- 7. Nutze den SELECT-Befehl, um alle Schüler aus einer bestimmten 
-- Klassenzuzeigen.
SELECT * FROM schueler WHERE Klasse LIKE '10_'

-- 8. Nutze den UPDATE-Befehl, um die E-Mail-Adresse eines Schülers zu 
-- aktualisieren.
UPDATE schueler SET `E-Mail`='s120@schule.com'
WHERE Vorname LIKE 'Lisa' AND Nachname LIKE 'Hartmann'

-- 9. Nutze den SELECT-Befehl, um alle Kurse und ihre zugehörigen Lehrer 
-- anzuzeigen, einschließlich der 
-- 10. Lehrer, die derzeit keine Kurse unterrichten.
SELECT kurs.*, lehrer.Vorname, lehrer.Nachname FROM Kurs
RIGHT JOIN lehrer ON kurs.Lehrer_ID = lehrer.Lehrer_ID;

-- 11. Nutze den DELETE-Befehl, um alle Schüler aus einer bestimmten Klasse zu 
-- löschen.
DELETE FROM schueler WHERE Klasse = 'H12';

-- 12. Nutze den SELECT-Befehl, um alle Kurse anzuzeigen, 
-- die in einem bestimmten Semester stattfinden.
SELECT * FROM kurs WHERE Semester LIKE 'WS%';

-- 13. Nutze den UPDATE-Befehl, um den Lehrer eines Kurses zu aktualisieren.
UPDATE kurs SET Lehrer_ID = 1 WHERE Kurs_ID = 2

-- 14. Nutze den SELECT-Befehl, um alle Schüler anzuzeigen, die älter als 16 
-- Jahre sind.
SELECT * FROM schueler WHERE (ADDDATE(Geburtsdatum, INTERVAL 16 YEAR) < CURRENT_DATE())

-- 15. Nutze den DELETE-Befehl, um einen Lehrer und alle seine Kurse zu löschen.
DELETE FROM kurs WHERE Lehrer_ID = 1;
DELETE FROM lehrer WHERE Lehrer_ID = 1;

