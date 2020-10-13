<?php
    $cli_action = 'cli/yamarket';

    // Проверяем, что скрипт выполняет из CLI
    if (php_sapi_name() != 'cli') {
        echo "ERROR: cli $cli_action call attempted by non-cli.";
        syslog(LOG_ERR, "cli $cli_action call attempted by non-cli.");
        http_response_code(400);
        exit;
    }

    // Проверяем существование $cli_action
    if (!isset($cli_action)) {
        echo 'ERROR: $cli_action must be set in calling script.';
        syslog(LOG_ERR, '$cli_action must be set in calling script');
        http_response_code(400);
        exit;
    }

    // Задаем значение VERSION, которое может потребоваться модулям
    define('VERSION', '3.0.2.0');

    // Подключаем файл настроек
    require_once __DIR__.('/../config.php');

    // Запускаем OpenCart
    require_once(DIR_SYSTEM . 'startup.php');

    start('yamarket');
?>