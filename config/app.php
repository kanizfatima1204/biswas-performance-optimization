<?php
return [
 'name' => env('APP_NAME','Biswas Performance Lab'), 'env'=>env('APP_ENV','local'), 'debug'=>(bool)env('APP_DEBUG',true), 'url'=>env('APP_URL','http://localhost'), 'timezone'=>'Asia/Dhaka', 'locale'=>'en', 'fallback_locale'=>'en', 'key'=>env('APP_KEY'), 'cipher'=>'AES-256-CBC', 'maintenance'=>['driver'=>'file'],
];
