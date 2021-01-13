<?php
namespace App\Repository\Eloquent;

use App\Models\Recinto;
use App\Repository\EnclosureRepositoryInterface;
use Illuminate\Support\Collection;

class EnclosureRepository extends BaseRepository implements EnclosureRepositoryInterface
{

    /**
     * EventRepository constructor.
     *
     * @param Concierto $model
     */
    public function __construct(Recinto $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }
}