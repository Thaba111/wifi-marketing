<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Segment;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating sample segments with criteria
        Segment::create([
            'name' => 'Location: Nairobi',
            'criteria' => json_encode(['location' => 'Nairobi']),
        ]);

        Segment::create([
            'name' => 'Recently Active',
            'criteria' => json_encode(['last_activity' => 'within_30_days']),
        ]);

        Segment::create([
            'name' => 'High Spending',
            'criteria' => json_encode(['spending' => 'over_1000']),
        ]);

        Segment::create([
            'name' => 'Inactive Contacts',
            'criteria' => json_encode(['last_activity' => 'over_90_days']),
        ]);
    }
}