#!/bin/bash

GREEN='\033[0;32m'
CYAN='\033[1;36m'
NC='\033[0m' # No Color
RED='\033[0;31m'

CONTAINER=$1
INPUT_COMMAND=$2
ARGUMENT=$3

if [ -n "$INPUT_COMMAND" ]; then
	echo ""
	echo "${GREEN}>> Running Command ${NC}"
	echo ""
	cd ~/challenge/challenge
		if [ -n "$ARGUMENT" ]; then
			docker-compose exec ${CONTAINER} php /var/www/api/bin/console ${INPUT_COMMAND} ${ARGUMENT}
		else
			docker-compose exec ${CONTAINER} php /var/www/api/bin/console ${INPUT_COMMAND}
		fi
	exit
else
    echo ""
    echo "${RED}A valid command was not entered. Running console command naked ${NC}"
    echo ""
    cd ~/challenge/challenge
    docker-compose exec ${CONTAINER} php /var/www/api/bin/console
	exit
fi
