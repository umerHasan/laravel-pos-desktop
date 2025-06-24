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
        Schema::table('purchase_lines', function ($table) {
            $table->decimal('quantity', 22, 4)->default(0)->change();
        });

        Schema::table('transaction_sell_lines', function ($table) {
            $table->decimal('quantity', 22, 4)->default(0)->change();
        });

        Schema::table('transactions', function ($table) {
            $table->decimal('discount_amount', 22, 4)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
