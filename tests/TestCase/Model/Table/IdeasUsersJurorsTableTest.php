<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IdeasUsersJurorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IdeasUsersJurorsTable Test Case
 */
class IdeasUsersJurorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IdeasUsersJurorsTable
     */
    protected $IdeasUsersJurors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.IdeasUsersJurors',
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
        $config = TableRegistry::getTableLocator()->exists('IdeasUsersJurors') ? [] : ['className' => IdeasUsersJurorsTable::class];
        $this->IdeasUsersJurors = TableRegistry::getTableLocator()->get('IdeasUsersJurors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->IdeasUsersJurors);

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
