<p align="center"><img src="./public/images/logo.png" width="300" alt="Laravel Logo"></a></p>

# SAE 301 : Développement d'une application

**Groupe_1_1 : Kyllian Arnaud, Pol Lamothe, Brieuc Le Carluer, Thomas Souchet**

+ *Laurelin* est un site d'e-commerce de vente de bijoux de luxe.

## Technologies choisies

+ Framework PHP : **[Laravel](https://laravel.com/)**
+ Framework JS : **[Vue.js](https://vuejs.org/)**
+ Base de données : **[MariaDB](https://mariadb.org/)**

Nous utilisons aussi **[Inertia](https://inertiajs.com/)** qui permet de faire le lien plus facilement entre Laravel et Vue en évitant d'avoir à développer une API.

## Organisation du projet

Nous avons suivi l'architecture MVC :

Malgré le fait que Laravel offre une approche plus assouplie de l'implémentation de l'architecture MVC, nous avons fait le choix de réorganiser le code pour qu'il corresponde plus à l'approche MVC en séparant totalement la logique métier de la base de données et des classes de l'ORM, et aussi en limitant la logique dans les contrôleurs avec l'utilisation de classes de services.

+ **Modèle** : les classes du modèle se trouvent dans le dossier `app/Domain`, elles sont réparties par fonctionnalitées (utilisateur, produit, etc). Dans chaque sous-dossier de `app/domain` on trouve trois dossiers `entities` qui contient les classes métier, `repositories` qui gère la persistance dans la base de données et `services` qui gère l'interaction avec les sessions et les cookies et met à disposition des fonctionnalités pour les contrôleurs. Les fichiers qui sont présents dans le dossier `app/Models` correspondent seulement aux classes de l'ORM Eloquent utilisé par Laravel.
+ **Vue** : du fait de l'utilisation d'un framework JS, les vues ne sont pas stockées dans `ressources/views` mais dans `ressources/js/Pages`. Dans ce dossier on retrouve les différentes pages du sites qui utilisent aussi certains composant présents dans le sous-dossier `Components`.
+ **Contrôleur** : ils sont présents dans le dossier `app/Http/Controllers`.

### Capture d'écran de la page d'accueil

![Home page](./uml/HomePage.png)

## Déploiement

### Avec Docker (Recommandé)

Le projet utilise Docker Compose pour orchestrer les services (PHP-FPM, Nginx, MySQL, Redis).

1. **Configuration de l'environnement :**
   ```bash
   cp .env.example .env
   # Modifiez les variables DB_* pour correspondre à la configuration docker-compose
   ```

2. **Lancer les conteneurs :**
   ```bash
   docker-compose up -d
   ```

3. **Initialisation de l'application :**
   ```bash
   docker-compose exec app composer install
   docker-compose exec app php artisan key:generate
   docker-compose exec app php artisan storage:link
   docker-compose exec app php artisan migrate --seed
   docker-compose exec app npm install
   docker-compose exec app npm run build
   ```

### Déploiement manuel (Sans Docker)

1. **Prérequis :** PHP >= 8.2, Composer, Node.js & NPM, MySQL/MariaDB.
2. **Installation :** Suivre les étapes détaillées dans [INSTALLATION.md](INSTALLATION.md).
3. **Optimisations pour la production :**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Tests et Qualité

### Lancer les tests

Vous pouvez exécuter les tests automatisés (Unitaires et Feature) avec PHPUnit :

**Via Docker :**
```bash
docker-compose exec app php artisan test
```

**Localement :**
```bash
php artisan test
```

### Autres outils
- **Linting (Pint) :** `docker-compose exec app ./vendor/bin/pint`
- **Tests de charge :** Voir le dossier `loadTest/`
