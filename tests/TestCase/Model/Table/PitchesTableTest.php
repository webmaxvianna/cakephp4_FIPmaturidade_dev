<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PitchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PitchesTable Test Case
 */
class PitchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PitchesTable
     */
    protected $Pitches;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pitches',
        'app.Categories',
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
        $config = TableRegistry::getTableLocator()->exists('Pitches') ? [] : ['className' => PitchesTable::class];
        $this->Pitches = TableRegistry::getTableLocator()->get('Pitches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pitches);

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
