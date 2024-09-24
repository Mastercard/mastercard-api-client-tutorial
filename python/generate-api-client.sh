#!/bin/bash

mv test-requirements.txt test-requirements.txt.bak

# We assume OpenAPI Generator is installed using `npm i -g @openapitools/openapi-generator-cli`
# Current openapi generator version used is 5.2.1
openapi-generator generate -i MDES_Digital_Enablement.yaml -g python -o .

# Remove some generated files we don't use in this tutorial
rm .gitlab-ci.yml
rm git_push.sh
rm .openapi-generator-ignore
rm .travis.yml

shopt -s extglob
cd test
rm -fv !(test_tokenize_api.py|__init__.py)
cd ..

mv test-requirements.txt.bak test-requirements.txt
