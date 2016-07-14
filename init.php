<?php
\Larakit\StaticFiles\Manager::package('larakit/sf-bootstrap-dialog')
    ->usePackage('larakit/sf-bootstrap')
    ->usePackage('larakit/sf-larakit-js')
    ->cssPackage('bootstrap-dialog.min.css')
    ->jsPackage('bootstrap-dialog.min.js')
    ->jsPackage('init.js')
    ->setSourceDir('public');