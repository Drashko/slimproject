<?php

// Dev environment

use Monolog\Logger;

return function (array $settings): array {
    $settings['error']['display_error_details'] = true;
   // $settings['logger']['level'] = Logger::Debug;

    // Database name
    $settings['db']['database'] = 'slim';
    $settings['db']['username'] = 'root';
    $settings['db']['password'] = '';

    return $settings;
};
