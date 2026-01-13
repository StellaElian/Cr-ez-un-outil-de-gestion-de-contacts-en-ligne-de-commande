<<<<<<< HEAD
# 📇 Gestionnaire de Contacts en PHP (POO)

## 📌 Description
Ce projet est une application en ligne de commande (CLI) développée en PHP,
permettant de gérer une liste de contacts stockés en base de données.

Il a été réalisé dans le cadre d’un exercice de programmation orientée objet (POO).

---

## ⚙️ Prérequis
- PHP ≥ 8.0
- MySQL
- PDO activé
- Terminal (Mac / Linux / Windows)

---
# 📇 Gestionnaire de contacts en PHP (POO)

## 📝 Description du projet

Ce projet est un **outil de gestion de contacts en ligne de commande**, développé en **PHP avec la programmation orientée objet (POO)**.

Il permet de :
- lister des contacts
- afficher le détail d’un contact
- ajouter un nouveau contact
- supprimer un contact

Le programme fonctionne **depuis le terminal**, sans interface graphique.

---

## 🎯 Objectifs pédagogiques

Ce projet a pour but de :
- comprendre la **programmation orientée objet en PHP**
- manipuler une **base de données avec PDO**
- utiliser des **requêtes préparées** (sécurité SQL)
- structurer un projet avec des **classes claires**
- lire et interpréter des **commandes utilisateur**

---

## ⚙️ Prérequis

Avant de lancer le projet, vous devez avoir :
- PHP ≥ 8.0
- MySQL
- Un serveur local (ex : XAMPP)
- Un terminal

---

## 🗂️ Structure du projet

Le projet est organisé en plusieurs fichiers, chacun ayant un rôle précis.

- `main.php`  
  Fichier principal du programme.  
  Il récupère la commande tapée par l’utilisateur dans le terminal et appelle les bonnes actions.

- `command.php`  
  Ce fichier analyse la commande tapée (list, detail, create, delete).  
  Il vérifie si la commande est correcte et appelle les méthodes correspondantes.

- `Contact.php`  
  Cette classe représente un **contact**.  
  Un objet Contact correspond à **une seule personne** (nom, email, téléphone).  
  Cette classe ne communique pas avec la base de données.

- `ContactManager.php`  
  Cette classe s’occupe de **toutes les interactions avec la base de données**.  
  Elle permet d’ajouter, lire, afficher et supprimer des contacts (CRUD).

- `DBConnect.php`  
  Ce fichier contient la connexion à la base de données avec PDO.  
  Une seule connexion est créée et réutilisée dans tout le projet.

- `README.md`  
  Fichier de documentation qui explique le fonctionnement du projet.

- `css/`  
  Dossier contenant les fichiers CSS.

- `img/`  
  Dossier contenant les images utilisées dans le projet