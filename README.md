# Projet de Gestion Universitaire

## Description
Ce projet est une application web PHP évoluant en trois versions. Chaque version propose des fonctionnalités supplémentaires et applique des paradigmes de programmation différents : procédurale, orientée objet, et utilisation d’un ORM (Doctrine) avec Blade.

---

## Structure Générale du Projet

---

## Versions et Fonctionnalités

### Version 1 : Programmation procédurale
**Fonctionnalités :**
- **Étudiants :**
    - Ajouter, afficher, modifier, et supprimer les informations des étudiants (nom, prénom, email, filière).
- **Cours :**
    - Gérer les cours (nom du cours, code du cours, nombre d'heures).

**Structure du projet :**

**SQL de la base de données :**
```postgresql
CREATE TABLE etudiants
(
    id      SERIAL PRIMARY KEY,
    nom     VARCHAR(30) NOT NULL,
    prenom  VARCHAR(30) NOT NULL,
    email   VARCHAR(50) NOT NULL,
    filiere VARCHAR(20) NOT NULL
);

CREATE TABLE cours
(
    id     SERIAL PRIMARY KEY,
    nom    VARCHAR(50) NOT NULL,
    code   VARCHAR(50) NOT NULL,
    heures INT         NOT NULL
);
```
```yaml
Gestion-rendez-vous/
├── app/
│   ├── controllers/
│   │   ├── RendezVousController.php
│   │   ├── ClientController.php
│   ├── models/
│   │   ├── RendezVous.php
│   │   ├── Client.php
│   ├── Views/
│   │   ├── rendezvous/
│   │   │   ├── index.php
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── show.php
│   │   ├── clients/
│   │       ├── index.php
│   │       ├── create.php
│   │       ├── edit.php
│   │       ├── show.php
│   ├── database.php
├── public/
│   ├── index.php
```

### Version 2 : Programmation Orientée Objet
**Fonctionnalités :**
- **Rendez-vous :**
    - Ajouter, afficher, modifier, et supprimer des rendez-vous (date, heure, description, client).
- **Cours :**
    - Gérer les informations des clients (nom, prénom, email, téléphone).

**Structure du projet :**

**SQL de la base de données :**
```postgresql
CREATE TABLE client (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(25) NOT NULL,
    prenom VARCHAR(25) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telephone VARCHAR(11)
);

CREATE TABLE rendezvous (
    id SERIAL PRIMARY KEY,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    description TEXT NOT NULL,
    client_id INT NOT NULL,
    FOREIGN KEY (client_id) REFERENCES client(id)
);
```
```yaml
projet-gestion-ferme/
├── app/
│   ├── config/
│   │   ├── Bootstrap.php
│   │   ├── database.php
│   ├── controllers/
│   │   ├── AnimalController.php
│   │   ├── EquipmentController.php
│   ├── models/
│   │   ├── Animal.php
│   │   ├── Equipment.php
│   ├── Views/
│   │   ├── animal/
│   │   │   ├── index.html.twig
│   │   │   ├── create.html.twig
│   │   │   ├── edit.html.twig
│   │   ├── equipment/
│   │       ├── index.html.twig
│   │       ├── create.html.twig
│   │       ├── edit.html.twig
├── public/
│   ├── index.php
├── vendor/
├── composer.json
```

### Version 3 : Doctrine (ORM) et Blade (Moteur de Template)
**Fonctionnalités :**
- **Animaux:**
  - Ajouter, lister, modifier, et supprimer des animaux.
- **Équipements agricoles**
  - Ajouter, lister, modifier, et supprimer des équipements.

**Structure du projet :**

**SQL de la base de données :**

```postgresql
CREATE TABLE animaux
(
    id           SERIAL PRIMARY KEY,
    type         VARCHAR(10) NOT NULL,
    age          INT         NOT NULL,
    sante        VARCHAR(50) NOT NULL,
    idEquipement INT         NOT NULL,
    FOREIGN KEY (idEquipement) REFERENCES equipements (id)
);

CREATE TABLE equipements
(
    id            INT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
    nom           VARCHAR(30) NOT NULL,
    etat          VARCHAR(30) NOT NULL,
    disponibilite BOOLEAN     NOT NULL
);
```
**Installer les dépendances (pour la V3) :**
```composer log
composer install
```