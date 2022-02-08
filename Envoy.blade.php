@servers(['localhost' => '127.0.0.1'])

@story('deploy')
    composer
    migrate
@endstory

@task('composer')
    composer install
@endtask

@task('migrate')
    php artisan migrate:fresh
@endtask