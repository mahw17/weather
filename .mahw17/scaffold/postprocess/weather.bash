#!/usr/bin/env bash
#
# mahw17/weather
#
# Integrate the weather module onto an existing anax installation.
#

# Copy the configuration files
rsync -av vendor/mahw17/weather/config ./

# Copy the views
rsync -av vendor/mahw17/weather/view ./

# Copy the css and javascripts
rsync -av vendor/mahw17/weather/htdocs ./

# Copy the documentation anf flat files
rsync -av vendor/mahw17/weather/content ./
