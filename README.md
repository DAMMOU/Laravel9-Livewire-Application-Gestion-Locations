
## Laravel 8 Authentication with Laravel UI
In this step, I added authentication. In Laravel there are several ways to do authentication (Laravel ui, Laravel Breeze and Laravel Jeststream) quickly. In this project I chose Laravel ui which uses CSS Bootstrap framework.

Step 1: Install Laravel UI

The Bootstrap and Vue scaffolding provided by Laravel is located in the laravel/ui Composer package
                    command : ""composer require laravel/ui""

Step 2: Step up Auth Scaffolding

Once the laravel/ui package has been installed, you may install the frontend scaffolding                  command :""php artisan ui bootstrap --auth""

Step 3: Run npm install && npm run dev command

Step 4: Migrate your database




## License

This project is under the [MIT license](https://opensource.org/licenses/MIT).


file Helpers command :"composer dump-autoload" pour prise en compte le fichier Helpers dans toutes les pages.