<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\DailySales;
use App\Nova\Metrics\SalesByClient;

class Sales extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new DailySales,
            new SalesByClient,
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'sales';
    }

    public static function label()
    {
        return 'Ventas';
    }
}
