<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->decimal('precio_total')->nullable();
            $table->decimal('pagado')->nullable();
            $table->boolean('finalizado')->default(false);
            $table->text('comentarios')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('precio_total');
            $table->dropColumn('pagado');
            $table->dropColumn('finalizado');
            $table->dropColumn('comentarios');
            //
        });
    }
}
