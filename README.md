[![Build Status](https://sonarcloud.io/api/project_badges/quality_gate?project=Park-Queue-Times)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)

[![Build Status](https://travis-ci.com/cvilleger/disneyland.svg?branch=master)](https://travis-ci.com/cvilleger/disneyland)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=security_rating)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)

[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=ncloc)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=bugs)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=code_smells)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=sqale_index)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)

[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=coverage)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)
[![Build Status](https://sonarcloud.io/api/project_badges/measure?project=Park-Queue-Times&metric=duplicated_lines_density)](https://sonarcloud.io/dashboard?id=Park-Queue-Times)

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b47de39978d5415a92f481a97d26212a)](https://www.codacy.com/app/cvilleger/disneyland?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=cvilleger/disneyland&amp;utm_campaign=Badge_Grade)
[![CodeFactor](https://www.codefactor.io/repository/github/cvilleger/disneyland/badge)](https://www.codefactor.io/repository/github/cvilleger/disneyland)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/b47de39978d5415a92f481a97d26212a)](https://www.codacy.com/app/cvilleger/disneyland?utm_source=github.com&utm_medium=referral&utm_content=cvilleger/disneyland&utm_campaign=Badge_Coverage)

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
