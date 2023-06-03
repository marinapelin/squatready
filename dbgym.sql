-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 02 2023 г., 12:39
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbgym`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `LoginID` int(11) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `ClubLocationName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`LoginID`, `Password`, `ClubLocationName`) VALUES
(101, 'LOLadmin', 'Collins'),
(202, 'BourkeAdmin', 'Bourke');

-- --------------------------------------------------------

--
-- Структура таблицы `bookedtraining`
--

CREATE TABLE `bookedtraining` (
  `MemberID` int(11) NOT NULL,
  `GroupTrainingName` varchar(255) NOT NULL,
  `GroupCoachId` int(11) NOT NULL,
  `GroupRunDate` date NOT NULL,
  `GroupStartTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bookedtraining`
--

INSERT INTO `bookedtraining` (`MemberID`, `GroupTrainingName`, `GroupCoachId`, `GroupRunDate`, `GroupStartTime`) VALUES
(1, 'pilatas', 1, '2023-01-01', '09:00:00'),
(1, 'pilatas', 2, '2023-01-01', '10:10:10'),
(1, 'yoga', 2, '2023-01-01', '10:30:10'),
(3, 'boxing', 3, '2023-01-01', '15:00:00'),
(6, 'boxing', 3, '2023-01-01', '15:00:00'),
(6, 'pilatas', 1, '2023-01-01', '09:00:00'),
(6, 'pilatas', 2, '2023-01-01', '10:10:10'),
(6, 'yoga', 2, '2023-01-01', '10:30:10'),
(9, 'Swimming', 1, '2023-01-01', '08:00:00'),
(12, 'boxing', 3, '2023-01-01', '15:00:00'),
(12, 'pilatas', 2, '2023-01-01', '10:10:10'),
(12, 'Swimming', 1, '2023-01-01', '08:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

CREATE TABLE `club` (
  `ClubLocationName` varchar(255) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `LocationDetails` varchar(500) DEFAULT NULL,
  `NeedStuff` tinyint(1) DEFAULT NULL,
  `Budget` decimal(10,0) DEFAULT NULL,
  `ClubCostInDollars` bigint(20) DEFAULT NULL,
  `Owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `club`
--

INSERT INTO `club` (`ClubLocationName`, `FullName`, `LocationDetails`, `NeedStuff`, `Budget`, `ClubCostInDollars`, `Owner`) VALUES
('Bourke', 'Squat Ready Bourke St', '121 Bourke St, Melbourne, VIC,3001', 3, '10000', 450000, 'Cristopher X'),
('Collins', 'Squat Ready Collins St', '254 Collins St, Melbourne, VIC, 3000', NULL, '12000', 500000, 'Hugo Boss');

-- --------------------------------------------------------

--
-- Структура таблицы `clubequipment`
--

CREATE TABLE `clubequipment` (
  `EquipmentName` varchar(255) NOT NULL,
  `ClubLocationName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clubequipment`
--

INSERT INTO `clubequipment` (`EquipmentName`, `ClubLocationName`) VALUES
('yoga mats', 'Collins'),
('yoga mats', 'Bourke');

-- --------------------------------------------------------

--
-- Структура таблицы `coach`
--

CREATE TABLE `coach` (
  `CoachID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `PaymentId` bigint(20) DEFAULT NULL,
  `Qualifications` varchar(255) DEFAULT NULL,
  `ExpirienceInYear` int(11) DEFAULT NULL,
  `HourlyRate` int(11) NOT NULL,
  `ClubLocationName` varchar(255) NOT NULL,
  `IS_WORKING` int(10) NOT NULL DEFAULT 1,
  `PROFPIC_URL` varchar(255) NOT NULL DEFAULT 'img_emptycoach-profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `coach`
--

INSERT INTO `coach` (`CoachID`, `Email`, `Password`, `LastName`, `FirstName`, `Address`, `City`, `BirthDate`, `PaymentId`, `Qualifications`, `ExpirienceInYear`, `HourlyRate`, `ClubLocationName`, `IS_WORKING`, `PROFPIC_URL`) VALUES
(1, 'matsmit@gmail.com', 'CoachCOACH123@', 'Smit', 'Mat', 'vul.Shevchenko 15', 'Dnipro', '1990-01-01', 1, 'diploma', 2, 55, 'Collins', 1, 'img_emptycoach-profile.png'),
(2, 'henryjo@gmail.com', 'Henry111*COOL', 'Henry', 'Jo', '13/123 Punt Rd', 'Melbourne', '1998-04-04', 1, 'certificate 3 in Sport', 1, 23, 'Bourke', 1, 'img_emptycoach-profile.png'),
(3, 'finnikedward@gmail.com', 'Edward12@', 'Finnik', 'Edward', NULL, NULL, NULL, NULL, NULL, NULL, 34, 'Bourke', 1, 'img_emptycoach-profile.png');

-- --------------------------------------------------------

--
-- Структура таблицы `coachabilities`
--

CREATE TABLE `coachabilities` (
  `CoachID` int(11) NOT NULL,
  `TrainingName` varchar(255) NOT NULL,
  `ClubLocationName` varchar(255) DEFAULT NULL,
  `EquipmentName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `coachabilities`
--

INSERT INTO `coachabilities` (`CoachID`, `TrainingName`, `ClubLocationName`, `EquipmentName`) VALUES
(1, 'pilatas', 'Collins', NULL),
(2, 'yoga', 'Bourke', 'yoga mats'),
(3, 'boxing', 'Bourke', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

CREATE TABLE `equipment` (
  `Name` varchar(255) NOT NULL,
  `EqCondition` varchar(255) DEFAULT NULL,
  `WorkingHours` int(11) DEFAULT NULL,
  `RequiresCleaning` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `equipment`
--

INSERT INTO `equipment` (`Name`, `EqCondition`, `WorkingHours`, `RequiresCleaning`) VALUES
('swimming pool', 'good', 7, 3),
('yoga mats', 'new', 24, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `grouptraining`
--

CREATE TABLE `grouptraining` (
  `TrainingName` varchar(255) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `RunDate` date NOT NULL,
  `TimeStart` time NOT NULL,
  `TimeEnd` time NOT NULL,
  `MaxAttendants` int(11) NOT NULL,
  `MinAttendants` int(11) NOT NULL,
  `Attendants` int(11) DEFAULT 0,
  `Room` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `grouptraining`
--

INSERT INTO `grouptraining` (`TrainingName`, `CoachID`, `RunDate`, `TimeStart`, `TimeEnd`, `MaxAttendants`, `MinAttendants`, `Attendants`, `Room`) VALUES
('boxing', 1, '2023-05-30', '16:03:00', '17:03:00', 21, 1, 0, '1'),
('boxing', 3, '2023-01-01', '15:00:00', '16:00:00', 23, 2, 0, NULL),
('hot yoga', 1, '2023-05-25', '10:04:00', '11:04:00', 12, 2, 0, '1'),
('karate', 1, '2023-05-25', '06:06:00', '07:06:00', 22, 12, 0, '1'),
('karate', 3, '2023-05-15', '11:40:00', '00:40:00', 23, 1, 0, '2'),
('karate', 3, '2023-05-16', '18:10:00', '19:00:00', 23, 2, 0, NULL),
('pilatas', 1, '2023-01-01', '09:00:00', '10:20:00', 21, 12, 2, '1'),
('pilatas', 2, '2023-01-01', '10:10:10', '12:10:10', 21, 12, 19, '33'),
('stretching', 2, '2023-05-31', '12:10:00', '13:10:00', 12, 2, 0, '2'),
('Swimming', 1, '2023-01-01', '08:00:00', '09:00:00', 12, 2, 0, NULL),
('Swimming', 2, '2023-05-16', '10:10:00', '12:00:00', 13, 2, 0, NULL),
('Swimming', 2, '2023-05-19', '10:10:00', '12:00:00', 13, 2, 0, NULL),
('Swimming', 2, '2023-05-20', '10:10:00', '12:00:00', 13, 2, 0, NULL),
('Swimming', 2, '2023-05-21', '10:10:00', '12:00:00', 13, 2, 0, NULL),
('Swimming', 3, '2023-05-25', '08:00:00', '12:00:00', 23, 2, 0, NULL),
('Swimming', 3, '2023-05-26', '08:00:00', '12:00:00', 23, 2, 0, NULL),
('yoga', 2, '2023-01-01', '10:30:10', '12:10:10', 15, 4, 0, '45');

-- --------------------------------------------------------

--
-- Структура таблицы `member`
--

CREATE TABLE `member` (
  `MemberId` int(11) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `ApartmentNumber` int(11) DEFAULT NULL,
  `StreetAddress` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `PaymentId` bigint(20) DEFAULT NULL,
  `MembershipCode` int(11) DEFAULT NULL,
  `Mobile` mediumtext NOT NULL,
  `Postcode` mediumtext DEFAULT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `member`
--

INSERT INTO `member` (`MemberId`, `Password`, `LastName`, `FirstName`, `ApartmentNumber`, `StreetAddress`, `City`, `BirthDate`, `PaymentId`, `MembershipCode`, `Mobile`, `Postcode`, `Email`) VALUES
(1, '1234', 'Lol', 'Pop', 100, '12 St Kilda Rd', 'Paris', '2002-01-01', 1, 1, '0467896548', '3004', 'ki@gmail.com'),
(2, 'Fr1234', 'Hue', 'Frank', 21, '22 South Yarra', 'Melbourne', '1990-10-10', 1, 1, '095443686', '3902', 'i@gmail.com'),
(3, 'Berry123@', 'Pelin', 'Marina', NULL, NULL, NULL, NULL, NULL, 1, '0955138213', NULL, 'marina.pelin@gmail.com'),
(6, '1Gog123@', 'Losk', 'Ken', NULL, NULL, NULL, NULL, 2, NULL, '0955138213', NULL, 'pelin@gmail.com'),
(7, 'Sas123@sas', 'Pelin', 'Marina', NULL, NULL, NULL, NULL, 23, 1, '0955138213', NULL, 'maelin@gmail.com'),
(8, 'HugoBoss123@', 'Pelina', 'Marina', NULL, NULL, NULL, NULL, 0, 1, '0955138213', NULL, 'madrina.pelin@gmail.com'),
(9, 'LOL123LOL@l', 'Pna', 'Maryna', NULL, NULL, NULL, NULL, 26, 1, '0481967407', NULL, 'pelinamaryna@gm'),
(10, 'FRANKfrank123@', 'Pelin', 'JOJ', NULL, NULL, NULL, NULL, 34, NULL, '0955138213', NULL, 'marpo@gmail.com'),
(11, 'FlipFlop123@', 'Pela', 'Mana', NULL, NULL, NULL, NULL, 33, 2, '0489999907', NULL, 'pelinama@gmail.com'),
(12, 'LOL123lol@', 'Peny', 'Mria', NULL, NULL, NULL, NULL, 32, 1, '0481967407', NULL, 'pelinaa@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `membership`
--

CREATE TABLE `membership` (
  `MembershipCode` int(11) NOT NULL,
  `ValidDuration` varchar(255) DEFAULT NULL,
  `MembershipName` varchar(255) NOT NULL,
  `ClubLocationName` varchar(255) DEFAULT NULL,
  `DollarsPerWeek` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `membership`
--

INSERT INTO `membership` (`MembershipCode`, `ValidDuration`, `MembershipName`, `ClubLocationName`, `DollarsPerWeek`) VALUES
(0, '0', 'not chosen', 'Bourke', '0'),
(1, '6months', 'Starter', 'Collins', '16'),
(2, '1year', 'Inclusive', 'Bourke', '14');

-- --------------------------------------------------------

--
-- Структура таблицы `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `CardFirstName` varchar(255) NOT NULL,
  `CardLastName` varchar(255) NOT NULL,
  `Card` mediumtext NOT NULL,
  `BSB` int(11) NOT NULL,
  `ExpiryMonth` int(11) NOT NULL,
  `ExpiryYear` int(11) NOT NULL,
  `LastPaymentId` mediumtext DEFAULT NULL,
  `LastPaymentDate` datetime DEFAULT NULL,
  `LastUpdate` date DEFAULT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `paymentdetails`
--

INSERT INTO `paymentdetails` (`CardFirstName`, `CardLastName`, `Card`, `BSB`, `ExpiryMonth`, `ExpiryYear`, `LastPaymentId`, `LastPaymentDate`, `LastUpdate`, `ID`) VALUES
('Mat', 'Smit', '2422131121', 0, 12, 24, '0', '1998-01-23 12:45:56', '2003-03-23', 1),
('Ken', 'Losk', '1212121212121212', 123, 12, 23, NULL, NULL, NULL, 2),
('Ken', 'Lost', '1221211223232121', 232, 12, 25, NULL, NULL, NULL, 9),
('Marina', 'Pelina', '23232323232323', 212, 2, 23, NULL, NULL, NULL, 10),
('Marina', 'Pelin', '1212391238', 123, 12, 23, NULL, NULL, NULL, 20),
('Mar', 'Pe', '1231212312', 123, 11, 22, NULL, NULL, NULL, 21),
('Marina', 'PELINA', '1231222222', 123, 11, 23, NULL, NULL, NULL, 22),
('MAR', 'PELINA', '1123142', 123, 1, 32, NULL, NULL, NULL, 24),
('Mar', 'Pelina', '11111111111111', 123, 12, 2323, NULL, NULL, NULL, 25),
('Jo', 'Chi', '1212121212121212', 123, 12, 2022, NULL, NULL, NULL, 26),
('Kevin', 'Peter', '1212121212121212', 123, 12, 2022, NULL, NULL, NULL, 27),
('Ken', 'Petrovich', '1313131313131313', 333, 12, 2021, NULL, NULL, NULL, 28),
('Kek', 'Chebureck', '1313131313131313', 123, 12, 2323, NULL, NULL, NULL, 29),
('Joker', 'Hell', '1414141414141414', 123, 23, 2024, NULL, NULL, NULL, 30),
('Joke', 'Joker', '1919191919191919', 123, 11, 2023, NULL, NULL, NULL, 31),
('Fin', 'Linder', '1212121212121212', 123, 12, 2022, NULL, NULL, NULL, 32),
('Ola', 'Lol', '1212121212121212', 222, 11, 2023, NULL, NULL, NULL, 33),
('Joj', 'Oyster', '1717171717171717', 234, 11, 2023, NULL, NULL, NULL, 34);

-- --------------------------------------------------------

--
-- Структура таблицы `personaltraining`
--

CREATE TABLE `personaltraining` (
  `MemberId` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `TimeStart` time DEFAULT NULL,
  `TimeEnd` time DEFAULT NULL,
  `RunDate` date DEFAULT NULL,
  `PricePerEach` int(11) DEFAULT NULL,
  `ClubLocationName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personaltraining`
--

INSERT INTO `personaltraining` (`MemberId`, `CoachID`, `TimeStart`, `TimeEnd`, `RunDate`, `PricePerEach`, `ClubLocationName`) VALUES
(1, 2, '10:10:10', '12:10:10', '2023-01-01', 120, 'Bourke'),
(2, 1, '10:10:10', '12:10:10', '2020-01-01', 100, 'Collins');

-- --------------------------------------------------------

--
-- Структура таблицы `trainingtype`
--

CREATE TABLE `trainingtype` (
  `TrainingName` varchar(255) NOT NULL,
  `Img` varchar(255) DEFAULT NULL,
  `RequiredLevel` int(11) DEFAULT NULL,
  `RequiredEquipment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `trainingtype`
--

INSERT INTO `trainingtype` (`TrainingName`, `Img`, `RequiredLevel`, `RequiredEquipment`) VALUES
('boxing', 'img-boxing.jpg', 2, NULL),
('grid training', 'img-boxing.jpg', 4, NULL),
('hot yoga', 'img-yoga.jpg', 2, 'yoga mats'),
('karate', 'img-karate.jpg', 4, ''),
('pilatas', 'img-pilatas.jpg', 1, 'yoga mats'),
('reformer pilatas', 'pilatas2.jpg', 1, NULL),
('stretching', 'pexels-andrea-piacquadio-868483.jpg', 1, 'yoga mats'),
('Swimming', 'img-swim.jpg', 1, 'swimming pool'),
('yoga', 'img-yoga.jpg', 1, 'yoga mats');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `ClubLocationName` (`ClubLocationName`);

--
-- Индексы таблицы `bookedtraining`
--
ALTER TABLE `bookedtraining`
  ADD PRIMARY KEY (`MemberID`,`GroupTrainingName`,`GroupCoachId`,`GroupRunDate`,`GroupStartTime`),
  ADD KEY `GroupTrainingName` (`GroupTrainingName`,`GroupCoachId`,`GroupRunDate`,`GroupStartTime`);

--
-- Индексы таблицы `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`ClubLocationName`);

--
-- Индексы таблицы `clubequipment`
--
ALTER TABLE `clubequipment`
  ADD KEY `EquipmentName` (`EquipmentName`),
  ADD KEY `ClubLocationName` (`ClubLocationName`);

--
-- Индексы таблицы `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`CoachID`),
  ADD KEY `ClubLocationName` (`ClubLocationName`),
  ADD KEY `PaymentId` (`PaymentId`);

--
-- Индексы таблицы `coachabilities`
--
ALTER TABLE `coachabilities`
  ADD PRIMARY KEY (`CoachID`,`TrainingName`),
  ADD KEY `EquipmentName` (`EquipmentName`),
  ADD KEY `TrainingName` (`TrainingName`),
  ADD KEY `ClubLocationName` (`ClubLocationName`);

--
-- Индексы таблицы `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Name`);

--
-- Индексы таблицы `grouptraining`
--
ALTER TABLE `grouptraining`
  ADD PRIMARY KEY (`TrainingName`,`CoachID`,`RunDate`,`TimeStart`),
  ADD KEY `CoachID` (`CoachID`);

--
-- Индексы таблицы `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberId`),
  ADD KEY `MembershipCode` (`MembershipCode`),
  ADD KEY `PaymentId` (`PaymentId`);

--
-- Индексы таблицы `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`MembershipCode`),
  ADD KEY `ClubLocationName` (`ClubLocationName`);

--
-- Индексы таблицы `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `personaltraining`
--
ALTER TABLE `personaltraining`
  ADD PRIMARY KEY (`MemberId`,`CoachID`),
  ADD KEY `CoachID` (`CoachID`),
  ADD KEY `ClubLocationName` (`ClubLocationName`);

--
-- Индексы таблицы `trainingtype`
--
ALTER TABLE `trainingtype`
  ADD PRIMARY KEY (`TrainingName`),
  ADD KEY `RequiredEquipment` (`RequiredEquipment`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `coach`
--
ALTER TABLE `coach`
  MODIFY `CoachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ClubLocationName`) REFERENCES `club` (`ClubLocationName`);

--
-- Ограничения внешнего ключа таблицы `bookedtraining`
--
ALTER TABLE `bookedtraining`
  ADD CONSTRAINT `bookedtraining_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `member` (`MemberId`),
  ADD CONSTRAINT `bookedtraining_ibfk_2` FOREIGN KEY (`GroupTrainingName`,`GroupCoachId`,`GroupRunDate`,`GroupStartTime`) REFERENCES `grouptraining` (`TrainingName`, `CoachID`, `RunDate`, `TimeStart`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clubequipment`
--
ALTER TABLE `clubequipment`
  ADD CONSTRAINT `clubequipment_ibfk_1` FOREIGN KEY (`EquipmentName`) REFERENCES `equipment` (`Name`),
  ADD CONSTRAINT `clubequipment_ibfk_2` FOREIGN KEY (`ClubLocationName`) REFERENCES `club` (`ClubLocationName`);

--
-- Ограничения внешнего ключа таблицы `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`ClubLocationName`) REFERENCES `club` (`ClubLocationName`);

--
-- Ограничения внешнего ключа таблицы `coachabilities`
--
ALTER TABLE `coachabilities`
  ADD CONSTRAINT `coachabilities_ibfk_1` FOREIGN KEY (`EquipmentName`) REFERENCES `equipment` (`Name`),
  ADD CONSTRAINT `coachabilities_ibfk_2` FOREIGN KEY (`TrainingName`) REFERENCES `trainingtype` (`TrainingName`),
  ADD CONSTRAINT `coachabilities_ibfk_3` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`CoachID`),
  ADD CONSTRAINT `coachabilities_ibfk_4` FOREIGN KEY (`ClubLocationName`) REFERENCES `club` (`ClubLocationName`);

--
-- Ограничения внешнего ключа таблицы `grouptraining`
--
ALTER TABLE `grouptraining`
  ADD CONSTRAINT `grouptraining_ibfk_1` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`CoachID`),
  ADD CONSTRAINT `grouptraining_ibfk_2` FOREIGN KEY (`TrainingName`) REFERENCES `trainingtype` (`TrainingName`);

--
-- Ограничения внешнего ключа таблицы `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`MembershipCode`) REFERENCES `membership` (`MembershipCode`);

--
-- Ограничения внешнего ключа таблицы `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`ClubLocationName`) REFERENCES `club` (`ClubLocationName`);

--
-- Ограничения внешнего ключа таблицы `personaltraining`
--
ALTER TABLE `personaltraining`
  ADD CONSTRAINT `personaltraining_ibfk_3` FOREIGN KEY (`ClubLocationName`) REFERENCES `club` (`ClubLocationName`),
  ADD CONSTRAINT `personaltraining_ibfk_4` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`),
  ADD CONSTRAINT `personaltraining_ibfk_5` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`),
  ADD CONSTRAINT `personaltraining_ibfk_6` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`CoachID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
