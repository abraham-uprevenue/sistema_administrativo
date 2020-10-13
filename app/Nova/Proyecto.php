<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Boolean;
use app\Nova\Actions\FinalizeProject;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use app\Nova\Actions\ProjectPayment;

class Proyecto extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Proyecto::class;

    public static $group = 'Clientes';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'nombre';

    public function subtitle() {
        return 'De: ' . $this->cliente->nombre;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'nombre',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('Cliente')->sortable(),
            Text::make('Nombre del proyecto', 'nombre')->required()->sortable(),
            Textarea::make('Descripción', 'descripcion')->required()->alwaysShow()->sortable(),
            Date::make('Fecha de inicio', 'fecha_inicio')->required()->sortable(),
            Date::make('Fecha de entrega', 'fecha_entrega')->required()->sortable(),
            Currency::make('Precio','precio_total')->required()->nullable()->sortable(),
            Currency::make('Monto Pagado','pagado')->required()->nullable()->sortable(),
            Currency::make('Restante', function() {
                return $this->precio_total - $this->pagado;
            })->sortable(),
            Boolean::make('Finalizado?','finalizado')->sortable(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new FinalizeProject,
            new DownloadExcel,
            new ProjectPayment
        ];
    }
}
