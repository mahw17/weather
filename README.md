Weather
==================================
[![Latest Stable Version](https://poser.pugx.org/mahw17/weather/v/stable)](https://packagist.org/packages/mahw17/weather)
[![Build Status](https://travis-ci.org/mahw17/weather.svg?branch=master)](https://travis-ci.org/mahw17/weather)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mahw17/weather/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mahw17/weather/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mahw17/weather/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mahw17/weather/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/mahw17/weather/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mahw17/weather/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/mahw17/weather/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Table of content
------------------------------------

* [Install as Anax module](#Install-as-Anax-module)
* [Install using scaffold postprocessing file](#Install-using-scaffold-postprocessing-file)
* [Install and setup Anax](#Install-and-setup-Anax)
* [Dependency](#Dependency)
* [License](#License)


Install as Anax module
------------------------------------

This is how you install the module into an existing Anax installation.

Install using composer.

```
composer require mahw17/weather
```

Copy the needed configuration and setup the weather as a route handler for the route `weather`.

```
rsync -av vendor/mahw17/weather/config ./
```

You need to create your own config file for apikeys to [ipstack](https://ipstack.com/signup/free) and [darksky](https://darksky.net/dev/register).

After you retrieved your own set of api keys create a new or update config/apikey_sample.php if you choose to change filename you must also update config/weather with that filename.

Copy the needed views.

```
rsync -av vendor/mahw17/weather/view ./
```

Install javascripts and stylesheets needed to render map.

```
rsync -av vendor/mahw17/weather/htdocs ./
```
Both the javascripts and the stylesheet is set within the view (view/mahw17/weather/result.php). A more proper way is to merged this into config/page.php instead.
But OBSERVE! the default layout template (viem/anax/v2/layout/dbwebb_se) is set to do the javascript async and this will not work,
so if you're using the default template and want to move the init of javascript to the page config file, async must be removed from layout template.


Copy the API documentation.

```
rsync -av vendor/mahw17/weather/content ./
```

The API documentation is now available through the route `api/weather`.

The weather module is now active on the route `weather/` according to the documentation. You may try it out on the route `weather` to get the weather forecast for any valid ip-address or coordinates.

Install using scaffold postprocessing file
------------------------------------

The module supports a postprocessing installation script, to be used with Anax scaffolding. The script executes the default installation, as outlined above.

```text
bash vendor/mahw17/weather/.mahw17/scaffold/postprocess/weather.bash
```

The postprocessing script should be run after the `composer require` is done.


Install and setup Anax
------------------------------------

You need a Anax installation, before you can use this module. You can create a sample Anax installation, using the scaffolding utility [`anax-cli`](https://github.com/canax/anax-cli).

Scaffold a sample Anax installation `anax-site-develop` into the directory `weather`.

```
$ anax create anax anax-site-develop
$ cd anax
```

Point your webserver to `anax/htdocs` and Anax should display a Home-page.



Dependency
------------------

This is a mahw17 module and primarly intended to be used together with the Anax framework.



License
------------------

This software carries a MIT license. See [LICENSE.txt](LICENSE.txt) for details.



```
 .  
..:  Copyright (c) 2017 - 2018 Marcus Holmersson (mahw17@student.bth.se)
```
