
CREATE TABLE `Parking Space`
(
  `Spot Number` varchar
(10) NOT NULL,
  `Location` varchar
(20) NOT NULL,
  `Type` varchar
(30) NOT NULL,
  `Resident Name` varchar
(100),
  `Building` varchar
(50) NOT NULL,
  `comments` varchar
(255)
);



CREATE TABLE `Resident`
(
  `Appartment Number` varchar
(10) NOT NULL,
  `Name` varchar
(255) NOT NULL,
  `Building` varchar
(50) NOT NULL,
  `Parking Spot` varchar
(20) NOT NULL,
  `Leasing Period` varchar
(50) NOT NULL,
  `Phone Number` varchar
(100) NOT NULL,
  `Email Address` varchar
(100) NOT NULL,
  `Pets` tinyint
(1) NOT NULL,
  `comments` varchar
(255)
);


CREATE TABLE `Users`
(
  `Email` varchar
(255) NOT NULL,
  `Password` varchar
(255) NOT NULL,
  `Name` varchar
(255) NOT NULL,
  `Type` varchar
(50) NOT NULL,
  `Phone Number` varchar
(50) NOT NULL
);
