<?php

namespace App\Http\Controllers;

use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index()
    {
        return $this->appointmentService->all();
    }

    public function accepted($id)
    {
        return $this->appointmentService->confirmedAppointment($id);
    }
    public function canceled($id)
    {
        return $this->appointmentService->canceledAppointment($id);
    }


}
