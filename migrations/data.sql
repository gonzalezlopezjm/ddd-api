-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.27 - MySQL Community Server - GPL
-- SO del servidor:              Linux
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando datos para la tabla app.events_log: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `events_log` DISABLE KEYS */;
INSERT INTO `events_log` (`id`, `aggregate_id`, `name`, `body`, `created_at`) VALUES
	('08eebd2a-7977-4463-b3a7-d456a1f693c7', '0988582a-0888-4c97-a896-080532f56d04', 'rideServices.domain.rideService.v1.create', '{"uuid":"0988582a-0888-4c97-a896-080532f56d04","pickUp":{"name":"LAX Airport","latitude":33.942732019474484,"longitude":-118.410454103646},"dropOff":{"name":"LMU School of Film and Television","latitude":33.96948186567957,"longitude":-118.41753014014645},"vehicleType":"suv","serviceLocator":"GC08Q5TV","createdAt":"2021-12-28T11:01:48+00:00"}', '2021-12-28 11:01:48'),
	('29ef410b-ec6c-4496-a42a-96c329bada5b', 'fd0430db-c326-4984-88e1-0e5b3677d769', 'rideServices.domain.rideService.v1.create', '{"uuid":"fd0430db-c326-4984-88e1-0e5b3677d769","pickUp":{"name":"The West Hollywood EDITION","latitude":34.02523388803357,"longitude":-118.39698631177802},"dropOff":{"name":"Cafe 50\'s","latitude":34.04447932321196,"longitude":-118.45500292888642},"vehicleType":"sedan","serviceLocator":"ZBRP1GJX","createdAt":"2021-12-28T11:05:32+00:00"}', '2021-12-28 11:05:32'),
	('2bb51f06-dcbc-419f-bb16-1aec45dbb05f', '1715b823-bd27-4a29-ac54-de65f2621957', 'rideServices.domain.rideService.v1.create', '{"uuid":"1715b823-bd27-4a29-ac54-de65f2621957","pickUp":{"name":"Westfield Century City","latitude":34.02523388803357,"longitude":-118.39698631177802},"dropOff":{"name":"Los Angeles County Museum of Art","latitude":34.06363181244683,"longitude":-118.35928165303923},"vehicleType":"sedan","serviceLocator":"HUR1NQD9","createdAt":"2021-12-28T11:04:32+00:00"}', '2021-12-28 11:04:32'),
	('60a65db3-79ba-4e34-bf83-c2e78b33fead', 'a6687706-5cad-4841-9717-d3fb9b9c4271', 'rideServices.domain.rideService.v1.create', '{"uuid":"a6687706-5cad-4841-9717-d3fb9b9c4271","pickUp":{"name":"Home2 Suites by Hilton Los Angeles Montebello","latitude":34.029933529548074,"longitude":-118.12978420564565},"dropOff":{"name":"Tamales Lilianas","latitude":34.04101745305486,"longitude":-118.16548208378467},"vehicleType":"van","serviceLocator":"67MZN8F2","createdAt":"2021-12-28T11:10:47+00:00"}', '2021-12-28 11:10:47'),
	('6f81c09b-cc51-4f87-aa8d-dacadedaec37', 'c282fcc2-9fec-412a-9cba-69d83c9bc142', 'rideServices.domain.rideService.v1.create', '{"uuid":"c282fcc2-9fec-412a-9cba-69d83c9bc142","pickUp":{"name":"Courtyard by Marriott Los Angeles Westside","latitude":33.981767942883764,"longitude":-118.39233526116932},"dropOff":{"name":"The Wende Museum","latitude":34.011494744150475,"longitude":-118.40389720584385},"vehicleType":"van","serviceLocator":"72E0FXVP","createdAt":"2021-12-28T11:02:51+00:00"}', '2021-12-28 11:02:51'),
	('99b1c67c-3303-48ea-ac1d-340bc7ed3703', 'bab70862-dcfe-47e1-aa80-ddcdb91f0f66', 'rideServices.domain.rideService.v1.create', '{"uuid":"bab70862-dcfe-47e1-aa80-ddcdb91f0f66","pickUp":{"name":"Universal Studios Hollywood","latitude":34.137024551096665,"longitude":-118.35278348414232},"dropOff":{"name":"Old Los Angeles Zoo","latitude":34.133832514171374,"longitude":-118.28887329412926},"vehicleType":"van","serviceLocator":"0TVBOS95","createdAt":"2021-12-28T11:09:36+00:00"}', '2021-12-28 11:09:36'),
	('a4287f01-3191-483c-b3dd-22973c5dbc74', '34d0e5fc-dd95-4fc5-b549-2e08bec6b162', 'rideServices.domain.rideService.v1.create', '{"uuid":"34d0e5fc-dd95-4fc5-b549-2e08bec6b162","pickUp":{"name":"Greystone Mansion","latitude":34.092221599904306,"longitude":-118.40123700080996},"dropOff":{"name":"Fairfax High School","latitude":34.08174460979891,"longitude":-118.36030526037723},"vehicleType":"suv","serviceLocator":"7RDC1YIW","createdAt":"2021-12-28T11:07:48+00:00"}', '2021-12-28 11:07:48'),
	('bab5760e-640f-463d-8039-daa0db349eb1', '1b939e56-fe1c-41bc-9b3a-f37d2f9de978', 'rideServices.domain.rideService.v1.create', '{"uuid":"1b939e56-fe1c-41bc-9b3a-f37d2f9de978","pickUp":{"name":"The Getty Center","latitude":34.07797851717805,"longitude":-118.47403713484873},"dropOff":{"name":"Hotel Bel-Air Spa","latitude":34.085941003429056,"longitude":-118.44572639095604},"vehicleType":"van","serviceLocator":"KEVAOJSI","createdAt":"2021-12-28T11:06:33+00:00"}', '2021-12-28 11:06:33'),
	('e55dadea-9b8e-4a32-a97b-5752bddb8955', 'ad1027e6-79d5-4840-82f4-1da50d3547a7', 'rideServices.domain.rideService.v1.create', '{"uuid":"ad1027e6-79d5-4840-82f4-1da50d3547a7","pickUp":{"name":"Diorama-Museum of Bhagavad-gita","latitude":34.02523388803357,"longitude":-118.39698631177802},"dropOff":{"name":"The Culver Hotel","latitude":34.02384664182738,"longitude":-118.39415395351331},"vehicleType":"van","serviceLocator":"C91YQALO","createdAt":"2021-12-28T11:03:38+00:00"}', '2021-12-28 11:03:38'),
	('e5c6f990-500a-4c84-a017-124273ed5d62', 'c0a2d289-b7e8-4ffd-8999-7c79294c1933', 'rideServices.domain.rideService.v1.create', '{"uuid":"c0a2d289-b7e8-4ffd-8999-7c79294c1933","pickUp":{"name":"TCL Chinese Theatre","latitude":34.101771880895186,"longitude":-118.34099565727772},"dropOff":{"name":"Hollywood Pacific Theater","latitude":34.10175438238005,"longitude":-118.33055747890839},"vehicleType":"suv","serviceLocator":"SGKN4E3O","createdAt":"2021-12-28T11:08:41+00:00"}', '2021-12-28 11:08:41');
