<?php
\Larakit\StaticFiles\Manager::package('larakit/sf-bootstrap-dialog')
    ->usePackage('larakit/sf-bootstrap')
    ->jsPackage('bootstrap-dialog.min.css')
    ->cssPackage('bootstrap-dialog.min.js')
    ->setSourceDir('public');
