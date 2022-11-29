-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 01. sep 2013 ob 18.53
-- Različica strežnika: 5.5.32
-- Različica PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Struktura tabele `box`
--

CREATE TABLE IF NOT EXISTS `box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(80) NOT NULL,
  `location` varchar(120) NOT NULL,
  `ip` varchar(46) NOT NULL,
  `network` varchar(20) NOT NULL DEFAULT '',
  `nettype` varchar(4) NOT NULL DEFAULT 'MB',
  `ostype` varchar(20) NOT NULL,
  `distro` varchar(40) NOT NULL DEFAULT '',
  `distroVersion` varchar(40) NOT NULL DEFAULT '',
  `cpu` varchar(40) NOT NULL DEFAULT '',
  `hdd` varchar(10) NOT NULL DEFAULT '',
  `ram` varchar(40) NOT NULL DEFAULT '',
  `cost` varchar(20) NOT NULL DEFAULT '',
  `valute` varchar(10) NOT NULL DEFAULT 'eur',
  `sshuser` varchar(40) NOT NULL,
  `sshpass` varchar(40) NOT NULL,
  `sshport` int(10) NOT NULL,
  `sudo` tinyint(1) NOT NULL DEFAULT '0',
  `ftpport` int(10) NOT NULL,
  `ftppassive` tinyint(1) NOT NULL DEFAULT '1',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `version` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `priority` tinyint(3) NOT NULL DEFAULT '0',
  `slots` smallint(5) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `cfg1` varchar(40) NOT NULL DEFAULT '',
  `cfg1name` varchar(40) NOT NULL DEFAULT '',
  `cfg1edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg2` varchar(40) NOT NULL DEFAULT '',
  `cfg2name` varchar(40) NOT NULL DEFAULT '',
  `cfg2edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg3` varchar(40) NOT NULL DEFAULT '',
  `cfg3name` varchar(40) NOT NULL DEFAULT '',
  `cfg3edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg4` varchar(40) NOT NULL DEFAULT '',
  `cfg4name` varchar(40) NOT NULL DEFAULT '',
  `cfg4edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg5` varchar(40) NOT NULL DEFAULT '',
  `cfg5name` varchar(40) NOT NULL DEFAULT '',
  `cfg5edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg6` varchar(40) NOT NULL DEFAULT '',
  `cfg6name` varchar(40) NOT NULL DEFAULT '',
  `cfg6edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg7` varchar(40) NOT NULL DEFAULT '',
  `cfg7name` varchar(40) NOT NULL DEFAULT '',
  `cfg7edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg8` varchar(40) NOT NULL DEFAULT '',
  `cfg8name` varchar(40) NOT NULL DEFAULT '',
  `cfg8edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg9` varchar(40) NOT NULL DEFAULT '',
  `cfg9name` varchar(40) NOT NULL DEFAULT '',
  `cfg9edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg10` varchar(40) NOT NULL DEFAULT '',
  `cfg10name` varchar(40) NOT NULL DEFAULT '',
  `cfg10edit` tinyint(1) NOT NULL DEFAULT '0',
  `startupline` text NOT NULL,
  `installdir` varchar(255) NOT NULL,
  `querycode` varchar(40) NOT NULL,
  `queryport` smallint(5) NOT NULL,
  `defaultport` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `general`
--

CREATE TABLE IF NOT EXISTS `general` (
  `panelname` varchar(80) NOT NULL DEFAULT '',
  `panelurl` varchar(120) NOT NULL DEFAULT '',
  `template` varchar(20) NOT NULL DEFAULT '',
  `supportmail` varchar(40) NOT NULL DEFAULT '',
  `noreplymail` varchar(40) NOT NULL DEFAULT '',
  `geoip` tinyint(1) NOT NULL DEFAULT '1',
  `geoipipv6` tinyint(1) NOT NULL DEFAULT '0',
  `caching` tinyint(1) NOT NULL DEFAULT '1',
  `statistics` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `ip`
--

CREATE TABLE IF NOT EXISTS `ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `logs_actions`
--

CREATE TABLE IF NOT EXISTS `logs_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(10) unsigned NOT NULL,
  `serverid` int(10) unsigned NOT NULL,
  `boxid` int(10) unsigned NOT NULL,
  `type` varchar(40) NOT NULL COMMENT 'So script can sort it self correctly.',
  `holder` text NOT NULL COMMENT 'Static messages like links etc..',
  `user` int(11) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `logs_status`
--

CREATE TABLE IF NOT EXISTS `logs_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(10) unsigned NOT NULL,
  `ftp` tinyint(1) NOT NULL DEFAULT '0',
  `ssh` tinyint(1) NOT NULL DEFAULT '0',
  `bandwidth_rec` varchar(80) NOT NULL DEFAULT '0',
  `bandwidth_send` varchar(80) NOT NULL DEFAULT '0',
  `mem_used` varchar(80) NOT NULL DEFAULT '0',
  `mem_free` varchar(80) NOT NULL DEFAULT '0',
  `mem_total` varchar(80) NOT NULL DEFAULT '0',
  `load_avg` varchar(80) NOT NULL DEFAULT '0',
  `uptime` varchar(80) NOT NULL DEFAULT '0',
  `swap_used` varchar(80) NOT NULL DEFAULT '0',
  `swap_free` varchar(80) NOT NULL DEFAULT '0',
  `swap_total` varchar(80) NOT NULL DEFAULT '0',
  `hdd_used` varchar(80) NOT NULL DEFAULT '0',
  `hdd_free` varchar(80) NOT NULL DEFAULT '0',
  `hdd_total` varchar(80) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `logs_users`
