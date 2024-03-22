<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Platform;
use App\Models\PlatformAudience;
use App\Models\PlatformGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformAudienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scores = [
            '---' => 50,
            '--' => 60,
            '-' => 70,
            '+' => 80,
            '++' => 90,
            '+++' => 100,
        ];
        $audiences = [
            '7' => 'Y',
            '8' => 'E',
            '9' => 'M',
        ];
        $genres = ['','Action','Adventure','RPG','Simulation','Strategy','Casual'];
        $open = fopen(storage_path('data/platform.csv'), "r");
        $data = fgetcsv($open);
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
        {
            for($i=1;$i<=9;$i++){
                $score = $scores[$data[$i]];
                if($i<7){
                    PlatformGenre::create([
                        'platform_id' => Platform::where('name',$data[0])->value('id'),
                        'genre_id' => Genre::where('name',$genres[$i])->value('id'),
                        'score' => $score,
                    ]);
                }else{
                    PlatformAudience::create([
                        'platform_id' => Platform::where('name',$data[0])->value('id'),
                        'score' => $score,
                        'audience' => $audiences[(string)$i],
                    ]);
                }
            }
        }
    }
}
