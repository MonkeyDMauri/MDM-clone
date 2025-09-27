
function _(element) {
    return document.querySelector(element);
}


// Function to get all posts for the current logged in user so they can be displayed in their profile page.

function getPostForCurrentUserOnly ()
 {
    fetch('/get-my-posts')
    .then(res => {
        if (!res.ok) {
            throw new Error(`Network response was not ok: ${res.status}`);
        } else {
            return res.json();
        }
    })
    .then(data => {
        if (data.success) {
            console.log('Posts:', data.posts);
        } else {
            console.log(data.errorMessage);
        }
        
    })
    .catch(error => {
        console.error(error);
    });
 };

getPostForCurrentUserOnly();

