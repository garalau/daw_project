<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ConiferSpecies;

class ConiferSpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $species = [
            ['name' => 'Pinus strobus', 'longevity' => 'pocoLongeva', 'growth_rate' => 'medio', 'group_name' => 'B' ],
            ['name' => 'Pinus griffithii', 'longevity' => 'pocoLongeva', 'growth_rate' => 'medio', 'group_name' => 'B' ],
            ['name' => 'Pinus halepensis', 'longevity' => 'pocoLongeva', 'growth_rate' => 'medio', 'group_name' => 'B' ],
            ['name' => 'Biota orientalis', 'longevity' => 'pocoLongeva', 'growth_rate' => 'medio', 'group_name' => 'B' ],
            ['name' => 'Araucaria heterophylla', 'longevity' => 'pocoLongeva', 'growth_rate' => 'medio', 'group_name' => 'B' ],
            ['name' => 'Cryptomeria japonica', 'longevity' => 'pocoLongeva', 'growth_rate' => 'medio', 'group_name' => 'B' ],
            ['name' => 'Cunninghamia lanceolata', 'longevity' => 'pocoLongeva', 'growth_rate' => 'medio', 'group_name' => 'B' ],
            
            ['name' => 'Pinus radiata', 'longevity' => 'pocoLongeva', 'growth_rate' => 'rapido', 'group_name' => 'C' ],
            ['name' => 'Cupressus macrocarpa', 'longevity' => 'pocoLongeva', 'growth_rate' => 'rapido', 'group_name' => 'C' ],
            ['name' => 'Cupressus glabra', 'longevity' => 'pocoLongeva', 'growth_rate' => 'rapido', 'group_name' => 'C' ],

            ['name' => 'Abraucaria araucana', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Abies pinsapo', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Abies sp', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Juniperus sp', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Podocarpus sp', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Picea sp', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Pinus sylvestris', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Pinus nigra', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Sequoiadendron g', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Taxus baccata', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Sciadopitys verticillata', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Taxodium distichum', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Tetraclinis articulata', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Torreya sp', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Tsuga sp', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Ginkgo biloba', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Pinus uncinata', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],
            ['name' => 'Cephalotaxus sp', 'longevity' => 'longeva', 'growth_rate' => 'lento', 'group_name' => 'D' ],

            ['name' => 'Thuyopsis dolabrata', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            ['name' => 'Thuja sp', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            ['name' => 'Cupressus sempervirens', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            ['name' => 'Calocedrus decurrens', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            ['name' => 'Cedrus sp', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            ['name' => 'Pseudotsuga menziesii', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            ['name' => 'Pinus canariensis', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            ['name' => 'Larix sp', 'longevity' => 'longeva', 'growth_rate' => 'medio', 'group_name' => 'E' ],
            
            


        ];

        foreach ($species as $specie) {
            ConiferSpecies::create($specie);
        }
    }
}
