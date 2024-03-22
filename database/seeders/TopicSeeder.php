<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = array('Airplane','Aliens','Alternate History','Business','City',
        'Comedy','Cyberpunk','Dance','Detective','Dungeon','Evolution','Fantasy',
        'Fashion','Game Dev','Government','Hacking','History','Horror','Hospital',
        'Hunting','Law','Life','Martial Arts','Medieval','Military','Movies','Music',
        'Mystery','Ninja','Pirate','Post Apocalyptic','Prison','Racing','Rhythm',
        'Romance','School','Sci-Fi','Space','Sports','Spy','Superheroes','Surgery',
        'Time Travel','Transport','UFO','Vampire','Virtual Pet','Vocabulary',
        'Werewolf','Wild West','Zombies');
        foreach($topics as $topic){
            Topic::create([
                'name' => $topic,
            ]);
        }

        $licensedTopics = array('G.T. - The Galactic Traveler',
            'Forward To The Past',
            'Professor Bones',
            'Left At Home',
            'Triassic Park',
            'Agent 7',
            'Toy Tale',
            'Spider-Hero');
        foreach($licensedTopics as $topic){
            Topic::create([
                'name' => $topic,
                'is_licensed' => true,
            ]);
        }
    }
}
