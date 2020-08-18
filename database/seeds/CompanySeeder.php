<?php

use Illuminate\Database\Seeder;
Use App\Country;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $countries=Country::all();
       foreach ($countries as $key => $country) {
       		if($country->country_name=='Canada'){
       			factory(\App\Company::class,100)->create(['country_id'=>$country->id]);
       		}else{
       			factory(\App\Company::class,1)->create(['country_id'=>$country->id]);
       		}
       }
       
    }
}
