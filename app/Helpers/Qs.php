<?php

namespace App\Helpers;

use App\Models\Setting;
use App\Models\StudentRecord;
use App\Models\Subject;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;

class Qs
{
    public static function defaultUserImage()
    {
        return asset('global_assets/images/user.png');
    }
}


