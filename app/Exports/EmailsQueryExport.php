<?php


namespace App\Exports;


use App\Models\Email;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class EmailsQueryExport implements FromQuery, Responsable, WithColumnFormatting, WithMapping
{
    use Exportable;

    protected $where;

    public function __construct($where)
    {
        $this->where = $where;
    }

    public function query()
    {
        return Email::query()->whereBetween('created_at', $this->where);
    }

    public function __get($name)
    {
        if ($name == 'fileName') {
            return 'emails_'.now()->toDateString().'.xlsx';
        }
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->email,
            $row->cplb,
            $row->pwsl,
            $row->idxh,
            Date::dateTimeToExcel($row->created_at),
            Date::dateTimeToExcel($row->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'G' => NumberFormat::FORMAT_DATE_YYYYMMDD,
        ];
    }
}