--

CREATE TABLE IF NOT EXISTS `logs_users` (
  `user_id` int(10) unsigned NOT NULL,
  `user_ip` int(11) NOT NULL,
  `created` datetime NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `logs_users`
--

INSERT INTO `logs_users` (`user_id`, `user_ip`, `created`) VALUES
(1, 0, '2013-08-31 23:47:01'),
(1, 0, '2013-09-01 18:49:56'),
(1, 0, '2013-09-01 18:52:45');

-- --------------------------------------------------------

--
-- Struktura tabele `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` text NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(10) unsigned NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `boxes` int(11) NOT NULL DEFAULT '0',
  `servers` int(11) NOT NULL DEFAULT '0',
  `clients` int(11) NOT NULL DEFAULT '0',
  `unlimited` tinyint(1) NOT NULL DEFAULT '0',
  `expires` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Odloži podatke za tabelo `packages`
--

INSERT INTO `packages` (`id`, `user`, `type`, `boxes`, `servers`, `clients`, `unlimited`, `expires`) VALUES
(1, 1, 0, 0, 0, 0, 0, '2013-09-08');

-- --------------------------------------------------------

--
-- Struktura tabele `server`
--

CREATE TABLE IF NOT EXISTS `server` (
  `serverid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner` int(10) unsigned NOT NULL DEFAULT '0',
  `clientid` int(10) unsigned NOT NULL,
  `boxid` int(10) unsigned NOT NULL DEFAULT '0',
  `ipid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(40) NOT NULL,
  `game` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `priority` tinyint(2) NOT NULL DEFAULT '0',
  `slots` mediumint(8) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `port` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg1` varchar(40) NOT NULL DEFAULT '',
  `cfg1name` varchar(40) NOT NULL DEFAULT '',
  `cfg1edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg2` varchar(40) NOT NULL DEFAULT '',
  `cfg2name` varchar(40) NOT NULL DEFAULT '',
  `cfg2edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg3` varchar(40) NOT NULL DEFAULT '',
  `cfg3name` varchar(40) NOT NULL DEFAULT '',
  `cfg3edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg4` varchar(40) NOT NULL DEFAULT '',
  `cfg4name` varchar(40) NOT NULL DEFAULT '',
  `cfg4edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg5` varchar(40) NOT NULL DEFAULT '',
  `cfg5name` varchar(40) NOT NULL DEFAULT '',
  `cfg5edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg6` varchar(40) NOT NULL DEFAULT '',
  `cfg6name` varchar(40) NOT NULL DEFAULT '',
  `cfg6edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg7` varchar(40) NOT NULL DEFAULT '',
  `cfg7name` varchar(40) NOT NULL DEFAULT '',
  `cfg7edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg8` varchar(40) NOT NULL DEFAULT '',
  `cfg8name` varchar(40) NOT NULL DEFAULT '',
  `cfg8edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg9` varchar(40) NOT NULL DEFAULT '',
  `cfg9name` varchar(40) NOT NULL DEFAULT '',
  `cfg9edit` tinyint(1) NOT NULL DEFAULT '0',
  `cfg10` varchar(40) NOT NULL DEFAULT '',
  `cfg10name` varchar(40) NOT NULL DEFAULT '',
  `cfg10edit` tinyint(1) NOT NULL DEFAULT '0',
  `startupline` text NOT NULL,
  `ftpuser` varchar(40) NOT NULL DEFAULT '',
  `ftppass` varchar(40) NOT NULL DEFAULT '',
  `homedir` varchar(120) NOT NULL DEFAULT '',
  `installdir` varchar(120) NOT NULL DEFAULT '',
  `started` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`serverid`),
  KEY `clientid` (`clientid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `password_temp` varchar(40) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `firstname` varchar(40) NOT NULL DEFAULT '',
  `lastname` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL,
  `group` tinyint(4) NOT NULL DEFAULT '1',
  `last_visit` datetime NOT NULL,
  `ip` varchar(50) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `lang`, `username`, `password`, `password_temp`, `salt`, `firstname`, `lastname`, `email`, `group`, `last_visit`, `ip`, `created`, `suspended`, `parent`) VALUES
(1, '', 'admin', '7d35146068f91c6e5ef42a0bb8aaa66f67e92d4f', '7d35146068f91c6e5ef42a0bb8aaa66f67e92d4f', 'f0c84ee8ef', 'admin', 'admin', 'admin@change.me', 10, '2013-08-31 21:46:40', '', '2013-08-31 21:46:40', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
