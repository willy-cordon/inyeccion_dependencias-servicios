<?php

namespace App\Services;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ResponseStatus;

/**
 * Class AppointmentService
 * @package App\Services
 */
class AppointmentService extends Service
{
    use ResponseStatus;
    /**
     * Set model class name.
     *
     * @return void
     */
    protected $notificationService;
    protected function setModel(): void
    {
        $this->model = Appointment::class;
        $this->notificationService = new NotificationService();
    }

    public function all()
    {
        return $this->model::get();
    }

    public function create($request)
    {
        $createAppointment = $this->model->create([$request]);
        $createAppointment->save();
       return  $createAppointment;
    }

    public function confirmedAppointment($id)
    {
        try {
            /**
             * * update status appointment
             */
            $changeStatus = $this->model::query();
            $changeStatus->where('id',$id);
            $changeStatus->update(['status'=>0]);

            /**
             * * Notification Appointment change status
             */
            $this->notificationService->create('nueva notificacion2');
            return $this->success('success',['data1'=>'data1']);

        }catch (\Throwable $exception)
        {
            Log::debug($exception);
            return $this->failure('Error',['error'=>$exception]);
        }

    }

    public function canceledAppointment($id): bool
    {
        try {
            /**
             * * update status appointment
             */
            $changeStatus = $this->model::query();
            $changeStatus->where('id',$id);
            $changeStatus->update(['status'=>1]);

            /**
             * * Notification Appointment change status
             */
            $this->notificationService->create();
            return true;

        }catch (\Throwable $exception)
        {
            Log::debug($exception);
            return false;
        }

    }



}
