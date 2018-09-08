#!/bin/bash

set -e

if [ ! -f "/usr/local/bin/docker-compose" ]; then
  sudo bash -c "curl -L https://github.com/docker/compose/releases/download/1.22.0/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose"
  sudo chmod +x /usr/local/bin/docker-compose
fi
