# 📡 DDD Api

## 🖱 Project startup
To test this project you must start it with docker compose or make and must initialize the database. These commands 
start the project, creates the schema and import sample data. 

```bash
PS D:\ddd-api> make start
PS D:\ddd-api> docker exec -it app-php-fpm /bin/bash
root@bee014df4318:/application# php bin/console doctrine:schema:create
root@bee014df4318:/application# php bin/console doctrine:database:import /application/migrations/data.sql
```

This repository include a Postman collection (ddd-apit.postman_collection.json) also can be accesed with the folowing link https://www.getpostman.com/collections/0a1399bbb28155fad195

_API request must include the header "Content-Type" with value "application/json"_

This repository also include a Swagger definition (ddd-api-resolved.json)

## 📁 Proyect structure

Our code, it's stored in the `src` folder. One for leads and another for event logging.

```bash
src
├── EventLogger
│   ├── Domain
│   ├── Infrastructure
│   └── Repository
├── RideServices
│   ├── Command
│   ├── Domain
│   ├── Infrastructure
│   └── Repository
└── Shared
    ├── Domain
    └── Infrastructure
```

We have two domains: one for leads and another for event logging. Also, we have a `Shared` folder for some shared code between al domains.

### CQRS

We are implementing CQRS in our controllers in order to separate queries, commands, and most important, our code from symfony or other infrastructure code. We have a `InMemorySymfonyCommandBus.php` and a `InMemorySymfonyQueryBus.php` to dispatch any request we implement.

We also have a EventBus with two possible implementations: We have `InMemorySymfonyEventBus.php` and a `MySqlDoctrineEventBus.php` to dispatch events, store them in database and executed them assyncronous with a command.

## 🐘 Execute and run project

With `make start` you can run dockers containers and you will find the project into `http://localhost:8000`. When you finish working you can just `make stop` to stop containers.

## 👷 CI

We use GitHub Workflow to test our project and check style after every commit. If you go to the `Actions` tab you can see each execution. Also, you will receive an email if you commit something and don't pass through all our checks.

If you want yo can execute each of this tests with the following commands in this doc.

### 🧪 Testing

We have two testing suits with PHP Unit, one for unit testing an another for integration. You can execute any of them with:

```bash
make test/unit                  # Unit testing
make test/integration           # Integration testing
```

Also we use behat to test features. You can execute this tests with:

```bash
make test/functional            # Functional testing
```
If you want to execute all you can simply execute `make test/all`.

### 💅 Code style and error checker

To ensure that all the code write in this project follow the same style guide and it's free of error we have two types of code checks:

```bash
make style/code-style           # Code style
make style/static-analysis      # Static error checker
make style/all                  # Run both
```
