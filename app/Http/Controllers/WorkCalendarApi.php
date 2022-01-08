<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Festivity;
use App\Models\Municipality;
use App\Models\MunicipalityForApi;
use App\Models\FestivityDate;

/**
* @OA\Info(
* title="Basque work calendar API", 
* version="1.0",
* description="This API provides access to data about work calendar of the Autonomous Community of the Basque Country. The data comes from the datasets of the Open Data Euskadi working calendar. The API provides data from 2014  to the current year.")
*
* @OA\Server(url="http://127.0.0.1:8000")
*/

class WorkCalendarApi extends Controller
{
    function getFestivitiesFormattedForApi($festivities) {
        $festivityDates = [];
        $isInArray = false;

        foreach ($festivities as $festivity) {
            foreach ($festivityDates as $festivityDate) {
                if ($festivityDate->date !== $festivity->festivity_date) {
                    $isInArray = false;                       
                } else {
                    $isInArray = true;
                    $municipalityCurrent = new MunicipalityForApi(
                        $festivity->municipality->municipality_code, 
                        $festivity->municipality->municipality_name_es, 
                        $festivity->municipality->municipality_name_eu,
                        $festivity->municipality->territory_name,
                        $festivity->festivity_name_es, 
                        $festivity->festivity_name_eu,
                        $festivity->municipality->latwgs84, 
                        $festivity->municipality->lonwgs84
                    );
                    array_push($festivityDate->items, $municipalityCurrent);  
                    break;
                }
            }
            if ($isInArray == false) {
                $festivityDateCurrent = new FestivityDate(
                    $festivity->festivity_date,
                    $festivity->municipality->municipality_code,
                    $festivity->municipality->municipality_name_es,
                    $festivity->municipality->municipality_name_eu,
                    $festivity->municipality->territory_name,
                    $festivity->festivity_name_es,
                    $festivity->festivity_name_eu,
                    $festivity->municipality->latwgs84,
                    $festivity->municipality->lonwgs84
                );
                $festivityDates[] = $festivityDateCurrent;
            } 
        }
        return $festivityDates;
    }

        /**
        * @OA\Get(
        * path="/api/v1/festivities/bydate/{year}/{month}/{day}",
        * summary="List of festivities by date",
        * description="Get list of festivities by date.",
        * operationId="festivitiesByDate",
        * tags={"festivities by date"},
        * @OA\Parameter(
        *    description="Year",
        *    in="path",
        *    name="year",
        *    required=true,
        *    example="2022",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        * @OA\Parameter(
        *    description="Month",
        *    in="path",
        *    name="month",
        *    required=true,
        *    example="6",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        * @OA\Parameter(
        *    description="Day",
        *    in="path",
        *    name="day",
        *    required=true,
        *    example="24",
        *    @OA\Schema(
        *        type="integer",
        *        format="int64"
        *       )
        *   ),
        *   @OA\Response(
        *       response=200,
        *       description="Get list of festivities of the Autonomous Community of the Basque Country by date."
        *   ),
        *   @OA\Response(
        *       response="default",
        *       description="An error has occurred."
        *   )
        * )
    */

    function getFestivitiesByDay($year, $month, $day) {
        $selectedStringDay =  date_create($year . '-' . $month . '-' . $day);       
        $festivitiesByDay = Festivity::whereYear('festivity_date', '=', $year)
            ->whereDate('festivity_date', '=', $selectedStringDay->format('Y-m-d'))
            ->orderby('festivity_date', 'asc')
            ->get();
        $festivityDatesByDay = $this->getFestivitiesFormattedForApi($festivitiesByDay);
        return
         response()->json($festivityDatesByDay, 201);
    }

            /**
        * @OA\Get(
        * path="/api/v1/festivities/bydate/{year}/{month}",
        * summary="List of festivities by month",
        * description="Get list of festivities by month.",
        * operationId="festivitiesByMonth",
        * tags={"festivities by date"},
        * @OA\Parameter(
        *    description="Year",
        *    in="path",
        *    name="year",
        *    required=true,
        *    example="2022",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        * @OA\Parameter(
        *    description="Month",
        *    in="path",
        *    name="month",
        *    required=true,
        *    example="6",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        *   @OA\Response(
        *       response=200,
        *       description="Get list of festivities of the Autonomous Community of the Basque Country by month."
        *   ),
        *   @OA\Response(
        *       response="default",
        *       description="An error has occurred."
        *   )
        * )
    */
    
