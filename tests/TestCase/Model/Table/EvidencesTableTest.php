<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvidencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvidencesTable Test Case
 */
class EvidencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EvidencesTable
     */
    protected $Evidences;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Evidences',
        'app.Ideas',
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
        $config = TableRegistry::getTableLocator()->exists('Evidences') ? [] : ['className' => EvidencesTable::class];
        $this->Evidences = TableRegistry::getTableLocator()->get('Evidences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Evidences);

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
