<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'message' => 'Ms Rowling should fill in the story of the life Harry Potter with backstories and Prequels of Harry\'s eccentric but overachieving spell-casting relatives: Mary Potter: Soccer mom, mother of 4 kids, who uses witch craft spells to juggle a busy domestic life. Ie. cast spells to hoover the rug, wash tough grass stains on rugby jersys, or clean windows. Larry Potter: Older cousin who is a laborer and alcoholic but uses magic to finish brickwork when he is drunk and slacking all day.',
                'user_id' => '1',
                'film_id' => '1'
            ],
            [
                'message' => 'Made with intelligence, imagination, passion and skill, propulsively paced and shot through with an aged-in-oak sense of wonder, the trilogy\'s first film so thrillingly catches us up in its sweeping story that nothing matters but the vivid and compelling events unfolding on the screen.',
                'user_id' => '1',
                'film_id' => '2'
            ],
            [
                'message' => 'What we\'re left with is a love-it-or-hate-it film. Those determined to resist its deep-seated romanticism - or its operatic approach - will probably emerge from the theater as miserable as the film\'s characters. But those who are willing to give into it, and who want to take a grand cinematic voyage, stand to be greatly rewarded.',
                'user_id' => '1',
                'film_id' => '3'
            ]
        ];

        DB::table('comments')->insert($comments);
    }
}
