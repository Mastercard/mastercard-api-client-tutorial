#!/bin/sh

# We assume OpenAPI Generator is installed using `npm i -g @openapitools/openapi-generator-cli`
openapi-generator-cli  generate -i MDES_Digital_Enablement.yaml -g csharp -c config.json -o . --additional-properties=library=restsharp --additional-properties=targetFramework=netstandard2.1,netcoreapp3.1
# Remove some generated files we don't use in this tutorial
rm -rf src
rm appveyor.yml
rm .gitignore
rm git_push.sh
rm .openapi-generator-ignore
rm Acme.App.MastercardApi.Client.sln
rm -fr Acme.App.MastercardApi.Client.Test
