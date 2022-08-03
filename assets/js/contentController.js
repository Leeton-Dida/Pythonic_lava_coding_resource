
// //function to update the weekHeading of the content page
// function updateContent (weekHeading, taskHeading) {
//         var weekHeading = document.getElementById("weekHeading");
//     weekHeading.innerHTML = weekHeading + ": " + taskHeading;
// }


// //function to update the weekHeading of the content page
// function updateContent ( ) {
//         var weekHeading = document.getElementById("weekHeading");
//     weekHeading.innerHTML = "weekHeading" ;
// }

//onclick listener radio buttons to update the weekHeading of the content page
function updateContent ( $title ) {
        var weekHeading = document.getElementById("weekHeading");
    weekHeading.innerHTML = $title ;
}

//store session data in local storage
function storeSessionData ( ) {
}
