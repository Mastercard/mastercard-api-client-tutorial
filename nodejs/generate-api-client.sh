openapi-generator generate -i MDES_Digital_Enablement.yaml -g javascript -o . -c config.json

rm -rf ./docs/
rm git_push.sh
rm .openapi-generator-ignore
rm .travis.yml

shopt -s extglob
cd test
rm -rf model
cd api
rm -fv !(TokenizeApi.spec.js)
cd ../..
