Weather
==================================

Table of content
------------------------------------

* [Install as Anax module](#Install-as-Anax-module)
* [Install and setup Anax](#Install-and-setup-Anax)
* [Dependency](#Dependency)
* [License](#License)

You can also read this [documentation online](https://canax.github.io/remserver/).



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

After you retrieved your own set of api keys make a copy and rename config/apikey_sample.php to config/apikey.php and replace the sample keys.

The weather module is now active on the route `weather/` according to the documentation. You may try it out on the route `weather` to get the weather forecast for any valid ip-address or coordinates.

Optionally you may copy the API documentation.

```
rsync -av vendor/mahw17/weather/content ./
```

The API documentation is now available through the route `weather-api`.




Install and setup Anax
------------------------------------

You need a Anax installation, before you can use this module. You can create a sample Anax installation, using the scaffolding utility [`anax-cli`](https://github.com/canax/anax-cli).

Scaffold a sample Anax installation `anax-site-develop` into the directory `weather`.

```
$ anax create weather anax-site-develop
$ cd weather
```

Point your webserver to `weather/htdocs` and Anax should display a Home-page.



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
