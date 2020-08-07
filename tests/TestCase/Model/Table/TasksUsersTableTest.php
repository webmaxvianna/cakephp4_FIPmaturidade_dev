<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TasksUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TasksUsersTable Test Case
 */
class TasksUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TasksUsersTable
     */
    protected $TasksUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TasksUsers',
        'app.Tasks',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TasksUsers') ? [] : ['className' => TasksUsersTable::class];
        $this->TasksUsers = TableRegistry::getTableLocator()->get('TasksUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TasksUsers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
