<?php
namespace Sebcodes\Core;

use \Discord\Discord;
use \Discord\Parts\User\Activity;

/**
 * @package Sebcodes
 * @category Sebcodes Project
 * @author Sebastian Kiefer (sebcodes)
 * @version 1.0
 * @copyright 2020 Sebastian Kiefer
 * @since 2020
 * @link https://sebcodes.de
 * @see Default
 **/

class ActivitiesController
{
    public static function run(Discord $discord,String $shuffle)
    {
        if (!is_callable($discord)) throw new \Exception('Discord Instance is not callable');
        //set game
        $activity = $discord->factory(Activity::class, [
            'type' => Activity::TYPE_STREAMING,
            'name' => $shuffle,
        ]);
        try {
            $discord->updatePresence($activity, false, Activity::STATUS_ONLINE, false);
        } catch (\Exception $e) {
            throw new \Exception('Cannot update Presence! Message: '.$e->getMessage());
        }
    }
}