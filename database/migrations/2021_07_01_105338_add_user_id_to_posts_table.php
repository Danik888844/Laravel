<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\User;

class AddUserIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignIdFor(User::class)
                ->after('id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $key = (new User)->getForeignKey();
            $table->dropForeign([$key]);
            $table->removeColumn($key);
        });
    }
}
