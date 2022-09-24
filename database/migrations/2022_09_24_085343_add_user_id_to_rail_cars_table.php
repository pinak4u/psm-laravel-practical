<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToRailCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rail_cars', function (Blueprint $table) {
            //
            $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('rail_cars', function (Blueprint $table) {
            //
            if (Schema::hasColumn('rail_cars','user_id')){
                $table->dropColumn('user_id');
            }
        });
        Schema::enableForeignKeyConstraints();

    }
}
