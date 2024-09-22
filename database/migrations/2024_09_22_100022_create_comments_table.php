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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_item_id')->constrained()->onDelete('cascade'); // list_itemsテーブルへの外部キー
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーへの外部キー
            $table->text('content'); // コメントの内容
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
