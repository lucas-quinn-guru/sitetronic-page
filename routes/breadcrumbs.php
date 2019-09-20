<?php

Breadcrumbs::for('sitetronic-pages-admin-index', function ($trail) {
    $trail->parent('sitetronic-core-admin-index');
    $trail->push('Pages', route('admin.pages.index'));
});
