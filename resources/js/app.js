import './bootstrap';

function _(element) {
    return document.querySelector(element);
}

if (_('body.login-page')) {
    import('../css/signin_login_css/login.css');
}

if (_('body.forgot-password-page')) {
    import('../css/forgot-password-styling/fp.css');
}

if (_('body.home-page')) {
    import('../css/home-styling/home.css');
}
