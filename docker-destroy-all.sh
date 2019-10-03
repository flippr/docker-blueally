#!/bin/bash

docker stop $(docker ps -a -q) && docker rm $(docker ps -a -q) && docker rmi $(docker images -q) -f && docker volume ls -f dangling=true && docker volume prune