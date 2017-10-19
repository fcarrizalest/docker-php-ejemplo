<?php
use Migrations\AbstractMigration;

class Test1 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {

        $users = $this->table('users');
        $users->addColumn('username', 'string', ['limit' => 20])
              ->addColumn('password', 'string', ['limit' => 40])
              ->addColumn('password_salt', 'string', ['limit' => 40])
              ->addColumn('email', 'string', ['limit' => 100])
              ->addColumn('first_name', 'string', ['limit' => 30])
              ->addColumn('last_name', 'string', ['limit' => 30])
              ->addColumn('created', 'datetime')
              ->addColumn('updated', 'datetime', ['null' => true])
              ->addIndex(['username', 'email'], ['unique' => true])
              ->create();
    }
}
