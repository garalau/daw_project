<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'Nueva Actualización de la Norma Granada',
            'description' => 'La norma Granada ha recibido una importante actualización que afecta a las normativas urbanísticas.',
            'content' => 'Recientemente, se ha publicado una nueva versión de la Norma Granada que incluye cambios en los criterios de valoración del arbolado urbano, introduciendo nuevas categorías de especies y ajustes en los índices de valoración. Esta actualización tiene como objetivo mejorar la precisión en la evaluación del arbolado ornamental, haciendo más eficiente el proceso para los profesionales en el sector.',
            'image' => 'news_img/news1.jpg', 
        ]);

        News::create([
            'title' => 'Impacto de las Normas Paisajísticas en la Infraestructura Urbana',
            'description' => 'Las nuevas normas paisajísticas están redefiniendo el diseño de los espacios urbanos en las grandes ciudades.',
            'content' => 'Las normas paisajísticas recientes han generado un cambio significativo en la forma en que las ciudades gestionan y diseñan sus espacios públicos. Estas regulaciones están promoviendo el uso de vegetación autóctona, materiales sostenibles y soluciones innovadoras que mejoran la calidad del aire y fomentan la biodiversidad en entornos urbanos.',
            'image' => 'news_img/news2.jpg', 
        ]);

        News::create([
            'title' => 'Avances en la Arboricultura Urbana en Madrid',
            'description' => 'Se han realizado avances significativos en la arboricultura urbana en Madrid, siguiendo la normativa de la Norma Granada.',
            'content' => 'El Ayuntamiento de Madrid ha implementado nuevas estrategias para mejorar la salud del arbolado urbano, basándose en los parámetros establecidos por la Norma Granada. Estas iniciativas incluyen la plantación de más especies autóctonas, el mantenimiento adecuado de los árboles existentes y la creación de nuevas áreas verdes en barrios densamente poblados.',
            'image' => 'news_img/news3.jpg', 
        ]);
    }
}
