<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EdictsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EdictsUsersTable Test Case
 */
class EdictsUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EdictsUsersTable
     */
    protected $EdictsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EdictsUsers',
        'app.Edicts',
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
        $config = TableRegistry::getTableLocator()->exists('EdictsUsers') ? [] : ['className' => EdictsUsersTable::class];
        $this->EdictsUsers = TableRegistry::getTableLocator()->get('EdictsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EdictsUsers);

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
