<?php

/* Trending Movie Request */
$API_KEY = '47cff2bc9ba543e2c1ea46e263f05d97';

$url_trending_movie = 'https://api.themoviedb.org/3/movie/now_playing?api_key=' . $API_KEY . '&with_genres=27';

$data_trending = file_get_contents($url_trending_movie);

/* Decode json */
$data_trending_json = json_decode($data_trending, true);

/* Dump data */
$json_pretty_1 = json_encode($data_trending, JSON_PRETTY_PRINT);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
label.movie-imdb {
    margin-inline: 4px;
}

.raw {
    display: flex;
    gap: 10px;
}

img.card-img-top.width\=200px.movie-image {
    width: initial;
}

h3.Title-popular {
    text-align: center;
    font-size: xx-large;
    font-family: cursive;
}

.card {
    border: 0px;
}

    </style>
<body>
<div class="container-fluide">
    <h3 class="Title-popular">Horror Movies</h3>
    <div class="raw">
<?php
error_reporting(0);
for ($i = 0; $i < count($data_trending_json); $i++) {

    $movie_image = $data_trending_json['results'][$i]['poster_path'];
    $movie_info = $data_trending_json['results'][$i]['overview'];
    $movie_result = $data_trending_json['results'][$i]['vote_average'];
    $movie_title = $data_trending_json['results'][$i]['title'];
    $movie_id=$data_trending_json['results'][$i]['id'];
    echo '<div class="card">
  <img src=https://image.tmdb.org/t/p/w500/' . $movie_image . ' class="card-img-top width=200px movie-image"alt="...">
  <div class="card-body">
    <h5 class="card-title">' . $movie_title . '</h5>

    <a href="./section/movie_detail.php?id='.$movie_id.'" class="btn btn-outline-warning">Watch Now</a>
    <label class="movie-imdb">'.$movie_result.'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
  <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
</svg></label>

</div>
</div>';
}
?>
</div>
</div>
<br>
<br>

</body>
</html>