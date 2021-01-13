<?php

namespace App\Http\Controllers;


use App\Mail\Profitability;
use App\Models\Concierto;
use App\Models\Grupo;
use App\Models\Promotor;
use App\Models\Recinto;
use App\Repository\EnclosureRepositoryInterface;
use App\Repository\EventRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    private $eventRepository, $enclosureRepository;
    const GROUP_PERCENTAGE = 10;

    public function __construct(EventRepositoryInterface $eventRepository, EnclosureRepositoryInterface $enclosureRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->enclosureRepository = $enclosureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): array
    {
        $events = $this->eventRepository->all();

        if ( !$events)
        {
            throw new \Exception('No hay conciertos registrados en la base de datos.');
        }

        return [
            "Conciertos" => $events
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $cache = $benefits = $profitability = 0;

            $promoter = Promotor::find($request->id_promotor);
            $enclosure = Recinto::find($request->id_recinto);

            if ( !$promoter || !$enclosure )
            {
                throw new \Exception('Promotor o Recinto no existen en la base de datos.');
            }

            $groupIds = $request->id_grupos;

            foreach ($groupIds as $groupId) {
                $group = Grupo::find($groupId);
                if ( !$group )
                {
                    throw new \Exception('Grupo no existe en la base de datos. ID: '.$groupId);
                }
                $cache += $group->cache;
            }

            $benefits = $request->numero_espectadores * $enclosure->precio_entrada;
            $expenses = $enclosure->coste_alquiler + $cache + (($benefits * self::GROUP_PERCENTAGE) / 100);
            $profitability = $benefits - $expenses;

            //Create event
            $event = Concierto::create([
                'id_promotor' => $request->id_promotor,
                'id_recinto' => $request->id_recinto,
                'nombre' => $request->nombre,
                'fecha' => $request->fecha,
                'numero_espectadores' => $request->numero_espectadores,
                'rentabilidad' => $profitability
            ]);

            //Create groups
            $event->grupos()->attach($groupIds);

            //Create advertising media
            $event->medios()->attach($request->id_medios);

            //Send mail
//            Mail::to($request->email)->send(new Profitability($event));

            return response()->json(['created' => true],201);
        }catch(\Exception $e){
            return response()->json([
                'error' => true,
                'msg' => 'Lo sentimos, no se pudo registrar el concierto. Error: '.$e->getMessage()],
                404);
        }
    }
}
