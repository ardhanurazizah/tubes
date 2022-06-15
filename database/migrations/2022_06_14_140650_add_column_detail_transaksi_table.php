<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDetailTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_transaksi',function (Blueprint $table){
            $table->UnsignedBigInteger('jumlah')->after('id_produk')->nullable();
            $table->UnsignedBigInteger('harga')->after('jumlah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_transaksi',function (Blueprint $table){
            $table->dropColumn('jumlah');
            $table->dropColumn('harga');
        });
    }
}
