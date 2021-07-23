<?php

use App\Controller\VideoController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {


    $routes->add('ola_mundo', '/ola')
        ->controller([VideoController::class, 'olaMundo'])
        ->methods(['GET']);

    $routes->add('all_video', '/video')
        ->controller([VideoController::class, 'allVideo'])
        ->methods(['GET']);   
        
        $routes->add('video_single', '/video/{id}')
        ->controller([VideoController::class, 'findById'])
        ->methods(['GET']);  

        $routes->add('video_save', '/video')
        ->controller([VideoController::class, 'save'])
        ->methods(['POST']);  

        $routes->add('video_update', '/video')
        ->controller([VideoController::class, 'udpate'])
        ->methods(['PUT','PATCH']);  

        $routes->add('video_delete', '/video/{id}')
        ->controller([VideoController::class, 'remove'])
        ->methods(['DELETE']);  
        
};

?>