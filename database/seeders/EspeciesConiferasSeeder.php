<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\EspeciesConiferas;//Importamos el  modelo correspondiente para que se puedan introducir los datos



class EspeciesConiferasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especies = [
            // Grupo B 
            
            ['nombre_cientifico' => 'Pinus strobus', 'grupo' => 'B', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 750, 'xi_factor' => 11, 'b_factor' => 0.1947736],
            ['nombre_cientifico' => 'Pinus griffithii', 'grupo' => 'B', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 750, 'xi_factor' => 11, 'b_factor' => 0.1947736],
            ['nombre_cientifico' => 'Pinus halepensis', 'grupo' => 'B', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 750, 'xi_factor' => 11, 'b_factor' => 0.1947736],
            ['nombre_cientifico' => 'Biota orientalis', 'grupo' => 'B', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 750, 'xi_factor' => 11, 'b_factor' => 0.1947736],
            ['nombre_cientifico' => 'Araucaria heterophylla', 'grupo' => 'B', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 750, 'xi_factor' => 11, 'b_factor' => 0.1947736],
            ['nombre_cientifico' => 'Cryptomeria japonica', 'grupo' => 'B', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 750, 'xi_factor' => 11, 'b_factor' => 0.1947736],
            ['nombre_cientifico' => 'Cunninghamia lanceolata', 'grupo' => 'B', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 750, 'xi_factor' => 11, 'b_factor' => 0.1947736],

            //Grupo C 
            ['nombre_cientifico' => 'Pinus radiata', 'grupo' => 'C', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'rapida', 'k_factor' => 750, 'xi_factor' => 13.5, 'b_factor' => 0.1554254],
            ['nombre_cientifico' => 'Cupressus macrocarpa', 'grupo' => 'C', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'rapida', 'k_factor' => 750, 'xi_factor' => 13.5, 'b_factor' => 0.1554254],
            ['nombre_cientifico' => 'Cupressus glabra', 'grupo' => 'C', 'longevidad' => 'PocoLongeva', 'velocidad_crecimiento' => 'rapida', 'k_factor' => 750, 'xi_factor' => 13.5, 'b_factor' => 0.1554254], 
            
            // Grupo D 
            ['nombre_cientifico' => 'Abraucaria araucana', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Abies pinsapo', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Abies sp', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Juniperus sp', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Podocarpus sp', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Picea sp', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Pinus sylvestris', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Pinus nigra', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Sequoiadendron g', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Taxus baccata', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Sciadopitys verticillata', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Taxodium distichum', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Tetraclinis articulata', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Torreya sp', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Tsuga sp', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Ginkgo biloba', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Pinus uncinata', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            ['nombre_cientifico' => 'Cephalotaxus sp', 'grupo' => 'D', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'lenta', 'k_factor' => 1000, 'xi_factor' => 10, 'b_factor' => 0.2216769],
            
            // Grupo E 
            ['nombre_cientifico' => 'Thuyopsis dolabrata', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
            ['nombre_cientifico' => 'Thuja sp', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
            ['nombre_cientifico' => 'Cupressus sempervirens', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
            ['nombre_cientifico' => 'Calocedrus decurrens', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
            ['nombre_cientifico' => 'Cedrus sp', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
            ['nombre_cientifico' => 'Pseudotsuga menziesii', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
            ['nombre_cientifico' => 'Pinus canariensis', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
            ['nombre_cientifico' => 'Larix sp', 'grupo' => 'E', 'longevidad' => 'Longeva', 'velocidad_crecimiento' => 'media', 'k_factor' => 1000, 'xi_factor' => 12.5, 'b_factor' => 0.1729567],
      ];

      // Insertar las especies en la base de datos usando el método create()   
        


       

        foreach ($especies as $especie) {
            EspeciesConiferas::create($especie);
        }
    }
}
