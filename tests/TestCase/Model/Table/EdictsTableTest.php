<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EdictsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EdictsTable Test Case
 */
class EdictsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EdictsTable
     */
    protected $Edicts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Edicts',
        'app.Users',
        'app.Ideas',
        'app.Categories',
        'app.Parameters',
        'app.Tasks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Edicts') ? [] : ['className' => EdictsTable::class];
        $this->Edicts = TableRegistry::getTableLocator()->get('Edicts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Edicts);

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
