<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Services\EmployeeManagement\Applicant;
use App\Traits\ResponserTraits;

class JobController extends Controller
{
    use ResponserTraits;
    public function __invoke(Applicant $applicant)
    {
        $data = $applicant->applyJob();

        return $this->responseSuccess(new JobResource($data));
    }
}
