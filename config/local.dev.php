<?php

// Dev environment

use Monolog\Logger;

return function (array $settings): array {
    $settings['error']['display_error_details'] = true;
   // $settings['logger']['level'] = Logger::Debug;

    // Database name
    $settings['db']['database'] = 'my_dev_database';
    $settings['db']['username'] = 'drash';
    $settings['db']['password'] = '134jhed';

    return $settings;
};
