#!/bin/sh

# We assume OpenAPI Generator is installed using `npm i -g @openapitools/openapi-generator-cli`
openapi-generator generate -i MDES_Digital_Enablement.yaml -g csharp-netcore -c config.json -o .

# Remove some generated files we don't use in this tutorial
rm .gitignore
rm git_push.sh
rm .openapi-generator-ignore
rm Acme.App.MastercardApi.Client.sln
