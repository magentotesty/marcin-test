--
-- Table structure and data for table `trips`
--

DROP TABLE IF EXISTS `trips`;

CREATE TABLE `trips` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(20) NOT NULL,
`measure_interval` INT NOT NULL
);

INSERT INTO `trips` (`id`, `name`, `measure_interval`) VALUES
(1, 'Trip 1', 15),
(2, 'Trip 2', 20),
(3, 'Trip 3', 12);