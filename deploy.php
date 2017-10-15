<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project repository
set('repository', 'https://github.com/shahafan/laravel-in-production');

// Hosts

host('tempcode.xyz')
    ->user('shahaf')
    ->set('deploy_path', '/home/shahaf/tempcode.xyz/laravel');

// after('deploy:update_code', 'artisan:migrate');