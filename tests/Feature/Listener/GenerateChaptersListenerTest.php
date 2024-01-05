<?php

use App\Listeners\GenerateChaptersListener;
use App\Models\User;
use Database\Seeders\AvailableReadingGuidesSeed;

test('Record Chapter Days', function () {
    $this->seed(AvailableReadingGuidesSeed::class);
    $generateCaptersListener = new GenerateChaptersListener;

    $user = User::factory()->create();
    $event = new stdClass;
    $event->user = $user;
    $generateCaptersListener->handle($event);
})->throwsNoExceptions();
