<?php

namespace Modules\Core\Classes;

use Illuminate\Support\Facades\Blade;
use Modules\Core\Entities\Notification as DBNotification;
use Modules\Core\Events\SendLengthy;
use Modules\Core\Events\SendMedium;
use Modules\Core\Events\SendShort;

class Notification
{
    public function send($slug, $contact, $data)
    {

        if ($slug != '') {
            $notification = DBNotification::where(['slug' => $slug])->first();

            if ($notification) {

                $short = Blade::render($notification->short, $data);
                $medium = Blade::render($notification->medium, $data);
                $lengthy = Blade::render($notification->lengthy, $data);

                if ($notification->enable_lengthy) {
                    $this->sendLengthy($short, $lengthy, $contact);
                }

                if ($notification->enable_medium) {
                    $this->sendMedium($medium, $contact);
                }

                if ($notification->enable_short) {
                    $this->sendShort($short, $contact);
                }

            } else {
                throw new Exception("Notification [$slug] not found.", 1);
            }

        }

    }

    public function sendEmail($title, $message, $contact)
    {
        $this->sendLengthy($title, $message, $contact);
    }

    public function sendSMS($message, $contact)
    {
        $this->sendMedium($message, $contact);
    }

    public function sendLengthy($title, $message, $contact)
    {
        event(new SendLengthy($title, $message, $contact));
    }

    public function sendMedium($message, $contact)
    {
        event(new SendMedium($message, $contact));
    }

    public function sendShort($message, $contact)
    {
        event(new SendShort($message, $contact));
    }
}
