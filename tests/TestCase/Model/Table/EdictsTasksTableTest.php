<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EdictsTasksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EdictsTasksTable Test Case
 */
class EdictsTasksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EdictsTasksTable
     */
    protected $EdictsTasks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EdictsTasks',
        'app.Tasks',
        'app.Edicts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EdictsTasks') ? [] : ['className' => EdictsTasksTable::class];
        $this->EdictsTasks = TableRegistry::getTableLocator()->get('EdictsTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EdictsTasks);

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
