<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending', 'active', 'suspended', 'deleted'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('stores');
    }
};
