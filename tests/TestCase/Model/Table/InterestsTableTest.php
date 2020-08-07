<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InterestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InterestsTable Test Case
 */
class InterestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InterestsTable
     */
    protected $Interests;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Interests') ? [] : ['className' => InterestsTable::class];
        $this->Interests = TableRegistry::getTableLocator()->get('Interests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Interests);

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
}
