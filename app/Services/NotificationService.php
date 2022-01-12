<?php

namespace App\Services;

use App\Models\Notification;
use Carbon\Carbon;

/**
 * Class NotificationService
 * @package App\Services
 */
class NotificationService extends Service
{
    /**
     * Set model class name.
     *
     * @return void
     */
    protected function setModel(): void
    {
        $this->model = Notification::class;
    }
    public function create($name)
    {
        $createNotification = $this->model::create(['name'=>$name,'init'=>Carbon::now(),'finish'=>Carbon::now(),'status'=>0]);
        $createNotification->save();
    }

}
