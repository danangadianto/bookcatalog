let keyword = document.getElementById('keyword');
let searchButton = document.getElementById('search-button');
let container = document.getElementById('container');

// add event
keyword.addEventListener('keyup', function() {
    // create ajax object
    let xhr = new XMLHttpRequest();

    // check ready status
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
        
            container.innerHTML = xhr.responseText;

        }
    }

    // execute the ajax
    xhr.open('GET', '../ajax/books.php?keyword=' + keyword.value, true);
    xhr.send();


} );

// $(document).ready(function() {

//     // create event
//     $(#keyword).on('keyup', function() {
//         $(#container).load('../ajax/seiyuu.php?keyword=' + $(#keyword).val());
//     })

// });