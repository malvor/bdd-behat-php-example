BDD DemoBundle with Behat
==========

DemoBundle demonstrates how to run Behat scenarios and Symfony functional tests 
without installing the bundle in a project.

Install:

```bash
git clone git@github.com:malvor/bdd-behat-php-example.git
cd bdd-behat-php-example
```

Run your docker
--------------------
```bash
docker-compose build
docker-compose run --rm demo-bundle composer install
```

Run tests
--------------------
```bash
docker-compose run --rm demo-bundle ./vendor/bin/behat
docker-compose run --rm demo-bundle ./vendor/bin/phpunit
```

Example issue
--------------------
This example has one issue. Because of wrong configuration of Symfony, you can't run all Behat features in one execute. That's why `api.feature2` has incorrect name. To run examples from `api.feature2`, please change both features name (remove 2 from api and change `hello.feature`). Also in `api.feature` you can't run all of scenarios, because they call different paths. I will try fix that as soon as posible.
