<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version4 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('dm_comment', 'author_name', 'string', '250', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {

    }
}