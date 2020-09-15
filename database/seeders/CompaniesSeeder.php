<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('companies')->insert([
            [
            'name' => 'Mantinga',
            'address' => 'Draugystes 12, Marijampolė',
            ], [
                'name' => 'BIT',
                'address' => 'Vytauto pr. 29, Kaunas',
                ],
                [
                    'name' => 'Apple',
                    'address' => 'One Apple Park Way
                    Cupertino, CA 95014
                    (408) 996–1010',
                    ],
                    [
                        'name' => 'Smasung',
                        'address' => 'Kazkur toli',
                        ],
                        [
                            'name' => 'Balti Logistic Solutions',
                            'address' => 'Kampiškių k., LT-53303 Kauno r',
                            ],
          
        ]);
    }
}