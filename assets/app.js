function search(){

let url=document.getElementById("url").value
let file=document.getElementById("file").files[0]

let form=new FormData()

if(url) form.append("url",url)
if(file) form.append("image",file)

document.getElementById("loading").style.display="block"

fetch("search.php",{method:"POST",body:form})

.then(r=>r.json())

.then(data=>{

document.getElementById("loading").style.display="none"

let html=""

if(data.result){

data.result.forEach(r=>{

let title=r.anilist.title.english||
r.anilist.title.romaji||
r.anilist.title.native

let sim=(r.similarity*100).toFixed(2)

html+=`

<div class="card">

<h3>${title}</h3>

Similarity : ${sim}% <br>

Episode : ${r.episode}

<br><br>

<img src="${r.image}" width="300">

<br>

<video controls width="300">
<source src="${r.video}">
</video>

</div>

`

})

}

document.getElementById("results").innerHTML=html

})

}
