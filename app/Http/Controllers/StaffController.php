<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffResource;
use App\Services\EmployeeManagement\Staff;
use App\Traits\ResponserTraits;

class StaffController extends Controller
{
    use ResponserTraits;

    public function __invoke(Staff $staff)
    {
        $data = $staff->salary();

        return $this->responseSuccess(new StaffResource($data));
    }
}
