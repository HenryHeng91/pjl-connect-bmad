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
        Schema::create('shipments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('booking_id')->constrained();
            $table->foreignUuid('carrier_id')->nullable()->constrained();
            $table->foreignUuid('shipper_company_id')->nullable()->constrained('companies');
            $table->foreignUuid('consignee_company_id')->nullable()->constrained('companies');
            $table->string('status')->default('Pending');
            $table->enum('transport_mode', ['Sea', 'Air', 'Land']);
            $table->string('mbl_number')->nullable();
            $table->string('hbl_number')->nullable();
            $table->string('mawb_number')->nullable();
            $table->string('hawb_number')->nullable();
            $table->string('vessel_name')->nullable();
            $table->string('voyage_number')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('truck_plate_number')->nullable();
            $table->string('truck_size')->nullable();
            $table->string('driver_telegram_username')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
