<p align="center">
  <br />
  <picture>
    <img src="https://ik.imagekit.io/rafidhp/fake_spot/Logo_FS.png?updatedAt=1747881366397" width="200px">
  </picture>
</p>

## Fake Spot

Fake Spot is a discrete mathematics quiz assignment for second semester of UPI.

## Setup Guide

Follow this setup guide to setup on your local device.

```bash
composer install
```

Create `fake_spot` database

Copy your .env file

```bash
php artisan migrate
php artisan db:seed
php artisan serve
```

Using bootstrap in blade file

bootstrap docs: https://getbootstrap.com/docs/5.3/getting-started/introduction/

```blade
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
```
Place the code above in the head for CSS and in the body for the JS script

## Team

The Fake Spot development team consists of 4 people:

- Muhammad Ikshan Suherman
- Moch. Yussar Rizky
- Rafi Islami Pasha Dini Hari Putra
- Zaky Rizzan Zain

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
