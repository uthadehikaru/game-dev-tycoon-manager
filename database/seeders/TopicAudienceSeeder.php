<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Topic;
use App\Models\TopicAudience;
use App\Models\TopicGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicAudienceSeeder extends Seeder
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
        $open = fopen(storage_path('data/topic.csv'), "r");
        $data = fgetcsv($open);
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
        {
            for($i=1;$i<=9;$i++){
                $score = $scores[$data[$i]];
                if($i<7){
                    TopicGenre::create([
                        'topic_id' => Topic::where('name',$data[0])->value('id'),
                        'genre_id' => Genre::where('name',$genres[$i])->value('id'),
                        'score' => $score,
                    ]);
                }else{
                    TopicAudience::create([
                        'topic_id' => Topic::where('name',$data[0])->value('id'),
                        'score' => $score,
                        'audience' => $audiences[(string)$i],
                    ]);
                }
            }
        }
    }
}
