<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{

    protected $signature = 'import:jsonplaceholder';

    protected $description = 'get data from json placeholder';

    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts/1');
        $data = (json_decode($response->getBody()->getContents()));
        dd($data->id);
    }
}
