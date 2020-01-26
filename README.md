## About Netzwerk

- Netzwerk is a minimal personal relationship management app.
- It is meant for quick contact info storage.
- It is meant for regular usage.
- It is ssingle user only – there will be no multi user functionality or multi-tenants
- It is test-driven
- It is very slowly developing as I only add functionality when I need it
- It is eat-your-own-dogfood for me, Martin

## Installation
- Clone repo
- Create sqlite database in `database/db.sqlite`
- Copy `.env.example` to `.env`
- Add your SQLite database setting
- `php artisan migrate`
- For trying out: `php artisan migrate --seed` and log in with `test@test.test` and generic password `password`
- Visit the website (however you host it), when using Valet, it would be `netzwerk.test`

## License

Netzwerk is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
