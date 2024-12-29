<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorExtrinsecosTable extends Migration
{
    public function up()
    {
        Schema::create('factor_extrinsecos', function (Blueprint $table) {
            $table->id();
            $table->decimal('social', 5, 2);
            $table->decimal('ambiental', 5, 2);
            $table->decimal('localizacion', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factor_extrinsecos');
    }
}

