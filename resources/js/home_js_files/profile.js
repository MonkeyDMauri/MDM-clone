
function _(element) {
    return document.querySelector(element);
}





///////////////////////////////////////
// CODE TO MAKE EDIT PROFILE FORM POPUP SHOW UP.
///////////////////////////////////////

// edit profile button in profile page section.
const editBtn = _('.edit-profile-btn');
// event listener for when this button is clicked.
editBtn.addEventListener('click', toggleEditProfileForm);

// cancel button in popup.
const editProfileFormCancelBtn = _('.edit-profile-form-cancel-btn');
// event listener for when this button is clicked.
editProfileFormCancelBtn.addEventListener('click', toggleEditProfileForm);

function toggleEditProfileForm() {
    // grabbing pop up element to edit profile information.
    const editProfilePopupWrapperElement = _('.edit-profile-popup-wrapper');
    editProfilePopupWrapperElement.classList.toggle('show');
}


// checking for when the "ok" is clicked whenever the error popup is showing.
document.addEventListener('click', e => {
    if (e.target.matches('.edit-profile-errors-ok-btn')) {
        toggleEditProfileErrorPopup();
    }
});

function toggleEditProfileErrorPopup() {
    const editProfileErrorsPopup = document.querySelector('.edit-profile-errors-popup-wrapper');
    editProfileErrorsPopup.classList.toggle('show');
}

///////////////////////////////////////
// CODE TO MAKE POST FORM POPUP SHOW UP.
///////////////////////////////////////


// post button element.
const postBtn = _('.post-btn-flex');
// cancel post button
const cancelPost = _('.post-cancel-btn');

// checking if post button is clicked. If it is, then the "togglePostFormPopup" function is called.
postBtn.addEventListener('click', togglePostFormPopup);

// if the form popup is already showing, this checks if user clickes on cancel button, which closes the popup.
cancelPost.addEventListener('click', togglePostFormPopup);


// function to add/remove "show" class from the post popup wrapper classList.
function togglePostFormPopup() {

    console.log('post btn clicked');
    // post popup wrapper element.
    const postFormPopup = _('.post-form-popup-wrapper');

    postFormPopup.classList.toggle('show');
}

////////////////////////////////////////////////////////////
// CODE TO GET CURRENT USER'S POSTS AND THEN DISPLAY THEM.


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
            displayPosts(data.posts);
        } else {
            console.log(data.errorMessage);
        }
        
    })
    .catch(error => {
        console.error(error);
    });
 };

getPostForCurrentUserOnly();



function displayPosts (posts) {
    console.log('displayPost function called');
    // Grabbing element containing all posts.
    const postsContainer = _('.posts-section');

    // Clearing element containing all posts.
    postsContainer.innerHTML =  ``;

    // username or current logged in user.
    const usernameElement = _('meta[name="current-loggedIn-username"]');
    const username = usernameElement ? usernameElement.getAttribute('content') : null;

    console.log('element:', usernameElement);

    // email or current logged in user.
    const emailElement = _('meta[name="current-loggedIn-email"]');
    const email = emailElement ? emailElement.getAttribute('content') : null;

    // for each posts, a new element is created and this element contains each information for each post.
    posts.forEach(post => {

        // new post container element
        const postCard = document.createElement('div');
        postCard.classList.add('post-card');

        // populating post container
        postCard.innerHTML = `
            <div class="" style="display: flex; gap: .5rem; align-items: center;">
                <p class="post-username">  ${username}</p>
                <p class="post-email">${email}</p>

            </div>

            <p class="post-title">${post.title}</p>

            <p class="post-description">${post.description}</p>

            <div class="post-footer">
                <div class="post-action-buttons" style="display: flex; gap: .5rem;">
                    <img src="images/default-images/like_btn.png" alt="like button image" class="like-btn-img">
                    <img src="images/default-images/dislike_btn.png" alt="like button image" class="dislike-btn-img">
                    <img src="images/default-images/share_btn.png" alt="like button image" class="share-btn-img">
                </div>

                <div class="post-stats" style="display: flex; gap: .5rem;">
                    <p>likes ${post.likes}</p>
                    <p>dislikes ${post.dislikes}</p>
                    <p>shared ${post.times_shared}</p>
                </div>

            </div>    
        `;
        
        // inserting post container element into element containing all posts.
        postsContainer.appendChild(postCard);
    });

}