<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResumesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResumesTable Test Case
 */
class ResumesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResumesTable
     */
    protected $Resumes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Resumes',
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
        $config = TableRegistry::getTableLocator()->exists('Resumes') ? [] : ['className' => ResumesTable::class];
        $this->Resumes = TableRegistry::getTableLocator()->get('Resumes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Resumes);

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
