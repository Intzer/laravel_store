@servers(['vds' => ['vlad@89.223.66.228']])

@task('deploy', ['on' => 'vds'])
echo 'starting'
cd /home/vlad/laravel_store/
git pull
composer update --no-dev
./vendor/bin/sail stop
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
echo 'done'
@endtask