<?php
/**
 * Created by PhpStorm.
 * User: Jefferson Miranda
 * Date: 17/02/2020
 * Time: 19:29
 */

namespace importador\utils;


class ReadFile
{
    private $file;
    private $data;
    private $qtdRows = 0;
    private $qtdCols = 0;

    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getData($row = '', $col = '')
    {
        if($row !== '' and $col !== ''){
            return $this->data[$row][$col];
        }

        if($row !== ''){
            return $this->data[$row];
        }

        return $this->data;
    }

    /**
     * @return int
     */
    public function getQtdRows()
    {
        return $this->qtdRows;
    }

    /**
     * @return int
     */
    public function getQtdCols()
    {
        return $this->qtdCols;
    }

    public function toCSV($file = '')
    {

        if($file <> '') $this->file = $file;

        $retorno = Array();
        $file = fopen($this->file, 'r');
        while (!feof($file)) {
            $linha = fgets($file);
            $linha = str_replace('","', ";", $linha);
            $linha = str_replace('"', "", $linha);
            $itens = explode(';', $linha);
            $retorno[] = $itens;
        }

        $this->data = $retorno;

        $this->qtdRows = count($this->data);

        foreach ($this->data as $colunas){
            if(count($colunas) > $this->qtdCols){
                $this->qtdCols = count($colunas);
            }
        }

        return $this;
    }
}