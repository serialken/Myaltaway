-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 26 Août 2015 à 10:33
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `altawaybdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
`id` int(11) NOT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `apply`
--

INSERT INTO `apply` (`id`, `offer_id`, `user_id`, `createdAt`) VALUES
(6, 1, 1, '2015-08-18 17:52:05'),
(7, 5, 1, '2015-08-18 17:53:52'),
(8, 4, 1, '2015-08-18 18:16:08'),
(9, 3, 1, '2015-08-21 11:15:55'),
(10, 6, 1, '2015-08-25 11:45:05');

-- --------------------------------------------------------

--
-- Structure de la table `ext_log_entries`
--

CREATE TABLE IF NOT EXISTS `ext_log_entries` (
`id` int(11) NOT NULL,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ext_translations`
--

CREATE TABLE IF NOT EXISTS `ext_translations` (
`id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `avatar_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `avatar_id`, `name`, `lastName`, `profile_id`) VALUES
(1, 'admin', 'admin', 'admin@test.fr', 'admin@test.fr', 1, 'hn1w35uzkdcksos4cso80wgcg0c0ssc', 'shrZ6N2gTa5HtSQRK4DopsFsgCpnkCw9t/5Wcmn/GpJSUs1B74xj/fA0rE6w1ThhH+QZpo3HjcmVVqHpNdtbqg==', '2015-08-21 18:36:07', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, NULL, '', '', NULL),
(2, 'arthur', 'arthur', 'arthur.voncken@acensi.fr', 'arthur.voncken@acensi.fr', 1, 'j1hb8go4ybcw4wwogk0o8o4gg4cw0s4', 'Hj1dtqYfPW+4YEWorMI0TM0kGi8MTKGG5uygckS60TgnjoIYXFLa8KaHCvEUmqp/cYOTHjTsI9lolX/YoxrV7w==', '2015-08-18 11:44:51', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, '', '', NULL),
(3, 'moi', 'moi', 'kopold@hotmail.com', 'kopold@hotmail.com', 1, 'mik1cq5rl80ooscgokosgsoo4soggcc', '+c9v5eVioNMVNJHyD0PwwzEFE7cxt+Y+b45inB1SAGIj+D117Wv2f5TKcgmBu5q5lARnnbKNkRDJVIj9jpq8YA==', '2015-08-19 10:42:14', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, 'Arthur', 'Voncken', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `media__gallery`
--

CREATE TABLE IF NOT EXISTS `media__gallery` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `default_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `media__gallery_media`
--

CREATE TABLE IF NOT EXISTS `media__gallery_media` (
`id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `media__media`
--

CREATE TABLE IF NOT EXISTS `media__media` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
`id` int(11) NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortTitle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `isEnable` tinyint(1) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `publishAt` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `sector` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `offer`
--

INSERT INTO `offer` (`id`, `reference_id`, `language`, `title`, `slug`, `shortTitle`, `isEnable`, `location`, `body`, `publishAt`, `createdAt`, `updatedAt`, `sector`) VALUES
(1, NULL, 'fr', 'test', 'test', 'test', 1, 'ACENSI', 'testestes', '2015-08-13 00:00:00', '2015-08-13 00:00:00', '2015-08-13 00:00:00', ''),
(2, 1, 'en', 'englishtest', 'englishtest', 'englishtest', 1, 'englishtest', 'englishtest', '2015-08-14 00:00:00', '2015-08-14 00:00:00', '2015-08-14 00:00:00', ''),
(3, NULL, 'fr', 'offre2', 'offre2', 'offre', 1, 'Paris', 'deadzedaedaze', '2015-08-14 00:00:00', '2015-08-14 00:00:00', '2015-08-14 00:00:00', ''),
(4, NULL, 'fr', 'offre4577', 'offre4577', 'offre4577', 1, 'dfed', 'dezeade', '2015-08-14 00:00:00', '2015-08-14 00:00:00', '2015-08-14 00:00:00', ''),
(5, NULL, 'fr', 'the offer', 'theoffer', 'offer', 1, 'dazede', 'eddaze', '2015-08-14 00:00:00', '2015-08-14 00:00:00', '2015-08-14 00:00:00', ''),
(6, NULL, 'fr', 'Consultant Support applicatif en Finance de marché (H/F)', '2015-08-consultant-support-applicatif-en-finance-de-marche-h-f', 'short', 1, 'Paris', 'CONTEXTE\r\n\r\nDans le cadre de son développement, ACENSI recherche un Consultant Support applicatif en Finance de marché (H/F).\r\n\r\nMISSION\r\n\r\nNous recherchons pour accompagner un de nos clients, grand compte en finance de marché, un(e) Consultant(e)\r\n\r\nSupport applicatif pour intervenir sur des applications "pre-trade" des marchés de capitaux.\r\n\r\nDans ce cadre, vous serez en charge des missions suivantes :\r\n\r\n- Support des applications sous mandat (Reuters, Bloomberg, systèmes d’adjudications), des banques centrales, accès aux courtiers...)\r\n\r\n- Maintenance évolutive de ces applications\r\n\r\n- Analyse fonctionnelle et technique des anomalies rencontrées\r\n\r\n- Suivi de la correction de bugs\r\n\r\n- Mise en place de la solution en coordination avec d’autres équipes\r\n\r\n- Maintenance des référentiels applicatifs\r\n\r\n- Mise à jour de la documentation\r\n\r\n- Création et maintien d’une base de connaissances\r\n\r\nDe fortes connaissances des domaines techniques et fonctionnels sont impératives pour ce poste.\r\nPROFIL\r\n\r\nDe formation Bac+4/5, vous justifiez d’une première expérience significative en tant que Consultant support applicatif en finance de marché.\r\n\r\nLa maitrise de l’anglais est impérative pour ce poste en raison de son contexte international.\r\n\r\nDe bonnes connaissances en Unix, SQL, Windows, Shell sont un plus.\r\n\r\nDoté(e) d''un excellent relationnel, vous avez le sens du service, et une capacité d''analyse et de synthèse', '2015-08-21 17:00:00', '2015-08-21 17:01:27', '2015-08-21 17:01:27', '');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `title`, `slug`, `body`, `rank`, `subtitle`, `reference_id`, `language`) VALUES
(11, 'France', 'france', 'Lorem ipsum dolor sit amet, sumo eripuit ponderum per ad, et eum timeam inermis, omnis dissentiet consequuntur sea an. Has eu mutat epicuri disputando. Exerci impetus contentiones eu vis, possit splendide eu mea, id est dico facer forensibus. Simul laudem te eum, inermis tibique eu qui, omnis solum ea vis. Id quo doctus accumsan eleifend.\r\n\r\nNisl dolores ei quo, eos sint consequuntur eu, qui mucius meliore et. Affert offendit intellegat ad vis, ea eum tale nusquam. Id sit nobis abhorreant quaerendum. Eos ea verear persius euripidis, ex vim philosophia instructior, vis in quas periculis adversarium. In cum voluptaria ullamcorper, his eu hinc movet homero.\r\n\r\nEx ius enim ponderum scriptorem, vis et mutat similique adolescens, erat ceteros sententiae vis no. Tale purto feugait eu quo, sit aperiri admodum ea. Sit in dolor accommodare, mea et rebum cotidieque. Dicant graecis signiferumque qui no, solum audire vocibus sed ex. Ei dicunt voluptua platonem eum, te duo odio utinam persequeris, impetus ocurreret deterruisset eu ius.\r\n\r\nTe nam tamquam quaestio evertitur. Nec qualisque honestatis te, te inani aliquip democritum sed. Denique efficiantur sed id, vidit perfecto an vix. Et nec minim consul option, in eos fugit offendit gubergren. Ea nam commodo tincidunt consequuntur, ridens aeterno ne usu. Qui evertitur suscipiantur eu. Ei sit aeterno tamquam dolorem, cu assueverit comprehensam vituperatoribus est.\r\n\r\nId est ferri latine. Velit electram sea at, vix ei falli verterem. Usu summo nulla urbanitas no. Ne eum debitis percipitur appellantur, amet percipit reprehendunt eos te.', 1, 'France', NULL, 'fr'),
(12, 'Angleterre', 'angleterre', 'Angleterre', 1, 'Angleterre', 11, 'en'),
(13, 'Offres', 'Offres', 'erad', 3, 'Les Offres', NULL, 'fr'),
(14, 'Test', '', 'daaedazedazedaze', 4, 'test', NULL, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `translation`
--

CREATE TABLE IF NOT EXISTS `translation` (
`id` int(11) NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apply`
--
ALTER TABLE `apply`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_7CEEA31B53C674EE` (`offer_id`), ADD KEY `IDX_7CEEA31BA76ED395` (`user_id`);

--
-- Index pour la table `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
 ADD PRIMARY KEY (`id`), ADD KEY `log_class_lookup_idx` (`object_class`), ADD KEY `log_date_lookup_idx` (`logged_at`), ADD KEY `log_user_lookup_idx` (`username`), ADD KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`);

--
-- Index pour la table `ext_translations`
--
ALTER TABLE `ext_translations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`), ADD KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`), ADD UNIQUE KEY `UNIQ_957A647986383B10` (`avatar_id`), ADD UNIQUE KEY `UNIQ_957A6479CCFA12B8` (`profile_id`);

--
-- Index pour la table `media__gallery`
--
ALTER TABLE `media__gallery`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_80D4C5414E7AF8F` (`gallery_id`), ADD KEY `IDX_80D4C541EA9FDD75` (`media_id`);

