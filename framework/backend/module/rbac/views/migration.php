<?php
/**
 * @var string the new migration class name
 */
echo "<?php\n";
?>

use backend\module\rbac\migrations\Migration;

class <?= $className; ?> extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "<?= $className; ?> cannot be reverted.\n";

        return false;
    }
}