<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\BaseRepositoryInterface;
use App\Repositories\Branch\BranchRepository;
use App\Repositories\Branch\BranchRepositoryInterface;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\CompanyInformation\CompanyInformationRepository;
use App\Repositories\CompanyInformation\CompanyInformationRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\IdentificationDocument\IdentificationDocumentRepository;
use App\Repositories\IdentificationDocument\IdentificationDocumentRepositoryInterface;
use App\Repositories\Inclusion\InclusionRepository;
use App\Repositories\Inclusion\InclusionRepositoryInterface;
use App\Repositories\InclusionType\InclusionTypeRepository;
use App\Repositories\InclusionType\InclusionTypeRepositoryInterface;
use App\Repositories\PromotionalPost\PromotionalPostRepository;
use App\Repositories\PromotionalPost\PromotionalPostRepositoryInterface;
use App\Repositories\Reservation\ReservationRepository;
use App\Repositories\Reservation\ReservationRepositoryInterface;
use App\Repositories\Transaction\TransactionRepository;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use App\Repositories\TransactionStatus\TransactionStatusRepository;
use App\Repositories\TransactionStatus\TransactionStatusRepositoryInterface;
use App\Repositories\Unit\UnitRepository;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Repositories\UnitClassification\UnitClassificationRepository;
use App\Repositories\UnitClassification\UnitClassificationRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Verification\VerificationRepository;
use App\Repositories\Verification\VerificationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(CompanyInformationRepositoryInterface::class, CompanyInformationRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(IdentificationDocumentRepositoryInterface::class, IdentificationDocumentRepository::class);
        $this->app->bind(InclusionRepositoryInterface::class, InclusionRepository::class);
        $this->app->bind(InclusionTypeRepositoryInterface::class, InclusionTypeRepository::class);
        $this->app->bind(PromotionalPostRepositoryInterface::class, PromotionalPostRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class, ReservationRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(TransactionStatusRepositoryInterface::class, TransactionStatusRepository::class);
        $this->app->bind(UnitRepositoryInterface::class, UnitRepository::class);
        $this->app->bind(UnitClassificationRepositoryInterface::class, UnitClassificationRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(VerificationRepositoryInterface::class, VerificationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
