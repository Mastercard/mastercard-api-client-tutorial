#!/bin/bash

mv composer.json composer.json.bak
mv phpunit.xml.dist phpunit.xml.dist.bak

# We assume OpenAPI Generator is installed using `npm i -g @openapitools/openapi-generator-cli`
openapi-generator-cli generate -g php -c config.json -i MDES_Digital_Enablement.yaml -o .

# Remove some generated files we don't use in this tutorial
rm .openapi-generator-ignore
rm .gitignore
rm .travis.yml
rm git_push.sh
rm -rf gradle
rm -rf api
rm -rf lib/test
rm -rf test/Model
shopt -s extglob
cd test/Api
rm -fv !(TokenizeApiTest.php)
cd ../..

mv composer.json.bak composer.json
mv phpunit.xml.dist.bak phpunit.xml.dist