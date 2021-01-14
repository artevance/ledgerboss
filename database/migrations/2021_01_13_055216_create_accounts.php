<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 25)->unique();
            $table->string('name');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('parent_account_id')->nullable()->constrained('accounts');
            $table->foreignId('trial_balance_account_group_id')->constrained();
            $table->foreignId('profit_loss_account_group_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
