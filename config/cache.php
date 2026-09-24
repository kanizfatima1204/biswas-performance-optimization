<?php
return ['default'=>env('CACHE_STORE','database'),'stores'=>['database'=>['driver'=>'database','table'=>'cache','connection'=>null],'file'=>['driver'=>'file','path'=>storage_path('framework/cache/data')]],'prefix'=>env('CACHE_PREFIX','biswas_performance_cache')];
