document.addEventListener('DOMContentLoaded', function() {
    const burger = document.getElementById('burger-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('burger-icon-open');
    const iconClose = document.getElementById('burger-icon-close');
    let isOpen = false;

    if (burger && mobileMenu) {
        burger.addEventListener('click', function() {
            isOpen = !isOpen;
            
            // Показываем/скрываем мобильное меню
            if (isOpen) {
                mobileMenu.classList.remove('hidden');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
        });

        // Закрываем меню при клике на ссылку (опционально)
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                isOpen = false;
            });
        });

        // Закрываем меню при клике вне его (опционально)
        document.addEventListener('click', function(event) {
            const isClickInside = burger.contains(event.target) || mobileMenu.contains(event.target);
            if (!isClickInside && isOpen) {
                mobileMenu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                isOpen = false;
            }
        });
    }
});