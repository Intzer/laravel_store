@servers(['vds' => ['vlad@89.223.66.228']])

@task('deploy', ['on' => 'vds'])
echo 'starting'
cd /home/vlad/laravel_store/
./vendor/bin/sail stop
git pull
composer install
./vendor/bin/sail up -d
echo 'done'
@endtask