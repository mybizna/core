<?php

namespace Modules\Core\Events;

use Illuminate\Queue\SerializesModels;

class Setting
{

    use SerializesModels;

    public $module;

    public $model;

    public $name;

    public $value;

    public $oldvalue;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($module, $model, $name, $value, $oldvalue)
    {
        $this->module = $module;
        $this->model = $model;
        $this->name = $name;
        $this->value = $value;
        $this->oldvalue = $oldvalue;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
