<?php

$id=$_GET['id'];

/* Movie Deyail Request */
$API_KEY = '47cff2bc9ba543e2c1ea46e263f05d97';

$url_detail_movie = 'https://api.themoviedb.org/3/tv/'.$id.'?api_key=' . $API_KEY .'';

$data_trending = file_get_contents($url_detail_movie);

/* Decode json */
$data_movie_json = json_decode($data_trending, true);

/* Dump data */
$json_pretty_1 = json_encode($data_movie_json, JSON_PRETTY_PRINT);

/* Movie detail */

$movie_detail_image = $data_movie_json['backdrop_path'];
$movie_detail_title =$data_movie_json['original_name'];
$movie_detail_desc = $data_movie_json['overview'];
$movie_detail_image_logo = $data_movie_json['backdrop_path']

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    span.tag-movie {
    background: green;
    padding: 4px 10px;
    border-radius: 27px;
    color: white;
    box-shadow: 0 8px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(75 155 25 / 50%);
    margin-right: 6px;
    /* top: 0; */
}

button.btn.btn-outline-warning {
    box-shadow: 0 8px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(255 199 42 / 50%);
    margin-right: 6px;
}

button.btn.btn-outline-danger {
    box-shadow: 0 8px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(237 3 3 / 57%);
}

.col-5.detail-more {
    position: absolute;
    top: 129px;
    width: 34%;
    left: 100px;
    color: white;
    font-family: cursive;
}

.image-logo {
    position: absolute;
    top: -69px;
    left: 106px;
    transform: translate(79%, 92px);
    /* z-index: 9999; */
}

h2.movie-title {
    font-size: xxx-large;
}

p.movie-desc {
    margin-top: 6px;
}

img.movie-detail-image {
    width: 100%;
    height: 750px;
    object-fit: cover;
    filter: brightness(0.5);
}
    </style>
<body>
    <div class="movie-detail">
        <div class="detail-about">
        <img class="movie-detail-image" src='https://image.tmdb.org/t/p/w500/<?php echo $movie_detail_image;?>' class="card-img-top width=200px movie-image"alt="...">
        <div class="col-5 detail-more">
            <h2 class="movie-title"><?php echo $movie_detail_title;?></h2>
            <?php
            error_reporting(0);
            /* create a label for tag*/
            $movie_tag =$data_movie_json['genres'];
            
            for($i=0; $i<count($movie_tag); $i++){
            $movie_tag_tag =$data_movie_json['genres'][$i]['name'];

                echo '<span class="tag-movie">'.$movie_tag_tag.'</span>';

            }
            
            ?>
            <p class="movie-desc"><?php echo $movie_detail_desc;?></p>
            <button type="button" class="btn btn-outline-warning">Watch</button>
            <button type="button" class="btn btn-outline-danger">+Add To Wishlist</button>
            <div class="image-logo">
            <img class="movie-detail-logo" src='https://image.tmdb.org/t/p/w500/<?php echo $movie_detail_image_logo;?>' class="card-img-top width=200px movie-image"alt="...">
            </div>
        </div>
        </div>
    </div>
</body>
</html>
