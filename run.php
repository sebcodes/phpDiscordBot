<?php
/**
 * @author Sebastian Kiefer (sebcodes)
 * @copyright Copyright (C) 2017 - 2020 Sebastian Kiefer
 * @package phpDiscordBot
 * @version 0.1.1
 */
namespace Sebcodes;

use Sebcodes\Core\ActivitiesController;
use Discord\Parts\User\Activity;

include __DIR__.'/vendor/autoload.php';


#instance
$discord = new \Discord\Discord([
    'token' => @require_once('secrets/key.php'),
]);





$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;


    ActivitiesController::run($discord);

    # Listen for events here
    $discord->on('message', function ($message) {
        echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;
    });
});

//Run discord instance
$discord->run();