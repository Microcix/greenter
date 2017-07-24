<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 19/07/2017
 * Time: 04:14 PM
 */

namespace Tests\Greenter\Xml\Builder;

use Greenter\Model\Sale\Legend;
use Greenter\Model\Sale\Note;
use Greenter\Model\Sale\SaleDetail;

/**
 * Class FeNoteBuilderTest
 * @package tests\Greenter\Xml\Builder
 */
class FeNoteBuilderTest extends \PHPUnit_Framework_TestCase
{
    use FeBuilderTrait;

    public function testValidateNote()
    {
        $note = $this->getCreditNote();
        $validator = $this->getValidator();
        $errors = $validator->validate($note);

        $this->assertEquals(0,$errors->count());
    }

    public function testNotValidateNote()
    {
        $note = $this->getCreditNote();
        $note->setCodMotivo('C00')
            ->setTipoDoc('212');
        $validator = $this->getValidator();
        $errors = $validator->validate($note);

        $this->assertEquals(2,$errors->count());
    }

    public function testCreateXmlCreditNote()
    {
        $note = $this->getCreditNote();

        $generator = $this->getGenerator();
        $xml = $generator->buildNote($note);

        $this->assertNotEmpty($xml);
    }

    public function testCreateXmlDebitNote()
    {
        $note = $this->getCreditNote();
        $note->setTipoDoc('08');

        $generator = $this->getGenerator();
        $xml = $generator->buildNote($note);

        $this->assertNotEmpty($xml);
        // file_put_contents('notedb.xml', $xml);
    }

    private function getCreditNote()
    {
        $note = new Note();
        $note
            ->setTipDocAfectado('01')
            ->setNumDocfectado('F001-111')
            ->setCodMotivo('01')
            ->setDesMotivo('ANULACION DE LA OPERACION')
            ->setTipoDoc('07')
            ->setSerie('FF01')
            ->setCorrelativo('123')
            ->setTipoMoneda('PEN')
            ->setTipoDocUsuario('6')
            ->setNumDocUsuario('20000000001')
            ->setRznSocialUsuario('EMPRESA 1')
            ->setMtoOperGravadas(200)
            ->setMtoOperExoneradas(0)
            ->setMtoOperInafectas(0)
            ->setMtoIGV(36)
            ->setMtoImpVenta(236);

        $detail1 = new SaleDetail();
        $detail1->setCodProducto('C023')
            ->setCodUnidadMedida('NIU')
            ->setCtdUnidadItem(2)
            ->setDesItem('PROD 1')
            ->setMtoIgvItem(18)
            ->setTipAfeIgv('10')
            ->setMtoValorVenta(100)
            ->setMtoValorUnitario(50)
            ->setMtoPrecioUnitario(56);

        $detail2 = new SaleDetail();
        $detail2->setCodProducto('C02')
            ->setCodUnidadMedida('NIU')
            ->setCtdUnidadItem(2)
            ->setDesItem('PROD 2')
            ->setMtoIgvItem(18)
            ->setTipAfeIgv('10')
            ->setMtoValorVenta(100)
            ->setMtoValorUnitario(50)
            ->setMtoPrecioUnitario(56);

        $legend = new Legend();
        $legend->setCode('1000')
            ->setValue('SON N SOLES');

        $note->setDetails([$detail1, $detail2])
            ->setLegends([$legend]);

        return $note;
    }
}