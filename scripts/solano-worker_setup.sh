#!/bin/bash

set -o errexit -o pipefail
cp .env.dist .env
docker-compose up -d --force-recreate
docker-compose exec web composer install
