<?php

Breadcrumbs::for('sitetronic-pages-admin-index', function ($trail) {
    $trail->parent('sitetronic-core-admin-index');
    $trail->push('Pages', route('admin.pages.index'));
});

Breadcrumbs::for('sitetronic-pages-admin-show', function ($trail) {
    $trail->parent('sitetronic-pages-admin-index');
    $trail->push('Show', route('admin.pages.index'));
});

Breadcrumbs::for('sitetronic-pages-admin-create', function ($trail) {
    $trail->parent('sitetronic-pages-admin-index');
    $trail->push('Create', route('admin.pages.index'));
});

Breadcrumbs::for('sitetronic-pages-admin-edit', function ($trail) {
    $trail->parent('sitetronic-pages-admin-index');
    $trail->push('Edit', route('admin.pages.index'));
});
