
// COMMONLY USED FUNCTION.
function _(element) {
    return document.querySelector(element);
}

let currentSection = 'home';



// CODE TO GET POSTS AND THEN DISPLAY THEM

function get_posts() {
    fetch('/get-posts')
    .then(res => {
        if (!res.ok) {
            throw new Error('Bad response when trying to get posts:', res.status);
        } else {
            return res.json();
        }
    })
    .then(data => {
        if(data.success) {
            console.log('posts were returned');
        }
    })
    .catch(err => console.log(err));
}

get_posts();