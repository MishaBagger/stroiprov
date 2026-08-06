document.addEventListener('DOMContentLoaded', function() {
    
    const nameInput = document.getElementById('your-name');
    const phoneInput = document.getElementById('your-phone');
    const emailInput = document.getElementById('your-email');
    const msgInput = document.getElementById('your-message');

    function sanitize(value) {
        return value
            .replace(/</g, '')           // <
            .replace(/>/g, '')           // >
            .replace(/"/g, '')           // "
            .replace(/'/g, '')           // '
            .replace(/\(/g, '')          // (
            .replace(/\)/g, '')          // )
            .replace(/[\/\\|]/g, '')     // \ | /
            .replace(/%/g, '')           // %
            .replace(/\?/g, '')          // ?
            .replace(/\^/g, '')          // ^
            .replace(/php/g, '')         // php
            .replace(/src/g, '')         // src
            .replace(/script/g, '')      // script
            .replace(/onerror/g, '');    // onerror
    }

    if (nameInput) {
        nameInput.addEventListener('input', function(e) {
            // Заменяет введённое значение, если оно отличается от очищенного
            const sanitized = sanitize(this.value);
            if (this.value !== sanitized) {
                this.value = sanitized;
            }
        });
    }

    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = this.value;
            let sanitized = value.replace(/[^0-9+\-()\s]/g, '');
            if (value !== sanitized) {
                this.value = sanitized;
            }
        });
    }

    if (emailInput) {
        emailInput.addEventListener('input', function(e) {
            const sanitized = sanitize(this.value);
            if (this.value !== sanitized) {
                this.value = sanitized;
            }
        });
    }

    if (msgInput) {
        msgInput.addEventListener('input', function(e) {
            const sanitized = sanitize(this.value);
            if (this.value !== sanitized) {
                this.value = sanitized;
            }
        });
    }
});