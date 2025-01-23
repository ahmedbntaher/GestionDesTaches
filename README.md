# Gestionnaire de Tâches

Application full-stack de gestion de tâches avec Symfony (backend API) et React (frontend).

## 📋 Table des matières
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Structure du Projet](#structure-du-projet)
- [Configuration](#configuration)
- [Utilisation](#utilisation)

## ⚙️ Prérequis

**Backend (Symfony) :**
- PHP 8.1 ou supérieur
- Composer 2.x
- Symfony CLI 5.x+
- Base de données (MySQL/MariaDB ou SQLite)
- Extensions PHP : `pdo`, `mbstring`, `xml`

**Frontend (React) :**
- Node.js 16.x ou supérieur
- npm 8.x ou supérieur

## 🚀 Installation

### Backend Symfony
```bash
# Cloner le dépôt
git clone https://github.com/ahmedbntaher/task-manager

# Installer les dépendances
composer install

# Copier le fichier d'environnement
cp .env .env.local

# Configurer la base de données dans .env.local
DATABASE_URL="mysql://user:password@127.0.0.1:3306/task_manager?serverVersion=8.0"

# Créer la base de données
php bin/console doctrine:database:create

# Exécuter les migrations
php bin/console doctrine:migrations:migrate

# Démarrer le serveur
symfony serve:start

#Frontend React
# Accéder au dossier frontend
cd ../frontend

# Installer les dépendances
npm install

# Démarrer l'application
npm start

#📂 Structure du Projet
.
├── backend/          # API Symfony
│   ├── config/
│   ├── migrations/
│   ├── public/
│   ├── src/
│   │   └── Controller/
│   └── ...
├── frontend/         # Application React
│   ├── public/
│   ├── src/
│   │   ├── components/
│   │   └── context/
│   └── ...
└── README.md

#⚙️ Configuration Backend
##Configurer l'URL de l'API dans src/context/TaskContext.jsx : 
const API_BASE = 'http://localhost:8000';

#🖥️ Utilisation
##Endpoints API :
# Lister les tâches
GET http://localhost:8000/tasks/

# Créer une tâche
POST http://localhost:8000/tasks/
Body: { "title": "Ma tâche", "description": "Description" }

# Modifier une tâche
PUT http://localhost:8000/tasks/1
Body: { "title": "Nouveau titre", "completed": true }

# Supprimer une tâche
DELETE http://localhost:8000/tasks/1

Interface Utilisateur :

Accéder à l'application : http://localhost:3000

Ajouter/modifier des tâches via le formulaire

Cocher les cases pour marquer comme terminé

Supprimer avec l'icône 🗑️


