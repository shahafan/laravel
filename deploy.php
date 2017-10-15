<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project repository
set('repository', 'https://github.com/shahafan/laravel-in-production');

// Hosts

host('45.77.140.99')
    ->user('shahaf')
    ->set('deploy_path', '/home/shahaf/tempcode.xyz/laravel');

// after('deploy:update_code', 'artisan:migrate');

task('reload:php-fpm', function () {
  // Attention: The user must have rights for restart service
  // visudo: shahaf  ALL=NOPASSWD:/usr/sbin/service php7.0-fpm restart
  run('sudo /usr/sbin/service php7.0-fpm restart');
});

after('deploy', 'reload:php-fpm');