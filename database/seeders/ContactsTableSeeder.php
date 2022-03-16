<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Contacts')->insert(
            [
                [
                    'fullname'=>'山田 太郎',
                    'gender'=>'男性',
                    'email'=>'test@example.com',
                    'postcode'=>'123-4567',
                    'address'=>'東京都渋谷区千駄ヶ谷1-2-3',
                    'building_name'=>'千駄ヶ谷マンション101',
                    'opinion'=>'いつもお世話になっております。先日、貴社製品を購入させていただきました。この度、不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばよいかご教授いただきたいです。',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            ]
        );
        
        Contact::factory()->count(35)->create();
    }
}