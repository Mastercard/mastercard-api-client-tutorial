#!/bin/bash

mv Gemfile Gemfile.bak

openapi-generator generate -i MDES_Digital_Enablement.yaml -g ruby -o .


rm -rf ./docs/
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