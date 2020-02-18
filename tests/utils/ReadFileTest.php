<?php
/**
 * Created by PhpStorm.
 * User: Jefferson Miranda
 * Date: 17/02/2020
 * Time: 21:33
 */

namespace tests\utils;


use importador\utils\ReadFile;
use PHPUnit\Framework\TestCase;

class ReadFileTest extends TestCase
{

    private $file = __DIR__ . "/../../tests/utils/file/RelCOMISSAO_20200217_003059_1.csv";

    /**
     * @var ReadFile
     */
    private $readFile;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->readFile = new ReadFile($this->file);
        $this->readFile->toCSV();

    }


    public function testToCSV()
    {
        $this->assertGreaterThan(1, $this->readFile->getQtdCols(), "Qtd Colunas");
        $this->assertGreaterThan(1, $this->readFile->getQtdRows(), "Qtd Linhas");
    }


    public function testGetData()
    {
        $this->assertTrue($this->readFile->getData(15, 0) == 'Proposta');
    }
}