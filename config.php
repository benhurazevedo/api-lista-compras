<?php

$AppConfig = [
	'settings' => [
		'displayErrorDetails' => true
        ,'doctrine' => [
            'conn' => [
                "driver" => "pdo_sqlite",
                "path" => __DIR__."\db.sqlite"
            ]
            ,'models' => [
                __DIR__."\models"
            ]
            ,'isDevMode' => true 
            ,'proxyDir' => null 
            ,'cache' => null 
            ,'useSimpleAnnotationReader' => false
        ]
	]
];
?>