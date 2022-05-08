const lightbox = document.createElement('div');
lightbox.id = 'lightbox';
document.body.appendChild(lightbox);

const commentbox = document.createElement('div');
commentbox.id = 'commentbox';
document.body.appendChild(commentbox);

const userPic = document.getElementById('userpic');
const descriptionArea = document.querySelector('.description');
const deleteButton = document.getElementById('btndelete');
const commentArea = document.getElementById('commentid');
const commentSend = document.getElementById('commentsend');
const searchUser = document.getElementById('search');
const searchTextbox = document.getElementById('searchuser');
let picid = 0;
let co = 0;

const images = document.querySelectorAll('img');
images.forEach(image => {
    image.addEventListener('click', e => {
        lightbox.classList.add('active');
        document.querySelector('.pageload__contents').style.display='grid';
        const model = document.querySelector('.pageload__contents');
        const img = document.createElement('img');
        img.src = image.src;
        picid = image.alt;
        descriptionArea.innerHTML="";
        $.ajax({
            type: "GET",
            url: Laravel.base_url + '/auth/user_id/'+ picid,
            crossDomain: true,
            dataType: "json",
            cache: false,
            data: {},
            success: function (response) {
                userPic.setAttribute('src', response.image);
                descriptionArea.innerHTML='<h2>' + response.name + '</h2><h4>' + response.description + '</h4>';
            }
        });
        while (lightbox.firstChild){
            lightbox.removeChild(lightbox.firstChild);
        }
        lightbox.append(model,img);
    })
})

commentArea.addEventListener('click', function () {
    if(co%2==0){
        commentbox.innerHTML = '';
        let data = '';
        co++;
        $.ajax({
            type: "GET",
            url: Laravel.base_url + '/auth/showcomments/'+ picid,
            crossDomain: true,
            dataType: "json",
            cache: false,
            data: {},
            success: function (response) {
                commentbox.innerHTML = response.data;
            }
        });
        return commentbox.classList.add('active');
    }
    else  {
        co++;
        return commentbox.classList.remove('active');
    }
})

searchUser.addEventListener('click', function () {
    if(searchTextbox.style.display == 'none')
    {
        searchTextbox.style.display = '';
    }
    else
    {
        searchTextbox.style.display = 'none';
    }
})

commentSend.addEventListener('click', function () {
    let pic_id = picid;
    let text = commentArea.value;
    $.ajax({
        method: "GET",
        url: Laravel.base_url + '/auth/addcoment/',
        dataType: "json",
        cache: false,
        data: {pic: pic_id, text: text},
        success: function (response) {
            commentbox.innerHTML = response.data;
            commentArea.value="";
        }
    });
})

lightbox.addEventListener('click', e => {
    if(e.target == e.currentTarget)
    {
        co=0;
        commentbox.classList.remove('active');
        return lightbox.classList.remove('active');
    }
})
