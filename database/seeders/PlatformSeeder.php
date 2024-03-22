<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = ['PC','G64','TES','Master V','Gameling','Vena Gear','Vena Oasis','Super TES','Playsystem','TES 64','DreamVast','Playsystem 2','mBox','Game Sphere','GS','PPS','mBox 360','Nuu','Playsystem 3','grPhone','grPad','mPad','Wuu','OYA','mBox One','Playsystem 4','mBox Next','Playsystem 5','Custom Console'];
        foreach($platforms as $platform){
            Platform::create([
                'Name' => $platform,
            ]);
        }
    }
}
