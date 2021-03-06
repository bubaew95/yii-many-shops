<?php

use common\modules\eav\backend\handlers\ValueHandler;
use yii\db\Migration;

class m160501_232516_add_new_field_types extends Migration
{
    public function up()
    {

        $this->insert('{{%eav_attribute_type}}', [
            'name' => 'numiric',
            'storeType' => ValueHandler::STORE_TYPE_RAW,
            'handlerClass' => '\common\modules\eav\backend\widgets\NumericInput',
        ]);

    }

    public function down()
    {
        echo "m160501_232516_add_new_field_types cannot be reverted.\n";

        return false;
    }
}
