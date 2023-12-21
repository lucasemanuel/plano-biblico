<?php

use App\Listeners\GenerateChaptersListener;
use App\Models\User;

test('Record Chapter Days', function () {
    $generateCaptersListener = new GenerateChaptersListener;

    $user = User::factory()->create();
    $event = new stdClass;
    $event->user = $user;
    $generateCaptersListener->handle($event);
})->throwsNoExceptions();
