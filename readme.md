#### This project is now deprecated. Please use [PHP Scraper](https://github.com/kkamara/php-scraper).

<img src="https://github.com/kkamara/useful/raw/main/selenium-py.png" alt="selenium-py.png" width=""/>

# Amazon Scraper [![API](https://github.com/kkamara/amazon-scraper/actions/workflows/build.yml/badge.svg)](https://github.com/kkamara/amazon-scraper/actions/workflows/build.yml)

(2022) Navigates to amazon, searches for samsung phones and pulls the title and price data. I highly recommend working with Linux (including virtual machines) or MacOs.

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
# (optional)
# npm install
# npm run dev
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

Mail environment credentials are at [.env](https://raw.githubusercontent.com/kkamara/php-reactjs-boilerplate/main/.env.example).

The [mailhog](https://github.com/mailhog/MailHog) docker image runs at `http://localhost:8025`.

## Misc

[See php scraper.](https://github.com/kkamara/php-scraper)

[See php reactjs boilerplate.](https://github.com/kkamara/php-reactjs-boilerplate)

[See python amazon scraper 2.](https://github.com/kkamara/selenium-py)

[Using Laravel dusk outside of tests.](https://stefanzweifel.io/posts/2021/09/26/using-laravel-dusk-outside-of-tests-to-upload-files)

[Running ChromeDriver and Selenium in Python on an AWS EC2 Instance.](https://praneeth-kandula.medium.com/running-chromedriver-and-selenium-in-python-on-an-aws-ec2-instance-2fb4ad633bb5)

The `Makefile` for this project contains useful commands for a Laravel application and can be found at [laravel-makefile](https://github.com/kkamara/laravel-makefile).

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[BSD](https://opensource.org/licenses/BSD-3-Clause)
