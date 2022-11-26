CREATE TABLE `clients` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
CREATE TABLE `comments` (
 `id` int(100) NOT NULL AUTO_INCREMENT,
 `name` text NOT NULL,
 `about` text NOT NULL,
 `subject` varchar(255) NOT NULL,
 `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `products` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(200) CHARACTER SET latin1 NOT NULL,
 `desc` text CHARACTER SET latin1 NOT NULL,
 `price` decimal(7,2) NOT NULL,
 `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
 `quantity` int(11) NOT NULL,
 `img` text CHARACTER SET latin1 NOT NULL,
 `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
CREATE TABLE `staff` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` text NOT NULL,
 `staff_id` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;