    function getFestivitiesByMonth($year, $month) {
        $festivitiesByMonth = Festivity::whereYear('festivity_date', '=', $year)
            ->whereMonth('festivity_date', '=', $month)
            ->orderby('festivity_date', 'asc')
            ->get();
        $festivityDatesByMonth = $this->getFestivitiesFormattedForApi($festivitiesByMonth);
        return response()->json($festivityDatesByMonth, 201);
    }

                /**
        * @OA\Get(
        * path="/api/v1/festivities/bydate/{year}",
        * summary="List of festivities by year",
        * description="Get list of festivities by year.",
        * operationId="festivitiesByYear",
        * tags={"festivities by date"},
        * @OA\Parameter(
        *    description="Year",
        *    in="path",
        *    name="year",
        *    required=true,
        *    example="2022",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        *   @OA\Response(
        *       response=200,
        *       description="Get list of festivities of the Autonomous Community of the Basque Country by year."
        *   ),
        *   @OA\Response(
        *       response="default",
        *       description="An error has occurred."
        *   )
        * )
    */

    function getFestivitiesByYear($year) {
        $festivitiesByYear = Festivity::whereYear('festivity_date', '=', $year)
            ->orderby('festivity_date', 'asc')
            ->get();
        $festivityDatesByYear = $this->getFestivitiesFormattedForApi($festivitiesByYear);
        return response()->json($festivityDatesByYear, 201);
    }
  
    /**
        * @OA\Get(
        * path="/api/v1/festivities/bylocation/{territory}/{municipality}/bydate/{year}",
        * summary="List of festivities by municipality",
        * description="Get list of festivities by municipality and by year.",
        * operationId="festivitiesByMunicipality",
        * tags={"festivities by location"},
        * @OA\Parameter(
        *    description="Id of territory",
        *    in="path",
        *    name="territory",
        *    required=true,
        *    example="20",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        * @OA\Parameter(
        *    description="Id of municipality",
        *    in="path",
        *    name="municipality",
        *    required=true,
        *    example="20079",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        * @OA\Parameter(
        *    description="Year",
        *    in="path",
        *    name="year",
        *    required=true,
        *    example="2022",
        *    @OA\Schema(
        *        type="integer",
        *        format="int64"
        *       )
        *   ),
        *   @OA\Response(
        *       response=200,
        *       description="Get list of festivities of the Autonomous Community of the Basque Country by municipality."
        *   ),
        *   @OA\Response(
        *       response="default",
        *       description="An error has occurred."
        *   )
        * )
    */
    function getFestivitiesByMunicipality($territory, $municipality, $year) {
        $festivitiesByMunicipality = Festivity::join('municipalities', 'municipalities.id', '=', 'festivities.municipality_id')
        ->select(
            'festivities.festivity_date', 
            'festivities.festivity_name_es',
            'festivities.festivity_name_eu',
            'municipalities.municipality_code AS geo_code',
            'municipalities.municipality_name_es AS location_es',
            'municipalities.municipality_name_eu AS location_eu',
            'municipalities.territory_name',
            'municipalities.latwgs84',
            'municipalities.lonwgs84')
        ->orWhere(static function ($queryMunicipality) use ($territory, $municipality) {
                $queryMunicipality->where('municipalities.municipality_code', '=', $municipality)
                    ->orWhere('municipalities.municipality_code', '=', '16')
                    ->orWhere('municipalities.municipality_code', '=', $territory);
            })
            ->whereYear('festivities.festivity_date', '=', $year)
            ->orderby('festivities.festivity_date', 'asc')
            ->get();   
        return response()->json($festivitiesByMunicipality, 201);
    }

    /**
        * @OA\Get(
        * path="/api/v1/festivities/bylocation/{territory}/bydate/{year}",
        * summary="List of festivities by territory",
        * description="Get list of festivities by territory and by year.",
        * operationId="festivitiesByTerritory",
        * tags={"festivities by location"},
        * @OA\Parameter(
        *    description="Id of territory",
        *    in="path",
        *    name="territory",
        *    required=true,
        *    example="20",
        *    @OA\Schema(
        *       type="integer",
        *       format="int64"
        *    )
        * ),
        * @OA\Parameter(
        *    description="Year",
        *    in="path",
        *    name="year",
        *    required=true,
        *    example="2022",
        *    @OA\Schema(
        *        type="integer",
        *        format="int64"
        *       )
        *   ),
        *   @OA\Response(
        *       response=200,
        *       description="Get list of festivities of the Autonomous Community of the Basque Country by territory."
        *   ),
        *   @OA\Response(
        *       response="default",
        *       description="An error has occurred."
        *   )
        * )
    */

