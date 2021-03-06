<?php

namespace Blog;

use Doctrine\ORM\EntityManager;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'blog_breadcrumb' => Service\BlogBreadcrumb::class,
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\IndexController::class => function ($container) {
                    return new Controller\IndexController(
                        $container->get(EntityManager::class)
                    );
                },
            ],
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'invokables' => [
                'checkImage' => View\Helper\CheckImage::class,
            ],
        ];
    }
}
