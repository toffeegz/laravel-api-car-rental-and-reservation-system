<?php

namespace App\Services\Unit;

use Illuminate\Support\Facades\Log;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Repositories\Inclusion\InclusionRepositoryInterface;
use App\Services\Unit\UnitServiceInterface;
use App\Services\Utils\File\FileServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class UnitService implements UnitServiceInterface
{
    private UnitRepositoryInterface $modelRepository;
    private InclusionRepositoryInterface $inclusionRepository;
    private FileServiceInterface $fileService;
    private $folderName;

    public function __construct(
        UnitRepositoryInterface $modelRepository,
        InclusionRepositoryInterface $inclusionRepository,
        FileServiceInterface $fileService,
    ) {
        $this->modelRepository = $modelRepository;
        $this->inclusionRepository = $inclusionRepository;
        $this->fileService = $fileService;
        $this->folderName = 'Units';
    }

    public function store(array $attributes, $unit_image)
    {
        try {
            $file_name = Carbon::now()->format('dmYHis');
            $photo_path = $this->fileService->upload($this->folderName, $file_name, $unit_image);
            $attributes['photo_path'] = $photo_path;
            $unit_result = $this->modelRepository->create($attributes);
            if($unit_result && isset($attributes['inclusions'])) {
                $inclusions_result = [];
                $inclusions = $attributes['inclusions'];
                foreach($inclusions as $inclusion) {
                    $inclusions_result[] = $this->inclusionRepository->create($inclusion);
                }
            }
            return $unit_result;
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }
}
