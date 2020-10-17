<?php
/**
 * @author Sebastian Kiefer (sebcodes)
 * @copyright Copyright (C) 2017 - 2020 Sebastian Kiefer
 * @package phpDiscordBot
 * @version 0.1.1
 */
include __DIR__.'/vendor/autoload.php';

#instance
$discord = new \Discord\Discord([
    'token' => @require_once('secrets/key.php'),
]);

$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;

    # Listen for events here
    $discord->on('message', function ($message) {
        echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;
    });
});

//Run discord instance
$discord->run();