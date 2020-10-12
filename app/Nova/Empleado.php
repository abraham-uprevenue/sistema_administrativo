<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsToMany;
use app\Nova\Filters\EmpleadoActivo;
use app\Nova\Actions\PagoNomina;

class Empleado extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Empleado::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'Nombre';

    public function subtitle() {
        return 'Puesto: ' . $this->puesto->nombre;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'Nombre', 'Apellido'
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

            Text::make(__('Nombre'), 'Nombre')->rules(['required'])->sortable(),

            Text::make(__('Apellido'), 'Apellido')->required()->sortable(),

            BelongsTo::make('Puesto')->sortable(),

            Date::make(__('Fecha De Nacimiento'), 'nacimiento')->hideFromIndex()->sortable(),

            Date::make(__('Fecha De Ingreso'), 'ingreso')->sortable(),

            Boolean::make('Activo', 'is_active')->sortable()->hideWhenCreating(),

            BelongsTo::make('User')->sortable()->nullable(),

            HasMany::make('Pagos')->sortable(),
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
        return [

            new EmpleadoActivo
        ];
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
            new PagoNomina
        ];
    }
}
