<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = [
            [
                'name'         => 'Harry Potter',
                'slug'         => 'harry-potter',
                'description'  => 'After burying Dobby at the garden of the Shell cottage, Harry Potter (Daniel Radcliffe) convinces Griphook (Warwick Davis) to help them get to Lestrange\'s vault in Gringotts, to retrieve one of Voldemort\'s Horcruxes in exchange for Godric Gryffindor\'s Sword. Meanwhile, Ollivander (John Hurt), the Wandmaker warns Harry that he won\'t stand a chance with Voldemort (Ralph Fiennes) who has the Elder Wand. They arrived in Gringotts, Hermione (Emma Watson) disguised as Bellatrix (Helena Bonham Carter), using a Polyjuice Potion, Ron (Rupert Grint) disguised as a random wizard while Harry and Griphook go under the Invisibility Cloak. With the help of Imperius curse, they manage to get to the carts that take them down to the vaults, but when their cover is blown, Gringotts security attacks them. They manage to get to Lestrange\'s vault and find the Horcrux, Helga Hufflepuff\'s Cup, at which Griphook betrays them and flees with the sword yelling "Thieves! Thieves!" Harry grabs the Horcrux and the trio escape using a captive dragon. As they swim ashore of a lake, after jumping off the dragon, Harry has a vision about Voldemort receiving the news that the Horcrux was stolen. Harry sees that Voldemort is angry and scared. Voldemort kills the goblins, including Griphook, that bring him the news. Harry also sees that the next Horcrux is related to Rowena Ravenclaw, and is in Hogwarts castle.',
                'release_date' => '2011-07-15',
                'rating'       => '4',
                'ticket_price' => '16',
                'country_id'   => '226',
                'image_path'   => '/uploadedimages/harry_potter.jpg'
            ],
            [
                'name'         => 'Lord of the Rings',
                'slug'         => 'lord-of-the-rings',
                'description'  => 'An ancient Ring thought lost for centuries has been found, and through a strange twist in fate has been given to a small Hobbit named Frodo. When Gandalf discovers the Ring is in fact the One Ring of the Dark Lord Sauron, Frodo must make an epic quest to the Cracks of Doom in order to destroy it! However he does not go alone. He is joined by Gandalf, Legolas the elf, Gimli the Dwarf, Aragorn, Boromir and his three Hobbit friends Merry, Pippin and Samwise. Through mountains, snow, darkness, forests, rivers and plains, facing evil and danger at every corner the Fellowship of the Ring must go. Their quest to destroy the One Ring is the only hope for the end of the Dark Lords reign!',
                'release_date' => '2001-11-05',
                'rating'       => '5',
                'ticket_price' => '10',
                'country_id'   => '1',
                'image_path'   => '/uploadedimages/lord_of_the_rings.jpg'
            ],
            [
                'name'         => 'Les Miserables',
                'slug'         => 'les-miserables',
                'description'  => 'In 19th-century France, Jean Valjean, who for decades has been hunted by the ruthless policeman Javert after breaking parole, agrees to care for a factory worker\'s daughter. The decision changes their lives forever. If you love Les Mis the stage musical, my guess is you will love what Hooper and his bustling company have done. But when you hear "Master of the House" and you think of the Seinfeld episode with Elaine\'s gruff dad belting the tune before you think of those shifty innkeepers the Thénardiers, then you may want to steer clear of this grand endeavor.',
                'release_date' => '2012-08-15',
                'rating'       => '5',
                'ticket_price' => '15',
                'country_id'   => '226',
                'image_path'   => '/uploadedimages/les_miserables.jpg'
            ]
        ];

        DB::table('films')->insert($films);
    }
}
