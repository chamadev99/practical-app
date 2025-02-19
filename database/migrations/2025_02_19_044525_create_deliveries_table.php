<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('pickup_address');
            $table->string('pickup_name');
            $table->string('pickup_contact_no');
            $table->string('pickup_email')->nullable();
            $table->text('delivery_address');
            $table->string('delivery_name');
            $table->string('delivery_contact_no');
            $table->string('delivery_email')->nullable();
            $table->enum('type_of_goods', ['document', 'parcel']);
            $table->enum('deliver_provider', ['DHL', 'STARTRACK', 'ZOOM2U', 'TGE']);
            $table->enum('priority', ['Standard', 'Express', 'Immediate']);
            $table->date('shipment_pickup_date');
            $table->time('shipment_pickup_time');
            $table->text('description');
            $table->string('length');
            $table->string('height');
            $table->string('width');
            $table->string('weight');
            $table->enum('status', ['pending', 'cancel', 'shipped', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
