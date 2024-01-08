<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Termwind\Components\Li;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//      \App\Models\User::factory(10)->create();

          $user =User::factory()->create([
            'name'=>'John Doe',
            'email'=>'john@gmail.com',
            ]);
         Listing::factory(6)->create([
          'user_id' => $user->id
          ]);

         //Listing::create([
           // 'title'=>' maseno senior  coder',
            //'tags'=>'laravel,javascript',
           // 'company'=>'wizard tech',
           // 'location'=>'kenya, nairobi',
        //    'email'=>'wizardtech@email.com',
          //  'website'=>'hhtps://www.wizardtech.com',
//            'description'=>'the leadding tech company in  Africa dedicated towards providing the
  //          best tech services to africans at an affordable price.Our crew is made of the best it wizards in the world
    //        hence we  are  confident that in the world of zeros and ones no one can beat us because we are simply the best'
      //                  ]);
        //    Listing::create([
          //  'title'=>'full stack developer',
//            'tags'=>'laravel , Java',
  //          'company'=>'martintech',
    //        'location'=>'kenya, nairobi',
      //      'email'=>'wixardissahch@email.com',
        //    'website'=>'https://www.martinardtech.com',
          //  'description'=>'the leading tech company in  Africa dedicated towards providing the
            //best tech services to africans at an affordable price.
//            Our crew is made of the best it wizards in the world
  //          hence we  are  confident that in the world of
    //        zeros and ones no one on the planet can dare challenge us may be aliens'
      //          ]);
    }
}
