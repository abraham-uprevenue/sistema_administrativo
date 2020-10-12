<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\TotalProjects;
use App\Nova\Metrics\ActiveProjects;
use App\Nova\Metrics\CompletedProjects;
use App\Nova\Metrics\ProjectsByStatus;

class Projects extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new TotalProjects,
            new ActiveProjects,
            new CompletedProjects,
            new ProjectsByStatus,
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'projects';
    }

    public static function label()
    {
        return 'Proyectos';
    }
}
