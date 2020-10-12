<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\NumberEmployees;
use App\Nova\Metrics\EmployeesByPosition;

class Employees extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new NumberEmployees,
            new EmployeesByPosition,
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'employees';
    }

    public static function label()
    {
        return 'Empleados';
    }
}
