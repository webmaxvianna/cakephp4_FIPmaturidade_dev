<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParametersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParametersTable Test Case
 */
class ParametersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParametersTable
     */
    protected $Parameters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Parameters',
        'app.Appraisals',
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
        $config = TableRegistry::getTableLocator()->exists('Parameters') ? [] : ['className' => ParametersTable::class];
        $this->Parameters = TableRegistry::getTableLocator()->get('Parameters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Parameters);

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
