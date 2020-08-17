#!/bin/sh

mv composer.json composer.json.bak

openapi-generator generate -g php -c config.json -i MDES_Digital_Enablement.yaml -o .

rm -rf ./docs/
rm git_push.sh
rm .openapi-generator-ignore
rm .travis.yml
rm -rf test/Model
shopt -s extglob
cd test/Api
rm -fv !(TokenizeApiTest.php)
cd ../..

mv composer.json.bak composer.json