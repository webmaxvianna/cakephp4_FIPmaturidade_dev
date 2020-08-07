<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IdeasUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IdeasUsersTable Test Case
 */
class IdeasUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IdeasUsersTable
     */
    protected $IdeasUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.IdeasUsers',
        'app.Ideas',
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
        $config = TableRegistry::getTableLocator()->exists('IdeasUsers') ? [] : ['className' => IdeasUsersTable::class];
        $this->IdeasUsers = TableRegistry::getTableLocator()->get('IdeasUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->IdeasUsers);

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
