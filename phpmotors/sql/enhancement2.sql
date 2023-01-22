
--query 1
--SELECT clients FROM phpmotors;

INSERT INTO clients (clientFirstName, clientLastName, clientEmail, clientPassword, comment)
VALUES ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 'I am the real Ironman');

-- query 2

UPDATE clients SET clientLevel = 3 WHERE clientFirstName = 'Tony' && clientLastName = 'Stark';

--query 3

UPDATE inventory
SET invDescription = REPLACE(invDescription, 'small interior', 'spacious interior')
WHERE invId = 12;

--query 4

SELECT invModel, classificationName
FROM inventory
INNER JOIN carclassification
ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationName = 'SUV';

--query 5
DELETE FROM inventory
WHERE invId = 1;

--query 6

UPDATE inventory
SET invImage = concat('/phpmotors', invImage), invThumbnail = concat('/phpmotors',  invThumbnail);




