<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wilayas = array(
		  array('id' => '1','code_postal' => '1','name' => 'Adrar'),
		  array('id' => '2','code_postal' => '2','name' => 'Chlef'),
		  array('id' => '3','code_postal' => '3','name' => 'Laghouat'),
		  array('id' => '4','code_postal' => '4','name' => 'Oum El Bouaghi'),
		  array('id' => '5','code_postal' => '5','name' => 'Batna'),
		  array('id' => '6','code_postal' => '6','name' => 'Béjaïa'),
		  array('id' => '7','code_postal' => '7','name' => 'Biskra'),
		  array('id' => '8','code_postal' => '8','name' => 'Béchar'),
		  array('id' => '9','code_postal' => '9','name' => 'Blida'),
		  array('id' => '10','code_postal' => '10','name' => 'Bouira'),
		  array('id' => '11','code_postal' => '11','name' => 'Tamanrasset'),
		  array('id' => '12','code_postal' => '12','name' => 'Tébessa'),
		  array('id' => '13','code_postal' => '13','name' => 'Tlemcen'),
		  array('id' => '14','code_postal' => '14','name' => 'Tiaret'),
		  array('id' => '15','code_postal' => '15','name' => 'Tizi Ouzou'),
		  array('id' => '16','code_postal' => '16','name' => 'Alger'),
		  array('id' => '17','code_postal' => '17','name' => 'Djelfa'),
		  array('id' => '18','code_postal' => '18','name' => 'Jijel'),
		  array('id' => '19','code_postal' => '19','name' => 'Sétif'),
		  array('id' => '20','code_postal' => '20','name' => 'Saïda'),
		  array('id' => '21','code_postal' => '21','name' => 'Skikda'),
		  array('id' => '22','code_postal' => '22','name' => 'Sidi Bel Abbès'),
		  array('id' => '23','code_postal' => '23','name' => 'Annaba'),
		  array('id' => '24','code_postal' => '24','name' => 'Guelma'),
		  array('id' => '25','code_postal' => '25','name' => 'Constantine'),
		  array('id' => '26','code_postal' => '26','name' => 'Médéa'),
		  array('id' => '27','code_postal' => '27','name' => 'Mostaganem'),
		  array('id' => '28','code_postal' => '28','name' => 'M\'Sila'),
		  array('id' => '29','code_postal' => '29','name' => 'Mascara'),
		  array('id' => '30','code_postal' => '30','name' => 'Ouargla'),
		  array('id' => '31','code_postal' => '31','name' => 'Oran'),
		  array('id' => '32','code_postal' => '32','name' => 'El Bayadh'),
		  array('id' => '33','code_postal' => '33','name' => 'Illizi'),
		  array('id' => '34','code_postal' => '34','name' => 'Bordj Bou Arreridj'),
		  array('id' => '35','code_postal' => '35','name' => 'Boumerdès'),
		  array('id' => '36','code_postal' => '36','name' => 'El Tarf'),
		  array('id' => '37','code_postal' => '37','name' => 'Tindouf'),
		  array('id' => '38','code_postal' => '38','name' => 'Tissemsilt'),
		  array('id' => '39','code_postal' => '39','name' => 'El Oued'),
		  array('id' => '40','code_postal' => '40','name' => 'Khenchela'),
		  array('id' => '41','code_postal' => '41','name' => 'Souk Ahras'),
		  array('id' => '42','code_postal' => '42','name' => 'Tipaza'),
		  array('id' => '43','code_postal' => '43','name' => 'Mila'),
		  array('id' => '44','code_postal' => '44','name' => 'Aïn Defla'),
		  array('id' => '45','code_postal' => '45','name' => 'Naâma'),
		  array('id' => '46','code_postal' => '46','name' => 'Aïn Témouchent'),
		  array('id' => '47','code_postal' => '47','name' => 'Ghardaïa'),
		  array('id' => '48','code_postal' => '48','name' => 'Relizane'),
		  array('id' => '49','code_postal' => '49','name' => 'Timimoun'),
		  array('id' => '50','code_postal' => '50','name' => 'Bordj Badji Mokhtar'),
		  array('id' => '51','code_postal' => '51','name' => 'Ouled Djellal'),
		  array('id' => '52','code_postal' => '52','name' => 'Béni Abbès'),
		  array('id' => '53','code_postal' => '53','name' => 'In Salah'),
		  array('id' => '54','code_postal' => '54','name' => 'In Guezzam'),
		  array('id' => '55','code_postal' => '55','name' => 'Touggourt'),
		  array('id' => '56','code_postal' => '56','name' => 'Djanet'),
		  array('id' => '57','code_postal' => '57','name' => "El M'Ghair"),
		  array('id' => '58','code_postal' => '58','name' => 'El Meniaa'),
		);
		DB::table('wilayas')->insert($wilayas);
    
    }
}
