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
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Mã thiết bị (primary key)
            $table->string('device_name'); // Tên thiết bị
            $table->enum('type', ['Mouse', 'Keyboard', 'Headset']); // Loại thiết bị
            $table->boolean('status'); // Trạng thái hoạt động (true = Đang hoạt động, false = Hỏng)
            $table->unsignedBigInteger('center_id'); // Mã trung tâm (foreign key)
    
            // Thêm khóa ngoại để tham chiếu đến bảng it_centers.id
            $table->foreign('center_id')->references('id')->on('it_centers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_hardware_devices');
    }
};
