<?php

namespace App\Nova;

use App\Nova\Metrics\ProspectsCount;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\BelongsTo;
use Khalin\Nova\Field\Link;

class Prospecto extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */

    public static $model = \App\Prospecto::class;

    public static $group = 'Clientes';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'nombre';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Nombre de la persona', 'nombre')->required()->sortable(),
            Link::make('Correo', 'email')
                ->url(function () {
                    return "mailto:{$this->email}";
                })
                ->onlyOnIndex()->sortable(),
            Text::make('Correo', 'email')->required()->hidefromIndex(),
            Text::make('Teléfono', 'telefono')->rules('required', 'digits:10')->sortable(),
            Date::make('Fecha', 'fecha')->required()->sortable(),
            Textarea::make('Comentario', 'comentario')->sortable(),
            BelongsTo::make('Estatus', 'statusprospect', 'App\Nova\StatusProspect'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new ProspectsCount()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
