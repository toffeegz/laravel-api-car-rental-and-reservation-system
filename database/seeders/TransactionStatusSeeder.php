<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionStatus;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionStatus::truncate();

        TransactionStatus::insert([
            [
                'name' => 'Customer Request for Reservation',
                'status' => config('rental_reservation.reservation_status.PENDING'),
                'description' => 'Customer request for reservation',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Request for Reservation',
                'status' => config('rental_reservation.reservation_status.PENDING'),
                'description' => 'Admin created request for reservation',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'To Review',
                'status' => config('rental_reservation.reservation_status.PENDING'),
                'description' => 'Admin to Review',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Waiting for Payment',
                'status' => config('rental_reservation.reservation_status.PENDING'),
                'description' => 'Waiting for Payment',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Paid',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Paid',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'To Deliver',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'To deliver unit',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Delivered',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Unit Delivered',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'To Pickup',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'To pickup unit',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Picking Up',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Unit picking up',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Picked Up',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Unit picked up',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Payment Failed',
                'status' => config('rental_reservation.reservation_status.FAILED'),
                'description' => 'Payment Failed',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Cancelled',
                'status' => config('rental_reservation.reservation_status.CANCELLED'),
                'description' => 'Cancelled Reservation',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
