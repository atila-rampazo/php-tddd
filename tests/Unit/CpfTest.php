<?php

namespace Unit;

use Exception;

use PHPUnit\Framework\TestCase;
use Zensolutions\Cpf;
use Zensolutions\CpfInvalidException;


class CpfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testDeveTestarUmCpfValido()
    {
        $cpf = new Cpf(cpf: "158.115.670-73");
        $this->assertEquals('158.115.670-73', $cpf->cpf);
    }

    public function testDeveTestarSeUmCpfEInvalido(){
        $this->expectException(CpfInvalidException::class);
        $this->expectExceptionMessage('CPF inváliddo');
       new Cpf(cpf: "317.716.098-81");
    }

    public function testDeveTestarUmCpfInvalidoComOsDigitosIguaisTudoCom(){
        $this->expectException(CpfInvalidException::class);
        $this->expectExceptionMessage('CPF inváliddo');
        new Cpf(cpf: "111.111.111-11");
    }

    public function testDeveValidarSeFoiInformadoUmCpf(){
        $this->expectException(CpfInvalidException::class);
        $this->expectExceptionMessage('CPF inváliddo');
        new Cpf(cpf: "");
    }
    public function testDeveValidarSeOCpfTemTodosOsDigitos(){
        $this->expectException(CpfInvalidException::class);
        $this->expectExceptionMessage('CPF inváliddo');
        new Cpf(cpf: "158.115.670");
    }
}