<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->string('name')->after('id'); // Add 'name' column after 'id'
            $table->string('airline')->after('name'); // Add 'airline' column after 'name'
        });

        Schema::table('flights', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->after('airline'); // Add 'price' column after 'airline'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn(['name', 'airline', 'price']); // Remove the columns if rolled back
        });
    }
};
