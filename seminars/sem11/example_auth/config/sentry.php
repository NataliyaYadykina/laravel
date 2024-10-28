<?php

use Sentry\Integration\EnvironmentIntegration;
use Sentry\Integration\ExceptionListenerIntegration;

return [
    'dsn' => env('SENTRY_LARAVEL_DSN'),

    // Дополнительные параметры конфигурации Sentry
    'traces_sample_rate' => 1.0, // уровень мониторинга

    'http_ssl_verify_peer' => false, // Отключение проверки SSL (для разработки)
    'environment' => env('SENTRY_ENVIRONMENT', 'local'),
    'integrations' => [
        // Теперь классы импортированы и можно использовать без полного имени
        EnvironmentIntegration::class,
        ExceptionListenerIntegration::class,
    ],
];
