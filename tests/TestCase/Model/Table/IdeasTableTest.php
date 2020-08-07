<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IdeasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IdeasTable Test Case
 */
class IdeasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IdeasTable
     */
    protected $Ideas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ideas',
        'app.Edicts',
        'app.Users',
        'app.Appraisals',
        'app.Confidentials',
        'app.Evidences',
        'app.Pitches',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ideas') ? [] : ['className' => IdeasTable::class];
        $this->Ideas = TableRegistry::getTableLocator()->get('Ideas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ideas);

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
