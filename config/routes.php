<?php

const routes = [
    "/"               => ['HomeController',   'index'],
    "/home"           => ['HomeController',   'index'],
    "/classes/load"   => ['ClassController',  'load'],
    "/classes/class"  => ['ClassController',  'getClass'],
    "/classes/add"    => ['ClassController',  'addClass'],
    "/classes/edit"   => ['ClassController',  'editClass'],
    "/classes/delete" => ['ClassController',  'deleteClass'],
    "/grades/load"    => ['GradeController',  'load'],
    "/grades/class"   => ['GradeController',  'getGrades'],
    "/grades/add"     => ['GradeController',  'addGrades'],
    "/grades/edit"    => ['GradeController',  'editGrades'],
    "/grades/delete"  => ['GradeController',  'deleteGrades'],
];