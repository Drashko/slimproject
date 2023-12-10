<?php

// Production environment

return function (array $settings): array {
    // Enable caching etc.
    // ...

    // Database name
    $settings['db']['database'] = 'my_prod_db';
    $settings['db']['username'] = 'hfdshsa38hs';
    $settings['db']['password'] = '134jhed_lfdhh666';

    return $settings;
};
