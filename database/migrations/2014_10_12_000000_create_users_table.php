<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('surname', 10);
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('user_type')->default('user')->index();
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->char('language', 7)->default('en');
            $table->char('contact_no', 15)->nullable();
            $table->text('address')->nullable();
            $table->integer('business_id')->unsigned()->nullable();
            $table->boolean('allow_login')->default(1);
            $table->boolean('is_cmmsn_agnt')->default(0);
            $table->decimal('cmmsn_percent', 4, 2)->default(0);
            $table->boolean('selected_contacts')->default(false);
            $table->enum('status', ['active', 'inactive', 'terminated'])->default('active');
            $table->decimal('max_sales_discount_percent', 5, 2)->nullable();
            $table->date('dob')->nullable();
            $table->enum('marital_status', ['married', 'unmarried', 'divorced'])->nullable();
            $table->char('blood_group', 10)->nullable();
            $table->char('contact_number', 20)->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('social_media_1')->nullable();
            $table->string('social_media_2')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('current_address')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('custom_field_1')->nullable();
            $table->string('custom_field_2')->nullable();
            $table->string('custom_field_3')->nullable();
            $table->string('custom_field_4')->nullable();
            $table->longText('bank_details')->nullable();
            $table->string('id_proof_name')->nullable();
            $table->string('id_proof_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('alt_number')->nullable();
            $table->string('family_number')->nullable();
            $table->boolean('is_enable_service_staff_pin')->default(0);
            $table->text('service_staff_pin')->nullable();
            $table->dateTime('available_at')->nullable();
            $table->dateTime('paused_at')->nullable();
            $table->integer('crm_contact_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('business')->onDelete('cascade');
            $table->foreign('crm_contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
