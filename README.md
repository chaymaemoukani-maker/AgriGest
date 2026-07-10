<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# 🌱 AgriGest

## 📖 Description

AgriGest est une application web développée avec **Laravel 12** permettant de gérer les parcelles agricoles d'une exploitation.

L'application permet d'ajouter, consulter, modifier et supprimer des parcelles tout en enregistrant les informations suivantes :

* Nom de la parcelle
* Culture
* Superficie
* Date de plantation
* Statut

---

## 🚀 Fonctionnalités

* 📋 Afficher la liste des parcelles
* ➕ Ajouter une nouvelle parcelle
* 👁️ Consulter les détails d'une parcelle
* ✏️ Modifier une parcelle
* 🗑️ Supprimer une parcelle
* ✅ Validation des formulaires
* 🌱 Génération de données de test avec Factory et Seeder
* 🎨 Interface réalisée avec Bootstrap 5

---

## 🛠️ Technologies utilisées

* Laravel 12
* PHP 8.2
* MySQL
* Eloquent ORM
* Blade
* Bootstrap 5

---

## ⚙️ Installation

Cloner le projet :

```bash
git clone <url-du-repository>
```

Accéder au dossier :

```bash
cd agrigest
```

Installer les dépendances :

```bash
composer install
```

Créer le fichier `.env` :

```bash
cp .env.example .env
```

Générer la clé de l'application :

```bash
php artisan key:generate
```

Configurer la connexion à la base de données dans le fichier `.env`.

Exécuter les migrations :

```bash
php artisan migrate
```

Remplir la base de données :

```bash
php artisan db:seed
```

Lancer le serveur :

```bash
php artisan serve
```

Puis ouvrir :

```
http://127.0.0.1:8000
```

---

## 📂 Structure du projet

```
app/
 ├── Http/
 │    └── Controllers/
 ├── Models/

database/
 ├── migrations/
 ├── factories/
 └── seeders/

resources/
 └── views/
      └── parcelles/

routes/
 └── web.php
```

---

## 📸 Captures d'écran

* Page d'accueil
* Liste des parcelles
* Ajouter une parcelle
* Modifier une parcelle
* Détails d'une parcelle

---

## 👩‍💻 Réalisé par

**Chaymae**

