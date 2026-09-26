<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('teachers') || ! Schema::hasColumn('teachers', 'studied')) {
            return;
        }

        $width = $this->currentWidth();

        if ($width !== null && $width < 3000) {
            DB::statement('ALTER TABLE `teachers` MODIFY `studied` VARCHAR(3000) NOT NULL');
        }
    }

    public function down()
    {
        if (! Schema::hasTable('teachers') || ! Schema::hasColumn('teachers', 'studied')) {
            return;
        }

        $overflow = DB::table('teachers')->whereRaw('CHAR_LENGTH(`studied`) > 255')->count();

        if ($overflow > 0) {
            throw new RuntimeException(
                "Cannot shrink teachers.studied back to VARCHAR(255): {$overflow} row(s) exceed 255 characters."
            );
        }

        DB::statement('ALTER TABLE `teachers` MODIFY `studied` VARCHAR(255) NOT NULL');
    }

    private function currentWidth(): ?int
    {
        foreach (DB::select('SHOW COLUMNS FROM `teachers` LIKE \'studied\'') as $column) {
            if (preg_match('/varchar\((\d+)\)/i', $column->Type, $matches) === 1) {
                return (int) $matches[1];
            }
        }

        return null;
    }
};
