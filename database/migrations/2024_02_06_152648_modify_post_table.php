<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
   
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('apply_link')->nullable()->change();
            $table->text('apply_email')->nullable()->change();;
        });
    }

   
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('apply_link')->change(); // Remove the default value
            $table->text('apply_email')->change();;
        });
    }
  
     */
    

};
