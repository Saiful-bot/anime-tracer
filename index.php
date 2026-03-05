<!DOCTYPE html>
<html>
<head>

<title>Anime Scene Finder</title>

<link rel="stylesheet" href="assets/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="main">

<h1>Anime Scene Finder</h1>

<p>Find which anime scene your image comes from</p>

<input id="url" placeholder="Paste image URL">
<h3>or</h3>
<div class="drop" id="drop">

Drop Image Here

<input type="file" id="file">

</div>

<button onclick="search()">Search</button>

<div id="loading">Searching...</div>

<div id="results"></div>


<footer>

<h4>Github: bayazid-bit</h4>

</footer>
</body>
</div>

<script src="assets/app.js"></script>


</html>
