<?php
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];


    if (!empty($_GET['parking']) && $_GET['parking'] == 'on'){
            $filteredHotels = [];
            foreach ($hotels as $hotel) {
                if ($hotel['parking'] === true){
                    $filteredHotels[] = $hotel;
                }
            }

            $hotels = $filteredHotels;
    }

    if (!empty($_GET['vote']) && is_numeric($_GET['vote'])){
        $filteredHotels = [];
        foreach ($hotels as $hotel) {
            if ($hotel['vote'] >= $_GET['vote']){
                $filteredHotels[] = $hotel;
            }
        }

        $hotels = $filteredHotels;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3 text-center fw-bold">
                    PHP Hotel
                </h1>

                <table class="table table-dark table-striped table-hoverp-3 ">
                    <thead>
                        <tr>
                            <?php foreach (array_keys($hotels[0]) as $key) { ?>
                                <th scope="col">
                                    <?php echo ucwords(str_replace('_', ' ', trim($key))) ?>
                                </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hotels as $hotel) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $hotel['name'] ?>
                                </th>
                                <td>
                                    <?php echo $hotel['description'] ?>
                                </td>
                                <td>
                                    <?php echo $hotel['parking'] ?>
                                </td>
                                <td>
                                    <?php echo $hotel['vote'] ?>
                                </td>
                                <td>
                                    <?php echo $hotel['distance_to_center'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="parking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Show only hotels with available parking
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-number" type="number" id="flexCheckDefault" name="vote">
                    <label class="form-check-label" for="flexCheckDefault">
                        Show only hotels with an higher vote than
                    </label>
                </div>


                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>



    </div>


</body>
</html>