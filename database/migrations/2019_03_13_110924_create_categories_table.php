<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateCategoriesTable extends Migration
	{
		
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			
			Schema::create('categories' , function(Blueprint $table){
				
				$table->bigIncrements('id');
				$table->string('name')->nullable();
				$table->text('icon')->nullable();
				$table->text('image')->nullable();
				$table->integer('type')->nullable();
				$table->integer('parent_id')->nullable();
				$table->timestamps();
                $table->softDeletes();

            });
			Schema::create('categoricals' , function(Blueprint $table){
				$table->bigIncrements('id');
				$table->integer('category_id');
				$table->integer('categorical_id');
				$table->string('categorical_type');
                $table->timestamps();

            });
			
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			
			Schema::dropIfExists('categories');
			Schema::dropIfExists('categoricals');
		}
	}
