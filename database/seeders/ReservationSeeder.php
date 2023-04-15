<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Reservation;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        // Define the start and end dates for the reservations
        $start_date = Carbon::parse('January 1st');
        $end_date = Carbon::parse('April 30th');
        
        // Loop through each month
        for ($month = 1; $month <= 4; $month++) {
            // Generate 10 random reservations for the current month
            for ($i = 1; $i <= 10; $i++) {
                // Generate a random start and end date/time
                $start_time = Carbon::parse($start_date->format('Y-m-d') . ' ' . rand(0, 23) . ':00:00');
                $end_time = $start_time->copy()->addDays(rand(1, 7));
                
                // Generate a random unit, user, and status
                $unit_id = rand(1, 10);
                $user_id = rand(1, 10);
                $status = rand(1, 100);
                if ($status <= 80) {
                    $status = 2; // 80% approved
                } else if ($status <= 90) {
                    $status = 1; // 10% pending
                } else if ($status <= 95) {
                    $status = 4; // 5% cancelled
                } else {
                    $status = 3; // 5% disapproved
                }
                
                // Check if the reservation conflicts with any existing reservations
                $conflict = Reservation::where('unit_id', $unit_id)
                                       ->where(function ($query) use ($start_time, $end_time) {
                                           $query->whereBetween('start_date', [$start_time, $end_time])
                                                 ->orWhereBetween('end_date', [$start_time, $end_time])
                                                 ->orWhere(function ($query) use ($start_time, $end_time) {
                                                     $query->where('start_date', '<', $start_time)
                                                           ->where('end_date', '>', $end_time);
                                                 });
                                       })
                                       ->where(function ($query) use ($status) {
                                           $query->where('status', '!=', 4)
                                                 ->orWhereNull('status');
                                       })
                                       ->exists();
                
                // If there is no conflict, create the reservation
                if (!$conflict) {
                    Reservation::create([
                        'unit_id' => $unit_id,
                        'user_id' => $user_id,
                        'created_by' => 1,
                        'status' => $status,
                        'start_date' => $start_time,
                        'end_date' => $end_time,
                        'pickup_location' => 'Pickup location',
                        'destination' => 'Destination',
                    ]);
                }
            }
            
            // Increment the start date to the beginning of the next month
            $start_date->addMonthNoOverflow();
        }
    }
}
