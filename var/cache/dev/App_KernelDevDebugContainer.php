<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLGLWQfF\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLGLWQfF/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLGLWQfF.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLGLWQfF\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerLGLWQfF\App_KernelDevDebugContainer([
    'container.build_hash' => 'LGLWQfF',
    'container.build_id' => '18a18dcf',
    'container.build_time' => 1737659571,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLGLWQfF');
