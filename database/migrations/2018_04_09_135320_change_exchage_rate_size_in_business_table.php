<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business', function ($table) {
            $table->decimal('p_exchange_rate', 20, 3)->default(1)->change();
        });
        Schema::table('transactions', function ($table) {
            $table->decimal('exchange_rate', 20, 3)->default(1)->change();
        });

        //Update 0 to 1
        DB::table('transactions')
            ->where('exchange_rate', 0)
            ->update(['exchange_rate' => 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
