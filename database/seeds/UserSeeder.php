<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\User;
use App\Country;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$companies=Company::all();
    	$canadaCountry=Country::where('country_name','Canada')->first();
    	foreach ($companies as $key => $company) {
            $count=1;
    		if($company->country_id == $canadaCountry->id){
                $count=10;	
    		}
    		factory(\App\User::class,$count)->create()->each(function ($user) use($company) {
    			$user->companies()->sync([$company->id=>['joining_date'=>date('Y-m-d')]],false);
    		});
    	}
        
    }
}
