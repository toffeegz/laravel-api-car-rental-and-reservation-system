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
            ],
            [
                'name' => 'Request for Reservation',
                'status' => config('rental_reservation.reservation_status.PENDING'),
                'description' => 'Admin created request for reservation',
            ],
            [
                'name' => 'To Review',
                'status' => config('rental_reservation.reservation_status.PENDING'),
                'description' => 'Admin to Review',
            ],
            [
                'name' => 'Waiting for Payment',
                'status' => config('rental_reservation.reservation_status.PENDING'),
                'description' => 'Waiting for Payment',
            ],
            [
                'name' => 'Paid',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Paid',
            ],
            [
                'name' => 'To Deliver',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'To deliver unit',
            ],
            [
                'name' => 'Delivered',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Unit Delivered',
            ],
            [
                'name' => 'To Pickup',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'To pickup unit',
            ],
            [
                'name' => 'Picking Up',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Unit picking up',
            ],
            [
                'name' => 'Picked Up',
                'status' => config('rental_reservation.reservation_status.APPROVED'),
                'description' => 'Unit picked up',
            ],
            [
                'name' => 'Payment Failed',
                'status' => config('rental_reservation.reservation_status.FAILED'),
                'description' => 'Payment Failed',
            ],
            [
                'name' => 'Cancelled',
                'status' => config('rental_reservation.reservation_status.CANCELLED'),
                'description' => 'Cancelled Reservation',
            ],
        ]);
    }
}
