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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Mã laptop (primary key)
            $table->string('brand'); // Hãng sản xuất
            $table->string('model'); // Mẫu laptop
            $table->text('specifications'); // Thông số kỹ thuật
            $table->boolean('rental_status'); // Trạng thái cho thuê (true = Đang cho thuê, false = Chưa cho thuê)
            $table->unsignedBigInteger('renter_id'); // Mã người thuê (foreign key)
    
            // Thêm khóa ngoại để tham chiếu đến bảng renters.id
            $table->foreign('renter_id')->references('id')->on('renters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
