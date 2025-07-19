import './bootstrap';

function _(element) {
    return document.querySelector(element);
}

if (_('body.login-page')) {
    import('../css/signin_login_css/login.css');
}
