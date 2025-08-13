#!/bin/bash
mkdir -p /site/wwwroot/storage/framework/cache
mkdir -p /site/wwwroot/storage/framework/views
mkdir -p /site/wwwroot/storage/framework/sessions
mkdir -p /site/wwwroot/bootstrap/cache
chmod -R 775 /site/wwwroot/storage /site/wwwroot/bootstrap/cache