/*!40000 ALTER TABLE `events_log` ENABLE KEYS */;

-- Volcando datos para la tabla app.ride_services: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `ride_services` DISABLE KEYS */;
INSERT INTO `ride_services` (`id`, `pick_up_name`, `pick_up_latitude`, `pick_up_longitude`, `drop_off_name`, `drop_off_latitude`, `drop_off_longitude`, `vehicle_type`, `service_locator`, `created_at`) VALUES
	('0988582a-0888-4c97-a896-080532f56d04', 'LAX Airport', 33.942732019474, -118.41045410365, 'LMU School of Film and Television', 33.96948186568, -118.41753014015, 'suv', 'GC08Q5TV', '2021-12-28 11:01:48'),
	('1715b823-bd27-4a29-ac54-de65f2621957', 'Westfield Century City', 34.025233888034, -118.39698631178, 'Los Angeles County Museum of Art', 34.063631812447, -118.35928165304, 'sedan', 'HUR1NQD9', '2021-12-28 11:04:32'),
	('1b939e56-fe1c-41bc-9b3a-f37d2f9de978', 'The Getty Center', 34.077978517178, -118.47403713485, 'Hotel Bel-Air Spa', 34.085941003429, -118.44572639096, 'van', 'KEVAOJSI', '2021-12-28 11:06:33'),
	('34d0e5fc-dd95-4fc5-b549-2e08bec6b162', 'Greystone Mansion', 34.092221599904, -118.40123700081, 'Fairfax High School', 34.081744609799, -118.36030526038, 'suv', '7RDC1YIW', '2021-12-28 11:07:48'),
	('a6687706-5cad-4841-9717-d3fb9b9c4271', 'Home2 Suites by Hilton Los Angeles Montebello', 34.029933529548, -118.12978420565, 'Tamales Lilianas', 34.041017453055, -118.16548208378, 'van', '67MZN8F2', '2021-12-28 11:10:47'),
	('ad1027e6-79d5-4840-82f4-1da50d3547a7', 'Diorama-Museum of Bhagavad-gita', 34.025233888034, -118.39698631178, 'The Culver Hotel', 34.023846641827, -118.39415395351, 'van', 'C91YQALO', '2021-12-28 11:03:38'),
	('bab70862-dcfe-47e1-aa80-ddcdb91f0f66', 'Universal Studios Hollywood', 34.137024551097, -118.35278348414, 'Old Los Angeles Zoo', 34.133832514171, -118.28887329413, 'van', '0TVBOS95', '2021-12-28 11:09:36'),
	('c0a2d289-b7e8-4ffd-8999-7c79294c1933', 'TCL Chinese Theatre', 34.101771880895, -118.34099565728, 'Hollywood Pacific Theater', 34.10175438238, -118.33055747891, 'suv', 'SGKN4E3O', '2021-12-28 11:08:41'),
	('c282fcc2-9fec-412a-9cba-69d83c9bc142', 'Courtyard by Marriott Los Angeles Westside', 33.981767942884, -118.39233526117, 'The Wende Museum', 34.01149474415, -118.40389720584, 'van', '72E0FXVP', '2021-12-28 11:02:51'),
	('fd0430db-c326-4984-88e1-0e5b3677d769', 'The West Hollywood EDITION', 34.025233888034, -118.39698631178, 'Cafe 50\'s', 34.044479323212, -118.45500292889, 'sedan', 'ZBRP1GJX', '2021-12-28 11:05:32');
/*!40000 ALTER TABLE `ride_services` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
