#!/bin/sh

# We assume OpenAPI Generator is installed using `npm i -g @openapitools/openapi-generator-cli`
openapi-generator generate -g java --library okhttp-gson -c config.json -i MDES_Digital_Enablement.yaml -o .

# Remove some generated files we don't use in this tutorial
rm .gitignore
rm -rf .gradle
rm -rf .idea
rm -rf target
rm -rf *iml
rm -rf gradle*
rm -rf .settings
rm -rf build.sbt
rm -rf git_push.sh
rm .openapi-generator-ignore
rm .travis.yml
shopt -s extglob
pushd src/test/java/com/mastercard/developer/mdes_digital_enablement_client/
rm -rf model
cd api
rm -fv !(TokenizeApiTest.java)
popd
