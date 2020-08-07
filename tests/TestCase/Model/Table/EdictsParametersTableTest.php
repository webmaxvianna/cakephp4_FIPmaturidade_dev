<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EdictsParametersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EdictsParametersTable Test Case
 */
class EdictsParametersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EdictsParametersTable
     */
    protected $EdictsParameters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EdictsParameters',
        'app.Parameters',
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
        $config = TableRegistry::getTableLocator()->exists('EdictsParameters') ? [] : ['className' => EdictsParametersTable::class];
        $this->EdictsParameters = TableRegistry::getTableLocator()->get('EdictsParameters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EdictsParameters);

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
