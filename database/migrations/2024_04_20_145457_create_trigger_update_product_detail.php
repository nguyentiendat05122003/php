<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TRIGGER trg_UpdateProductDetail AFTER INSERT ON detail_import FOR EACH ROW
            BEGIN
                UPDATE product_detail pd
                SET pd.quantity = pd.quantity + CAST(NEW.quantity AS UNSIGNED)
                WHERE pd.productID = NEW.productId AND pd.colorID = NEW.colorID AND pd.sizeID = NEW.sizeID;
            END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TRIGGER IF EXISTS trg_UpdateProductDetail');
    }
};
