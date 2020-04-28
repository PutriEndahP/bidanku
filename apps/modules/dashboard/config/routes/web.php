<?php

$namespace =  'Phalcon\Init\Dashboard\Controllers\Web';

// BIDAN

$router->addGet('/registerbidan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'register'
]);

$router->addPost('/registerbidan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'storeregister'
]);

$router->addGet('/loginbidan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'login'
]);

$router->addPost('/loginbidan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'storelogin'
]);

$router->addGet('/logoutbidan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'logout'
]);

$router->addGet('/homebidan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'homebidan'
]);

$router->addGet('/daftaribu', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'daftaribu'
]);

$router->addGet('/listuseribuview/{idIbu}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'listuseribuview'
]);

$router->addGet('/listuseribu', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'listuseribu'
]);

$router->addGet('/verifikasiuser/{idIbu}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'verifikasiuser'
]);

$router->addGet('/verifdetail/{idIbu}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Bidan',
    'action' => 'verifdetail'
]);



// IBU

$router->addGet('/register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'register'
]);

$router->addPost('/store-register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'storeregister'
]);

$router->addGet('/login', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'login'
]);

$router->addPost('/login', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'storelogin'
]);

$router->addGet('/logoutibu', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'logout'
]);

$router->addGet('/homeibu', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'homeibu'
]);

$router->addGet('/listkiauserview', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'listkiauserview'
]);

$router->addGet('/listkiauser', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'listkiauser'
]);

$router->addGet('/detailkiauser/{idKia}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'detailkiauser'
]);

$router->addGet('/tambahanak', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'tambahanak'
]);

$router->addPost('/storeanak', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'storeanak'
]);

$router->addGet('/listanak', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'listanak'
]);

$router->addGet('/lihatanakview', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'lihatanakview'
]);

$router->addGet('/lihatanak', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'lihatanak'
]);

$router->addGet('/hapusanak/{idAnak}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'hapusanak'
]);

$router->addGet('/listuserkb', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'listuserkb'
]);

$router->addGet('/lihatuserkbview', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'lihatuserkbview'
]);

$router->addGet('/lihatuserkb', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'lihatuserkb'
]);

$router->addGet('/detailkbuser/{idKb}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Ibu',
    'action' => 'detailkbuser'
]);


//KIA

$router->addGet('/createkiaibu/{idIbu}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'createkiaibu'
]);

$router->addPost('/storekiaibu', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'storecreatekiaibu'
]);

$router->addGet('/daftarkia', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'daftarkia'
]);

$router->addGet('/listkiaview', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'listkiaview'
]);

$router->addGet('/listkia', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'listkia'
]);

$router->addGet('/detailkia/{idKia}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'detailkia'
]);

$router->addGet('/daftaranak', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'daftaranak'
]);

$router->addGet('/listuseranakview', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'listuseranakview'
]);

$router->addGet('/listuseranak', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'listuseranak'
]);

$router->addGet('/hapuskia/{idKia}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'hapuskia'
]);

$router->addGet('/createkiaanak/{idAnak}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'createkiaanak'
]);

$router->addPost('/storekiaanak', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'storecreatekiaanak'
]);

$router->addGet('/editkia/{idKia}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'editkia'
]);

$router->addPost('/storeedit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kia',
    'action' => 'storeedit'
]);

// KB

$router->addGet('/createkb/{idIbu}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kb',
    'action' => 'createkb'
]);

$router->addPost('/storekb', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kb',
    'action' => 'storecreatekb'
]);

$router->addGet('/daftarkb', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kb',
    'action' => 'daftarkb'
]);

$router->addGet('/listkbview', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kb',
    'action' => 'listkbview'
]);

$router->addGet('/listkb', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kb',
    'action' => 'listkb'
]);

$router->addGet('/detailkb/{idKb}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kb',
    'action' => 'detailkb'
]);

return $router;