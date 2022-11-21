# Amazon Scraper [![API](https://github.com/kkamara/amazon-scraper/actions/workflows/build.yml/badge.svg)](https://github.com/kkamara/amazon-scraper/actions/workflows/build.yml)

Navigates to amazon, searches for samsung phones and pulls the title and price data.

* [Important note:](#note)

* [Proven in a production environment](#proven)

* [Requirements](#requirements)

* [Installation](#installation)

* [Using Docker?](#using-docker)

* [Usage](#usage)

* [Adding a new command](#adding-commands)

* [Browser Testing](#testing)

* [Mail Server](#mail)

* [Misc](#misc)

* [Contributing](#contributing)

* [License](#license)

## Important note: <a name="note"></a>

Before you try to scrape any website, go through its robots.txt file. You can access it via `domainname/robots.txt`. There, you will see a list of pages allowed and disallowed for scraping. You should not violate any terms of service of any website you scrape.

With selenium we're limited to 10 max ongoing sessions ([reference](https://forum.katalon.com/t/what-is-the-relationship-between-the-setting-max-concurrent-instances-and-selenium-grid-settings-maxinstances-and-maxsessions/48082/2)).

I've successfully tested 1000 site crawls in a single process (3 hours, 44 minutes, and 47 seconds).

(4 hours x 1000 sites) * 2 = 2000 sites x 8 hours

2000 sites * 10 parallel sessions = 20, 000 sites

We're able to cover 20, 000 sites / night / machine. 

## Proven in a production environment <a name="proven"></a>

[Getting up and running on amazon ec2.](https://raw.githubusercontent.com/kkamara/amazon-scraper/develop/scripts/setup-project.sh)

## Requirements
* [https://laravel.com/docs/master/installation](https://laravel.com/docs/master/installation)
* [https://laravel.com/docs/master/mix](https://laravel.com/docs/master/mix)

## Installation

```bash
cp .env.example .env
touch database/database.sqlite
composer i
make dev
# optional
# make backend-migrate
```

## Using Docker? <a name="using-docker"></a>

```bash
docker build -t laravel-docker-aws .
docker run -it -p 8001:80 laravel-docker-aws
```

## Usage

Update the command at [./app/Console/Commands/BrowseAmazon.php](https://raw.githubusercontent.com/kkamara/amazon-scraper/develop/app/Console/Commands/BrowseAmazon.php)

```bash
php artisan browse:amazon
```

[BrowserInvoker.php](https://raw.githubusercontent.com/kkamara/amazon-scraper/develop/app/Console/Commands/BrowserInvoker.php)

[Browser.php](https://raw.githubusercontent.com/kkamara/amazon-scraper/develop/app/Http/Browser.php)

## Adding a new command <a name="adding-commands"></a>

```bash
php artisan make:crawler crawler_test
```

## Browser Testing <a name="testing"></a>

```bash
  alias sail='vendor/bin/sail'
  sail dusk
```

## Mail Server <a name="mail"></a>

![docker-mailhog3.png](https://raw.githubusercontent.com/kkamara/useful/main/docker-mailhog3.png)

Mail environment credentials are at [.env](https://raw.githubusercontent.com/kkamara/laravel-react-boilerplate/develop/.env.example).

The [mailhog](https://github.com/mailhog/MailHog) docker image runs at `http://localhost:8025`.

## Misc

[See php scraper.](https://github.com/kkamara/php-scraper)

[See python amazon scraper 2.](https://github.com/kkamara/selenium-py)

[Using Laravel dusk outside of tests.](https://stefanzweifel.io/posts/2021/09/26/using-laravel-dusk-outside-of-tests-to-upload-files)

[Running ChromeDriver and Selenium in Python on an AWS EC2 Instance.](https://praneeth-kandula.medium.com/running-chromedriver-and-selenium-in-python-on-an-aws-ec2-instance-2fb4ad633bb5)

The `Makefile` for this project contains useful commands for a Laravel application and can be found at [laravel-makefile](https://github.com/kkamara/laravel-makefile).

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[BSD](https://opensource.org/licenses/BSD-3-Clause)
