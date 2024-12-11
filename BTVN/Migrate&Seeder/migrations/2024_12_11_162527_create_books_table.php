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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // id (Mã sách)
            $table->string('title'); // Tên sách
            $table->string('author'); // Tác giả
            $table->integer('publication_year'); // Năm xuất bản
            $table->string('genre'); // Thể loại
            $table->unsignedBigInteger('library_id'); // Khóa ngoại
            $table->timestamps(); // Thời gian tạo và cập nhật
    
            // Định nghĩa khóa ngoại
            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
