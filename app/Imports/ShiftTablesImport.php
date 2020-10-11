<?php

namespace App\Imports;

use App\Models\ShiftTable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShiftTablesImport implements ToModel,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ShiftTable([
          'workDay' => date('Y-m-d', ($row['work_day'] - 25569) * 60 * 60 * 24),
          'userId' => $row['user_id'],
          'shiftId' => $row['shift_id']
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function rules(): array
    {
        // 書き方は通常のバリデーションと同じ。
        return [
            0 => ['required', 'date'],
            1 => ['required', 'numeric'],
            2 => ['required', 'numeric'],
        ];
    }

    /**
     * バリデーションエラー時の処理
     * @param Failure ...$failures
     */
    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            //
        }
    }

    /**
     * WithEvents interface needs `registerEvents()`
     */
    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterImport::class => function(AfterImport $event) {
                // エラーを纏めて、Excelに出力する
            }
        ];
    }

}
