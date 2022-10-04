<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        $arStatus = ['Не одобрено', 'На рассмотрении', 'Одобрено'];
        
        foreach ($arStatus as $key => $value) {
            \App\Models\ProjectStatus::create([
                'name' => $value
            ]);   
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_status');
    }
}
