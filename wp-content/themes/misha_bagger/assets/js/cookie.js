    document.addEventListener('DOMContentLoaded', function() {
        const cookieNotice = document.getElementById('cookie-notice');
        const cookieAccept = document.getElementById('cookie-accept');

        if (!localStorage.getItem('cookie_accept')) {
            cookieNotice.classList.remove('pointer-events-none', 'hidden', 'translate-y-10', 'opacity-0');
            cookieNotice.classList.add('translate-y-0', 'opacity-100');
        }

        cookieAccept.addEventListener('click', function() {
            localStorage.setItem('cookie_accept', 'true');
            cookieNotice.classList.add('hidden', 'translate-y-10', 'opacity-0', 'pointer-events-none');
        });
    });