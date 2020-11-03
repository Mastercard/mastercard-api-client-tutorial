#!/bin/bash

mv Gemfile Gemfile.bak

# We assume OpenAPI Generator is installed using `npm i -g @openapitools/openapi-generator-cli`
openapi-generator generate -i MDES_Digital_Enablement.yaml -g ruby -o .

# Remove some generated files we don't use in this tutorial
rm git_push.sh
rm .openapi-generator-ignore
rm .travis.yml
shopt -s extglob
cd spec
rm -fv !(spec_helper.rb)
rm -rf models
cd api

rm -fv !(tokenize_api_spec.rb)
cd ../..

mv Gemfile.bak Gemfile