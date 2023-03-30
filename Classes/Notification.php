<?php

namespace Modules\Core\Classes;

use Illuminate\Support\Facades\Blade;
use Modules\Core\Entities\Notification as DBNotification;
use Modules\Core\Events\SendLengthy;
use Modules\Core\Events\SendMedium;
use Modules\Core\Events\SendShort;

class Notification
{
    public function send($slug, $contact, $data, $attachments = [])
    {

        if ($slug != '') {
            $notification = DBNotification::where(['slug' => $slug])->first();

            if ($notification) {

                $data_arr = is_array($data) ? $data : json_decode(json_encode($data), true);
                $data_arr['partner'] = $contact;
                
                $short = Blade::render($notification->short, $data_arr);
                $medium = Blade::render($notification->medium, $data_arr);
                $lengthy = Blade::render($notification->lengthy, $data_arr);

                if ($notification->enable_lengthy) {
                    $this->sendLengthy($short, $lengthy, $contact, $attachments);
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

    public function sendEmail($title, $message, $contact, $attachments = [])
    {
        $this->sendLengthy($title, $message, $contact, $attachments);
    }

    public function sendSMS($message, $contact)
    {
        $this->sendMedium($message, $contact);
    }

    public function sendLengthy($title, $message, $contact, $attachments = [])
    {
        event(new SendLengthy($title, $message, $contact, $attachments));
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
