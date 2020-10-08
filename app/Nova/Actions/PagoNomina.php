<?php



namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Date;
use App\Pago;

class PagoNomina extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $pago = new Pago();
            $pago->Monto = $fields->monto;
            $pago->concepto = 'nomina';
            $pago->fecha = $fields->fecha;
            $pago->empleado_id = $model->id;
            $pago->save();
    
        }

        return Action::message('El pago fue registrado exitosamente');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Number::make('Monto')->required(),
            Date::make('Fecha')->required()
        ];
    }
}
