<?php

use App\Listeners\AttachUserReadingGuideListener;
use App\Models\User;
use Database\Seeders\AvailableReadingGuidesSeed;

test('Record Excerpt Days', function () {
    $this->seed(AvailableReadingGuidesSeed::class);
    $generateCaptersListener = new AttachUserReadingGuideListener();

    $user = User::factory()->create();
    $event = new stdClass();
    $event->user = $user;
    $generateCaptersListener->handle($event);
})->throwsNoExceptions();
