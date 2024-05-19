# Berani Base Architect Laravel 11

Used to demonstrate and develop library, can be used for template

# Setup

## Prerequisite

1. Git, Web Server, MySQL, PHP ^8.2, Composer, NodeJS ^20

 ```bash
sudo apt install -y apache2 git mariadb-server unzip
apt -y install php8.2 php8.2-{cli,gd,mysql,pdo,mbstring,tokenizer,bcmath,xml,fpm,curl,zip,intl,bcmath} 
# Install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
```

[If you're Windows User](docs/Setup.md)

```mysql
# Create database
CREATE DATABASE berani_base;
# Create user
CREATE USER 'berani_base'@'localhost' IDENTIFIED BY 'berani_base_passwd';
GRANT ALL PRIVILEGES ON berani_base.* TO 'berani_base'@'localhost';
FLUSH PRIVILEGES;
```

## Step

1. `git clone --recurse-submodules https://github.com/beranidigital/berani-base-architect.git`
    1. Add `-b <branch>` to clone specific branch
2. `cd berani-learning-web`
3. `composer install`
4. `cp .env.example .env`
5. Set up the env
6. `php artisan key:generate`
7. `php artisan migrate --seed`
8. `npm install && npm run build`
    1. `npm run dev` for development
9. `php artisan storage:link` to link storage and FilePond to work

## Setup CRON jobs
list of CRON jobs with recommended pattern
- `php artisan queue:work --once` with the following expression `* * * * *`

Example in CPanel:
- `/usr/local/bin/php -q /home/user/public_html/exampel.com/artisan queue:work --once`

# Common Commands

```bash
php artisan make:model --factory --force --migration Model
php artisan make:filament-resource --force -G Model
```

## Production

```bash
# Set APP_ENV=production
composer install --no-dev
npm install --production
npm run build
php artisan optimize
```

## Update procedure

- `git submodule init`
- `git submodule update --remote --merge`
- `git submodule update --init --recursive`
- `composer install`
- `npm install && npm run build`
- `php artisan migrate`

# Entity Relationship Diagram

