<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Region;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index()
    {

        return view('admin');
    }

    public function parse()
    {
        // Инициализация cURL с указанием URL API
$ch = curl_init('https://api.hh.ru/areas');

// Настройки cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Возврат результата запроса
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Выполняем запрос и сохраняем ответ
$response = curl_exec($ch);

// Проверяем наличие ошибок
if (curl_errno($ch)) {
    echo 'Ошибка запроса: ' . curl_error($ch);
} else {
    // Преобразуем JSON-ответ в ассоциативный массив
    $areas = json_decode($response, true);

    // Поиск объекта с идентификатором 113 (Россия)
    foreach ($areas as $country) {
        if ($country['id'] == '113') {  // Идентификатор России
            // echo "Страна: " . $country['name'] . PHP_EOL;
            $res = $country['areas'];
            

            // Перебираем регионы
            foreach ($country['areas'] as $region) {
                // echo " - Регион: " . $region['name'] . PHP_EOL;
                // Перебираем города внутри региона
                foreach ($region['areas'] as $city) {

                    // echo $city['name'] . '=';
                }
            }
        }
    }
}

$exists = City::exists();

if ($exists) {

} else {
    DB::statement('ALTER TABLE regions AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE cities AUTO_INCREMENT = 1');

    DB::table('regions')->delete();
    DB::table('cities')->delete();

    for($i=0;$i<count($res);$i++){
        $res[$i]['slugName']=Str::slug($res[$i]['name']);

        $region = Region::create([
            'name' => $res[$i]['name'],         // Название города на кириллице
            'slug' => $res[$i]['slugName'],          // Название города на латинице
        ]);


        for($j=0;$j<count($res[$i]['areas']);$j++){
            $res[$i]['areas'][$j]['slugName']=Str::slug($res[$i]['areas'][$j]['name']);

                try {

            $city = City::create([
                'name' => $res[$i]['areas'][$j]['name'],         // Название города на кириллице
                'slug' => $res[$i]['areas'][$j]['slugName'],          // Название города на латинице
                'region_id' => $i+1,            // ID региона, к которому относится город
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            // Проверяем, что ошибка связана с дубликатом уникального поля
            if ($e->getCode() == 23000) {

                continue;
            }
    
            // Обрабатываем другие возможные ошибки
            throw $e;
        }
        }
    }
}

        // Закрываем cURL-сессию
        curl_close($ch);
        return redirect('/');
    }


    public function addCityApi(Request $request)
    {
         // Валидация входных данных
         $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:cities,name',
            'slug' => 'required|string|max:255|unique:cities,slug', // Slug должен быть уникальным
            'region_id' => 'required|integer|between:1,88',
        ]);

        // Создание нового города
        $city = City::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'region_id' => $validatedData['region_id'],
        ]);

        return response()->json(['message' => 'City added successfully', 'city' => $city], 201);
        
    }

    public function dellCityApi($name)
    {
        $city = City::find($name);

        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        $city->delete();

        return response()->json(['message' => 'City deleted successfully'], 200);
    }

}
