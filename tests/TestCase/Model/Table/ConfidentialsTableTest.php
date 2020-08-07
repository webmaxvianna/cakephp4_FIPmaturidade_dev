<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfidentialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfidentialsTable Test Case
 */
class ConfidentialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfidentialsTable
     */
    protected $Confidentials;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Confidentials',
        'app.Ideas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Confidentials') ? [] : ['className' => ConfidentialsTable::class];
        $this->Confidentials = TableRegistry::getTableLocator()->get('Confidentials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Confidentials);

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
