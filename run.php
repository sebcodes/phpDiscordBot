<?php
/**
 * @author Sebastian Kiefer (sebcodes)
 * @copyright Copyright (C) 2017 - 2020 Sebastian Kiefer
 * @package phpDiscordBot
 * @version 0.1.1
 */
namespace Sebcodes;

use Discord\Factory\Factory;
use Discord\Parts\Guild\Guild;
use Discord\Parts\User\Activity;
use Discord\Repository\UserRepository;
use Discord\Wrapper\LoggerWrapper;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use Sebcodes\Core\ActivitiesController;

include __DIR__.'/vendor/autoload.php';


#instance
$discord = new \Discord\Discord([
    'token' => @require_once('secrets/key.php'),
]);




//Bot is ready to run
$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;


    ActivitiesController::setCommand($discord);

    while(true){
        $staten = ['macht nix', 'macht doch was'];
        \Sebcodes\Core\ActivitiesController::run($discord, shuffle($staten));
    }

    # Listen for events here
    $discord->on('message', function ($message) {
        echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;
    });
});

//Run discord instance
$discord->run();