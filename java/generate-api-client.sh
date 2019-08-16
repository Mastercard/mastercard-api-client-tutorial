#!/bin/sh
openapi-generator generate -g java --library okhttp-gson -c config.json -i MDES_Digital_Enablement.yaml -o .