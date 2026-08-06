document.addEventListener('DOMContentLoaded', function() {
    const modalOverlay = document.getElementById('modal-overlay');
    const modalContent = modalOverlay.querySelector('.bg-white');
    const modalClose = document.getElementById('modal-close');
    const openBtns = document.querySelectorAll('.open-modal');

    function openModal() {
        modalOverlay.classList.remove('opacity-0', 'invisible');
        modalOverlay.classList.add('opacity-100', 'visible');
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modalOverlay.classList.remove('opacity-100', 'visible');
        modalOverlay.classList.add('opacity-0', 'invisible');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        document.body.style.overflow = '';
    }

    openBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            openModal();
        });
    });

    modalClose.addEventListener('click', closeModal);

    modalOverlay.addEventListener('click', function(e) {
        if (e.target === modalOverlay) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalOverlay.classList.contains('opacity-100')) {
            closeModal();
        }
    });

    document.addEventListener('wpcf7mailsent', function() {
        setTimeout(closeModal, 2500);
    });
});