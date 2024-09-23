<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateInvoicelogTable extends Migration
{
    public function up(){
        Schema::create('invoicelog', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_title');
            $table->string('action');
            $table->foreignIdFor(\App\Models\Admin::class)->nullable();
            $table->foreignIdFor(\App\Models\Invoice::class)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
     }
    public function down(){
        Schema::dropIfExists('invoicelog');
    }
}
