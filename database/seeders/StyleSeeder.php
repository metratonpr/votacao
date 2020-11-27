<?php

namespace Database\Seeders;


use App\Models\Admin\Style;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///
        $styles = [
            'Axé',
            'Black Music',
            'Blues',
            'Bossa Nova',
            'Chillout',
            'Classic Rock',
            'Clássico',
            'Country',
            'Dance',
            'Disco',
            'Electro Swing',
            'Electronica',
            'Emocore',
            'Fado',
            'Folk',
            'Forró',
            'Funk',
            'Funk Carioca',
            'Gospel/Religioso',
            'Gótico',
            'Grunge',
            'Hard Rock',
            'Hardcore',
            'Heavy Metal',
            'Hip Hop',
            'House',
            'Indie',
            'Industrial',
            'Infantil',
            'Instrumental',
            'J-Pop/J-Rock',
            'Jazz',
            'Jovem Guarda',
            'K-Pop/K-Rock',
            'Kizomba',
            'Lo-fi',
            'Metal',
            'MPB',
            'Músicas Gaúchas',
            'New Age',
            'New Wave',
            'Pagode',
            'Piano Rock',
            'Pop',
            'Pop/Punk',
            'Pop/Rock',
            'Pós-Punk',
            'Post-Rock',
            'Power-Pop',
            'Progressivo',
            'Psicodelia',
            'Punk Rock',
            'R&B',
            'Rap',
            'Reggae',
            'Reggaeton',
            'Regional',
            'Rock',
            'Rock Alternativo',
            'Rockabilly',
            'Romântico',
            'Samba',
            'Samba Enredo',
            'Sertanejo',
            'Ska',
            'Soft Rock',
            'Soul Music',
            'Surf Music',
            'Tecnopop',
            'Trance',
            'Trap',
            'Trilha Sonora',
            'Trip-Hop',
            'Tropical House',
            'Velha Guarda',
            'World Music'
        ];

        foreach($styles as $s){
            Style::create(['name' => $s]);
        }
    }
}