    function getFestivitiesByTerritory($territory, $year) {            
        $festivitiesByTerritory = Festivity::join('municipalities', 'municipalities.id', '=', 'festivities.municipality_id')
        ->select([
            'festivities.festivity_date', 
            'festivities.festivity_name_es',
            'festivities.festivity_name_eu', 
            'municipalities.municipality_code AS geo_code',
            'municipalities.municipality_name_es AS location_es',
            'municipalities.municipality_name_eu AS location_eu', 
            'municipalities.territory_name'])
        ->orWhere(static function ($queryTerritory) use ($territory) {
                $queryTerritory->where('municipalities.municipality_code', '=', $territory)
                    ->orWhere('municipalities.municipality_code', '=', '16');
            })
            ->whereYear('festivities.festivity_date', '=', $year)
            ->orderby('festivities.festivity_date', 'asc')
            ->get();
        return response()->json($festivitiesByTerritory, 201);
    }

    /**
        * @OA\Get(
        * path="/api/v1/festivities/bylocation/bydate/{year}",
        * summary="List of festivities of the Basque Country",
        * description="Get list of festivities of the Autonomous Community of the Basque Country.",
        * operationId="basqueFestivities",
        * tags={"festivities by location"},
        * @OA\Parameter(
        *    description="Year",
        *    in="path",
        *    name="year",
        *    required=true,
        *    example="2022",
        *    @OA\Schema(
        *        type="integer",
        *        format="int64"
        *       )
        *   ),
        *   @OA\Response(
        *       response=200,
        *       description="Get list of festivities of the Autonomous Community of the Basque Country."
        *   ),
        *   @OA\Response(
        *       response="default",
        *       description="An error has occurred."
        *   )
        * )
    */
    function getBasqueFestivities($year) {
        $basqueFestivities = Festivity::join('municipalities', 'municipalities.id', '=', 'festivities.municipality_id')
        ->select([
            'festivities.festivity_date', 
            'festivities.festivity_name_es',
            'festivities.festivity_name_eu',
            'municipalities.municipality_code AS geo_code',
            'municipalities.municipality_name_es AS location_es',
            'municipalities.municipality_name_eu AS location_eu'])
            ->whereYear('festivities.festivity_date', '=', $year)
            ->where('municipalities.municipality_code', '=', '16')
            ->orderby('festivities.festivity_date', 'asc')
            ->get();
        return response()->json($basqueFestivities, 201);
    }

    /**
        * @OA\Get(
        *     path="/api/v1/municipalities",
        *     summary="List of municipalities",
        *     tags={"municipalities"},
        *     @OA\Response(
        *         response=200,
        *         description="Get list of municipalities of the Autonomous Community of the Basque Country."
        *     ),
        *     @OA\Response(
        *         response="default",
        *         description="An error has occurred."
        *     )
        * )
    */
    function getMunicipalities() {
        $municipalities = Municipality::select([
            'municipality_code',
            'municipality_name_es',
            'municipality_name_eu',
            'territory_code', 
            'territory_name',
            'latwgs84',
            'lonwgs84'])
        ->where('municipality_code', '>', 50)
        ->orderby('municipality_code', 'asc')
        ->get();
        return response()->json($municipalities, 201);
    }

        /**
        * @OA\Get(
        *     path="/api/v1/territories",
        *     summary="List of territories",
        *     tags={"territories"},
        *     @OA\Response(
        *         response=200,
        *         description="Get list of territories of the Autonomous Community of the Basque Country."
        *     ),
        *     @OA\Response(
        *         response="default",
        *         description="An error has occurred."
        *     )
        * )
    */
    function getTerritories() {
        $territories = Municipality::select('territory_code','territory_name')
        ->where('municipality_code', '<', 50)
        ->where('municipality_code', '!=', 16)
        ->orderby('territory_code', 'asc')
        ->get();
        return response()->json($territories, 201);
    } 
}