<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleSetting extends Model
{
    public static function employeeModule($moduleName) {
        $module = ModuleSetting::where('module_name', $moduleName)
            ->where('type', 'employee')
            ->first();
        if($module->status == 'active'){
            return true;
        }
        return false;
    }

    public static function clientModule($moduleName) {
        $module = ModuleSetting::where('module_name', $moduleName)
            ->where('type', 'client')
            ->first();
        if($module->status == 'active'){
            return true;
        }
        return false;
    }
}
