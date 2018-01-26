<?php

namespace  App\config\router;

const path = [
     [ 'GET|POST', '/', 'App\\controllers\\hello::index'],
     [ 'GET|POST', '/test', 'App\\controllers\\hello::index'],
     [ 'GET|POST', '/users/(:string)', 'App\\controllers\\hello::index'],
];


