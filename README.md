# League Simulator

League simulator is basically the laravel version of the previous league simulator project I made from vanilla PHP. A project where you can add, edit, update and delete a team basically the CRUD (method).
This project is made in Laravel with the database postgresSql, with laravel breeze and Chart.JS for the graphs. Why choose Laravel? Laravel is the most used in the backend and making the 
CRUD method in Laravel is way easier and simple. Laravel makes life easier by providing routing and authentication also the csrf feauture which is fantastic.  

## Controllers and the functions in these controllers
There are 4 Controllers in this project. (Match, Profile, Ranking and Team)

### Match
Match Controller has 3 funtions, the index to render the list of matches, generateMatch to generate matches by picking 2 random teams from the team table, where by they haven't played against each other. They
then play against each other and depending on the result each team gets their points, (win = 3, draw = 1, loss = 0) and then the delete function which deletes the whole list of matches generated. Here under is 
a photo
![Screenshot_32](https://github.com/user-attachments/assets/4dc60b99-e573-4822-b8c4-598ea099fa7e)

![Screenshot_34](https://github.com/user-attachments/assets/42ae9415-fd5e-45fd-a580-12dd7821354d)

### Profile
This was provided thanks to Laravel Breeze which helps with setting up logging and registration of a user. 

### Ranking
Ranking Controller has 5 functions , the index for showing the rankings in order of points, a display of a graph with the help of CHart.Js an export function, a delete function and  calculateRankings 
funtion which calculates the amount of points a team has. 

![Screenshot_31](https://github.com/user-attachments/assets/0577aed4-8fe6-4fa9-b0bf-b8fe17efff46)
![Screenshot_33](https://github.com/user-attachments/assets/b1dc8c8d-5355-4848-b903-91487645be86)












<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
