#!/bin/bash

PROJECT_DIR=/home/ubuntu/stairwell-website

docker run -i -t --rm -p 80 \
    -v $PROJECT_DIR/stairwell-theme:/var/www/html/themes/stairwell \
    -e VIRTUAL_HOST=stairwell.rfjones.ca \
    --name stairwell-development \
    stairwell-website
