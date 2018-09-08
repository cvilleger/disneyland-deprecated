#!/bin/bash

set -o errexit -o pipefail
sudo docker-compose logs > $HOME/results/$TDDIUM_SESSION_ID/session/docker-compose.log &
sudo docker-compose stop
