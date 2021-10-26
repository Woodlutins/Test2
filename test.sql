-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 oct. 2021 à 17:38
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

--
-- Structure de la table `etr`
--

CREATE TABLE `etr` (
  `IdEtr` int(11) NOT NULL,
  `Libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etr`
--

INSERT INTO `etr` (`IdEtr`, `Libelle`) VALUES
(1, 'Machin'),
(2, 'Chose');

--
-- Structure de la table `exemple`
--

CREATE TABLE `exemple` (
  `IdExemple` int(11) NOT NULL,
  `Texte` varchar(255) DEFAULT NULL,
  `Date` date NOT NULL,
  `Bool` tinyint(1) NOT NULL,
  `Nombre` int(11) NOT NULL,
  `IdEtr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exemple`
--

INSERT INTO `exemple` (`IdExemple`, `Texte`, `Date`, `Bool`, `Nombre`, `IdEtr`) VALUES
(1, 'x', '2021-08-20', 0, 5, 1),
(2, 'Cookie with sugar and chocolate.\r\n', '2021-09-17', 1, 356, 1),
(7, 'I want to meet a monster', '2021-08-30', 1, 45, 2);

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `IdUsers` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Mdp` varchar(32) NOT NULL,
  `Rang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`IdUsers`, `User`, `Mdp`, `Rang`) VALUES
(1, 'Wood', '63a9f0ea7bb98050796b649e85481845', 'user'),
(2, 'Test', 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
(4, 'root', '63a9f0ea7bb98050796b649e85481845', 'user'),
(7, 'Woodlutins', '37c22e384fa562edd4535ed3c83335ea', 'user'),
(14, 'Woody', '63a9f0ea7bb98050796b649e85481845', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etr`
--
ALTER TABLE `etr`
  ADD PRIMARY KEY (`IdEtr`);

--
-- Index pour la table `exemple`
--
ALTER TABLE `exemple`
  ADD PRIMARY KEY (`IdExemple`),
  ADD KEY `IdEtr` (`IdEtr`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUsers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etr`
--
ALTER TABLE `etr`
  MODIFY `IdEtr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `exemple`
--
ALTER TABLE `exemple`
  MODIFY `IdExemple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `IdUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `exemple`
--
ALTER TABLE `exemple`
  ADD CONSTRAINT `exemple_ibfk_1` FOREIGN KEY (`IdEtr`) REFERENCES `etr` (`IdEtr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
