import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css';

// 1. Import library Lottie
import lottie from 'lottie-web';

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
    });

    // 2. Muat animasi Lottie khusus untuk halaman login
    const lottieLoginContainer = document.querySelector('#lottie-login-container');
    if (lottieLoginContainer) {
        lottie.loadAnimation({
            container: lottieLoginContainer,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/images/Home.json' // Path ke file animasi login Anda
        });
    }
});