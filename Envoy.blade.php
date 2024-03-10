@servers(['vds' => ['vlad@89.223.66.228']])

@task('deploy', ['on' => 'vds'])
echo 'starting'
cd /home/vlad/laravel_store/
git pull
composer update
./vendor/bin/sail stop
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate:force
echo 'done'
@endtask