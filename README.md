# Weather App

### Start App

- clone githab [repo](https://github.com/OlegMarko/weather-laravel-api)
- `cd weather-laravel-api`
- `cp .env.example .env`
- setup envs
- install vendors `composer install`
- start docker `./vendor/bin/sail up -d`

### API

- endpoint `/api/temperature`

example
```shell
curl --location 'http://localhost:8088/api/temperature?day=2024-06-10' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--header 'x-token: your_32_character_token'
```
