<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToCcdCarShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ccd_car_shops', function (Blueprint $table) {
            $table->foreignIdFor(User::class)
                ->after('id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('ccd_car_shops', function (Blueprint $table) {
            $key = (new User)->getForeignKey();
            $table->dropForeign([$key]);
            $table->removeColumn($key);
        });
    }
}
