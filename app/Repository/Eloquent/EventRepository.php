<?php
namespace App\Repository\Eloquent;

use App\Models\Concierto;
use App\Repository\EventRepositoryInterface;
use Illuminate\Support\Collection;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{

    /**
     * EventRepository constructor.
     *
     * @param Concierto $model
     */
    public function __construct(Concierto $model)
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