--
-- Index pour la table `media__media`
--
ALTER TABLE `media__media`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offer`
--
ALTER TABLE `offer`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_29D6873E1645DEA9` (`reference_id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_140AB6202B36786B` (`title`), ADD KEY `IDX_140AB6201645DEA9` (`reference_id`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_4EEA9393A76ED395` (`user_id`);

--
-- Index pour la table `translation`
--
ALTER TABLE `translation`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_B469456F1645DEA9` (`reference_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `apply`
--
ALTER TABLE `apply`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ext_translations`
--
ALTER TABLE `ext_translations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `media__gallery`
--
ALTER TABLE `media__gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media__media`
--
ALTER TABLE `media__media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offer`
--
ALTER TABLE `offer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `translation`
--
ALTER TABLE `translation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apply`
--
ALTER TABLE `apply`
ADD CONSTRAINT `FK_7CEEA31B53C674EE` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`),
ADD CONSTRAINT `FK_7CEEA31BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `fos_user`
--
ALTER TABLE `fos_user`
ADD CONSTRAINT `FK_957A647986383B10` FOREIGN KEY (`avatar_id`) REFERENCES `media__media` (`id`),
ADD CONSTRAINT `FK_957A6479CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Contraintes pour la table `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
ADD CONSTRAINT `FK_80D4C5414E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`),
ADD CONSTRAINT `FK_80D4C541EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`);

--
-- Contraintes pour la table `offer`
--
ALTER TABLE `offer`
ADD CONSTRAINT `FK_29D6873E1645DEA9` FOREIGN KEY (`reference_id`) REFERENCES `offer` (`id`);

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
ADD CONSTRAINT `FK_140AB6201645DEA9` FOREIGN KEY (`reference_id`) REFERENCES `page` (`id`);

--
-- Contraintes pour la table `profile`
--
ALTER TABLE `profile`
ADD CONSTRAINT `FK_4EEA9393A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `translation`
--
ALTER TABLE `translation`
ADD CONSTRAINT `FK_B469456F1645DEA9` FOREIGN KEY (`reference_id`) REFERENCES `translation` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
