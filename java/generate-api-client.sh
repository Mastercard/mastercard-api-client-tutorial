#!/bin/sh

# We assume OpenAPI Generator is installed using `npm i -g @openapitools/openapi-generator-cli`
openapi-generator-cli -g java --library okhttp-gson -c config.json -i MDES_Digital_Enablement.yaml -o .

# Remove some generated files we don't use in this tutorial
rm .openapi-generator-ignore
rm .gitignore
rm .travis.yml
rm build.sbt
rm git_push.sh
rm -rf gradle
rm -rf api
rm gradle*
rm *gradle
rm src/main/AndroidManifest.xml
shopt -s extglob
pushd src/test/java/com/mastercard/developer/mdes_digital_enablement_client/
rm -rf model
cd api
rm -fv !(TokenizeApiTest.java)
popd
