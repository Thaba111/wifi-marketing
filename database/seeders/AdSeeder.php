<?php
use Carbon\Carbon;
use App\Models\Ad;

Ad::create([
    'title' => 'End of Year Clearance',
    'content' => 'Don’t miss out on our clearance sale before the year ends!',
    'schedule' => json_encode([  // Ensure this is encoded as JSON
        'from' => Carbon::parse('2024-12-01 09:00:00')->toDateTimeString(), // Start time
        'interval' => 'weekly',  // Can be 'daily', 'weekly', etc.
        'to' => Carbon::parse('2024-12-31 23:59:00')->toDateTimeString()  // End time
    ]),
    'target_audience' => json_encode([  // Encode the audience as JSON as well
        'age_range' => '18-50',
        'locations' => ['Nairobi', 'Mombasa', 'Kisumu', 'Eldoret'],
        'interests' => ['discounts', 'year-end sales', 'shopping']
    ]),
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
]);
Ad::create([
    'title' => 'New Product Launch',
    'content' => 'Check out our brand-new range of eco-friendly products!',
    'schedule' => json_encode([
        'from' => Carbon::parse('2024-10-10 09:00:00')->toDateTimeString(),  
        'interval' => 'weekly',  
        'to' => Carbon::parse('2024-10-20 17:00:00')->toDateTimeString()  
    ]),
    
    'target_audience' => json_encode([
        'age_range' => '25-45',
        'locations' => ['Nairobi'],
        'interests' => ['sustainability', 'eco-friendly', 'technology']
    ])
]);

Ad::create([
    'title' => 'Holiday Offers',
    'content' => 'Celebrate the holidays with special offers on all products.',
    'schedule' => json_encode([
        'from' => Carbon::parse('2024-10-10 09:00:00')->toDateTimeString(),  
        'interval' => 'monthly',
        'to' => Carbon::parse('2024-10-20 17:00:00')->toDateTimeString()  
    ]),
    
    
    'target_audience' => json_encode([
        'age_range' => 'All ages',
        'locations' => ['Nationwide'],
        'interests' => ['holidays', 'family', 'celebrations']
    ])
]);

