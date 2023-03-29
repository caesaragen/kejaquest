<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ImportCountiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:counties';

    protected $description = 'Import counties from JSON file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = 'counties.json';
        $json = Storage::disk('local')->get($filename);
        $data = json_decode($json, true);

        foreach ($data as $county) {
            $name = $county['name'];
            $code = $county['code'];
            $sub_county = $county['sub_counties'];

            DB::table('counties')->insert([
                'name' => $name,
                'code' => $code,
            ]);

            $county_id = DB::table('counties')
                ->where('name', $name)
                ->value('id');

            foreach ($sub_county as $sub_county) {
                DB::table('sub_counties')->insert([
                    'name' => $sub_county,
                    'county_id' => $county_id,
                ]);
            }

        }

        $this->info('Counties imported successfully.');
    }
}
