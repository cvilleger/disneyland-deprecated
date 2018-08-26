### Install

**1.** Copy `.env.dist` to `.env`

```
cp .env.dist .env
```

**2.** Copy `docker-compose.override.yml.dist` to `docker-compose.override.yml`

```
cp docker-compose.override.yml.dist docker-compose.override.yml
```

**3.** Builds, (re)creates and starts containers in the background

```
docker-compose up -d
```

**4.** Install dependencies

```
docker-compose exec --user=application web composer install
```

**5.** Drop, create and update your database

```
docker-compose exec web php bin/console doctrine:database:drop --force
docker-compose exec web php bin/console doctrine:database:create
docker-compose exec web php bin/console doctrine:schema:update --force
```
