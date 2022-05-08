var ourRequest = new XMLHttpRequest();
var petsContainer = document.getElementById('pets-container');
ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/pets-data.json');
ourRequest.onload = function() {
        var ourData = JSON.parse(ourRequest.responseText);
        createHTML(ourData);
        console.log(ourData);
};

ourRequest.send();

function  createHTML(data){
    var htmlString = '';
    for( i=0; i<data.pets.length; i++)
    {
        htmlString += '<div class="pet"><div class="photo-column"><img src="' + data.pets[i].photo +
            '"></div><div class="info-column"><h2>' + data.pets[i].name + ' <span class="species">' +
            data.pets[i].species + '</span></h2><p>Birth Year: ' + data.pets[i].birthYear + '</p>';
        if(typeof data.pets[i].favFoods !== 'undefined'){
            htmlString += '<h4 class="headline-bar">Favorite Foods</h4><ul class="favorite-foods">';
            for ( ii=0; ii<data.pets[i].favFoods.length; ii++){
                htmlString += '<li>' + data.pets[i].favFoods[ii] + '</li>';
            }
            htmlString += '</ul>';
        }
        htmlString += '</div></div>';
    }

    petsContainer.insertAdjacentHTML('beforeend', htmlString);
}

var pageCounter = 1;
var animalContainer = document.getElementById('animal-container');
var btn = document.getElementById('fetch3animals');

btn.addEventListener('click', function (){
    var ourRequest2 = new XMLHttpRequest();
    ourRequest2.open('GET', 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
    ourRequest2.onload = function () {
            var ourData2 = JSON.parse(ourRequest2.responseText);
            renderHTML(ourData2);
    };
    ourRequest2.send();
    pageCounter++;
    if (pageCounter > 3)
    {
        btn.classList.add('hide-me');
    }
});

 function renderHTML(data){
     var htmlString = '';

     for( i=0; i<data.length; i++)
     {
         htmlString += '<p>' + data[i].name + ' is a ' + data[i].species + ' and it likes ';
         for( j=0; j<data[i].foods.likes.length; j++)
         if(data[i].foods.likes.length==0) {
             htmlString += data[i].foods.likes[j];
         }else {
             htmlString += ' and ' + data[i].foods.likes[j];
         }

         htmlString += ' aand it dislikes ';

         for( j=0; j<data[i].foods.dislikes.length; j++)
             if(data[i].foods.dislikes.length==0) {
                 htmlString += data[i].foods.dislikes[j];
             }else {
                 htmlString += ' and ' + data[i].foods.dislikes[j];
             }
            htmlString += '.</p><hr>';
     }
     htmlString +='<br>';

     animalContainer.insertAdjacentHTML('beforeend', htmlString);
 }

