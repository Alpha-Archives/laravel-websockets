<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function generate()
    {
        $user = auth()->user();
        $this->dispatch(new \App\Jobs\CrunchReports($user));
        return 'report generated';
    }
}
