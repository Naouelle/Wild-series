<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerIJkxGxq\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerIJkxGxq/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerIJkxGxq.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerIJkxGxq\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerIJkxGxq\App_KernelDevDebugContainer([
    'container.build_hash' => 'IJkxGxq',
    'container.build_id' => '5387ac1a',
    'container.build_time' => 1575301016,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerIJkxGxq');
