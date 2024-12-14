<?php

const routes = [
    "/"               => ['HomeController',   'index'],
    "/home"           => ['HomeController',   'index'],
    "/classes/load"   => ['ClassController',  'load'],
    "/classes/class"  => ['ClassController',  'getClass'],
    "/classes/add"    => ['ClassController',  'add'],
    "/classes/edit"   => ['ClassController',  'edit'],
    "/classes/delete" => ['ClassController',  'delete'],
];