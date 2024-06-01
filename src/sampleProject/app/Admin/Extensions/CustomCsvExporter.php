<?php
namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\CsvExporter;

class CustomCsvExporter extends CsvExporter 
{
    public function query()
    {
        // エクスポート対象のクエリを返す
        return $this->filter()->execute();
    }
}