<?php

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(with(new Product)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('name', 55)->nullable();
            $table->string('slug', 55)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->text('description')->nullable();
            $table->float('price', 18, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->string('status', 20)->nullable();
            $table->timestamp('status_date')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on(with(new Category)->getTable());
            $table->foreign('subcategory_id')->references('id')->on(with(new SubCategory)->getTable());
            $table->foreign('created_by')->references('id')->on(with(new Admin)->getTable());
            $table->foreign('updated_by')->references('id')->on(with(new Admin)->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(with(new Product)->getTable());
    }
}
