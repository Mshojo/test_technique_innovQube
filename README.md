# 🏠 Laravel Test - Gestion de Propriétés

Projet Laravel réalisé dans le cadre d’un test technique. Il s'agit d'une application de gestion de propriétés (création, édition, suppression, etc.).

## 🔧 Prérequis

- PHP >= 8.2
- Composer
- MySQL
- Node.js & npm (pour les assets front)
- Laravel 12.x
- Un serveur local (Valet, XAMPP, Laravel Sail, etc.)

## 🚀 Installation

1. Cloner le projet :
   git clone https://github.com/ton-utilisateur/laravel-test.git
   cd laravel-test

2. Installer les dépendances :
   composer install
   npm install && npm run dev

3. Copier le fichier .env :
   cp .env.example .env

4. Générer la clé d'application :
   php artisan key:generate

5. Configurer le fichier .env avec vos informations de base de données :
   DB_DATABASE=laravel_test
   DB_USERNAME=root
   DB_PASSWORD=secret

6. Créer une base de données MySQL vide nommée `laravel_test` (ou celle indiquée dans `.env`).

## 📦 Base de données

Option A : Utiliser les migrations (recommandé) :
   php artisan migrate --seed

Option B : Importer un dump SQL :
   - Ouvrir phpMyAdmin ou autre
   - Créer la base `laravel_test`
   - Importer `database/exports/database.sql` fourni avec le projet

## 🖥️ Lancement

Démarrer le serveur local :
   php artisan serve

Accéder à l'application :
   http://127.0.0.1:8000

## 🔑 Accès Admin

L’interface d’administration utilise Filament :

URL : http://127.0.0.1:8000/admin

Si un utilisateur admin est déjà seedé :
   Email : admin@example.com
   Mot de passe : password

Sinon, en créer un via Tinker :
   php artisan tinker

Puis :

   use App\Models\User;
   use Illuminate\Support\Facades\Hash;

   User::create([
       'name' => 'Admin',
       'email' => 'admin@example.com',
       'password' => Hash::make('password'),
   ]);

## 📁 Structure du projet

laravel-test/
├── app/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── exports/
│       └── database.sql
├── public/
├── resources/
├── routes/
│   └── web.php
├── .env.example
├── composer.json
├── README.md

## 🛠️ Stack technique

- Laravel 12.x
- MySQL
- Filament (admin panel)
- Livewire
- Tailwind CSS
- PHP 8.2

## 🐞 Problèmes fréquents

Erreur : Field 'price_per_night' doesn't have a default value

Cela signifie que ce champ est requis mais n’a pas été fourni.

Solutions :
- Vérifiez que le champ est bien rempli dans le formulaire ou le seeder.
- Ou bien, ajoutez une valeur par défaut dans la migration :
     $table->decimal('price_per_night', 8, 2)->default(0);

Puis relancez :
     php artisan migrate:fresh --seed

## 📬 Contact

Pour toute question ou retour : votre.email@exemple.com
