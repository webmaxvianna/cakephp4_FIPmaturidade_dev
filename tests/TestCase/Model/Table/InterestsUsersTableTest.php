<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InterestsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InterestsUsersTable Test Case
 */
class InterestsUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InterestsUsersTable
     */
    protected $InterestsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.InterestsUsers',
        'app.Interests',
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
        $config = TableRegistry::getTableLocator()->exists('InterestsUsers') ? [] : ['className' => InterestsUsersTable::class];
        $this->InterestsUsers = TableRegistry::getTableLocator()->get('InterestsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->InterestsUsers);

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
