# MicroCalendar 🎶

## Introduction 🖋

Honestly, this repo is mostly for me to play around with a working application that doesn't need yarn or npm to run.

It is based on MicroSymfony, a Symfony application skeleton.

Eventually I will port everything from https://github.com/tacman/calendar-bundle-demo, which DOES use webpack.

In the meantime, the only things this really does is show a problem using the awesome fullcalendar library as a module.

## Installation

```bash
git clone https://github.com/tacman/micro-calendar && cd micro-calendar && composer install && symfony server:start -d 
```

Note the lack of yarn install && yarn dev!

## Github Pages (Static)

I wanted to show the issue to the fullcalendar developers, but I didn't have an easy way to deploy a Symfony app.  

So I created static pages using https://github.com/StenopePHP/Stenope and configured github pages to point to the /docs directory.  

```bash
bin/console asset-map:compile
bin/console -e prod cache:clear
bin/console -e prod stenope:build ./docs --base-url /micro-calendar/
rm public/assets/ -rf 
```

You need the public/assets directory to get the right js files, but need to delete it before continuing to develop, otherwise you'll get the cached version of those files.

## AssetMapper

The AssetMapper component is the key that allows this site to work with javascript libraries without a build step.  It's using version 6.3 now, although will use 6.4 as soon as possible, since that version manages CSS better.  
