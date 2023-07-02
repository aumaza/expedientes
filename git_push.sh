#!/bin/bash

git add *
git branch -M main
git commit -m "$1"
git push -u origin "$2"
