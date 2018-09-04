[![Build Status](https://travis-ci.com/cvilleger/disneyland.svg?branch=master)](https://travis-ci.com/cvilleger/disneyland)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b47de39978d5415a92f481a97d26212a)](https://www.codacy.com/app/cvilleger/disneyland?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=cvilleger/disneyland&amp;utm_campaign=Badge_Grade)

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
docker-compose exec web composer install
```

**5.** Drop, create and update your database

```
docker-compose exec web php bin/console doctrine:database:drop --force
docker-compose exec web php bin/console doctrine:database:create
docker-compose exec web php bin/console doctrine:migration:migrate 
```
