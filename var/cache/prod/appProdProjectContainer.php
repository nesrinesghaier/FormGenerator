<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVsmx7wx\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVsmx7wx/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerVsmx7wx.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerVsmx7wx\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerVsmx7wx\appProdProjectContainer(array(
    'container.build_hash' => 'Vsmx7wx',
    'container.build_id' => 'ed600dbb',
    'container.build_time' => 1531992450,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerVsmx7wx');
