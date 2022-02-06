# Symfony-Ticket CRUD
  
A simple CRUD App With Symfony 5
Symfony version: 5
Symfony skeleton: symfony/skeleton
Template engine: Twig
Object Relational Mapper (ORM): Doctrine
  
How to start
# Install dependencies
composer install

# Edit the .env file (or create .env.local) and add DB params
php bin/console doctrine:database:create

# Run migrations
php bin/console doctrine:migrations:migrate

# Create host and Check on browser

