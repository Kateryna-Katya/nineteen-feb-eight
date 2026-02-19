/**
 * ПОЛНЫЙ КОД JS: eighteen-feb-eight
 * Функционал: Canvas Background, Three.js Hero, AOS, Mobile Menu, Form Validation, Cookies.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Инициализация иконок Lucide
    lucide.createIcons();

    // 2. Инициализация AOS анимаций
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // 3. ФОН: Canvas Particles (Нейронные связи)
    const canvas = document.getElementById('bg-canvas');
    const ctx = canvas.getContext('2d');
    let particles = [];
    
    function initCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    class Particle {
        constructor() {
            this.reset();
        }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 1;
            this.speedX = (Math.random() - 0.5) * 0.5;
            this.speedY = (Math.random() - 0.5) * 0.5;
            this.alpha = Math.random() * 0.5 + 0.2;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
            if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
        }
        draw() {
            ctx.fillStyle = `rgba(240, 243, 18, ${this.alpha})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    function animateCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        if (particles.length === 0) {
            for (let i = 0; i < 80; i++) particles.push(new Particle());
        }
        particles.forEach(p => {
            p.update();
            p.draw();
        });
        // Линии связей
        for (let a = 0; a < particles.length; a++) {
            for (let b = a; b < particles.length; b++) {
                let dx = particles[a].x - particles[b].x;
                let dy = particles[a].y - particles[b].y;
                let dist = Math.sqrt(dx*dx + dy*dy);
                if (dist < 150) {
                    ctx.strokeStyle = `rgba(45, 27, 105, ${0.1 * (1 - dist/150)})`;
                    ctx.beginPath();
                    ctx.moveTo(particles[a].x, particles[a].y);
                    ctx.lineTo(particles[b].x, particles[b].y);
                    ctx.stroke();
                }
            }
        }
        requestAnimationFrame(animateCanvas);
    }
    initCanvas();
    animateCanvas();
    window.addEventListener('resize', initCanvas);

    // 4. HERO: Three.js 3D Сфера
    const initThreeHero = () => {
        const container = document.getElementById('hero-three-container');
        if (!container) return;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        container.appendChild(renderer.domElement);

        const geometry = new THREE.SphereGeometry(2.2, 45, 45);
        const material = new THREE.PointsMaterial({ color: 0xF0F312, size: 0.015 });
        const sphere = new THREE.Points(geometry, material);
        scene.add(sphere);

        camera.position.z = 5;

        let mx = 0, my = 0;
        window.addEventListener('mousemove', (e) => {
            mx = (e.clientX - window.innerWidth / 2) * 0.0002;
            my = (e.clientY - window.innerHeight / 2) * 0.0002;
        });

        function renderThree() {
            requestAnimationFrame(renderThree);
            sphere.rotation.y += 0.002;
            sphere.rotation.x += (my - sphere.rotation.x) * 0.05;
            sphere.rotation.y += (mx - sphere.rotation.y) * 0.05;
            renderer.render(scene, camera);
        }
        renderThree();
    };
    // Загрузка Three.js динамически
    const tScript = document.createElement('script');
    tScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js';
    tScript.onload = initThreeHero;
    document.head.appendChild(tScript);

    // 5. МОБИЛЬНОЕ МЕНЮ
    const burger = document.querySelector('.burger');
    const mobMenu = document.querySelector('.mobile-menu');
    const mobLinks = document.querySelectorAll('.mobile-nav__link');

    const toggleMenu = () => {
        burger.classList.toggle('active');
        mobMenu.classList.toggle('active');
        document.body.style.overflow = mobMenu.classList.contains('active') ? 'hidden' : '';
    };

    burger.addEventListener('click', toggleMenu);
    mobLinks.forEach(link => link.addEventListener('click', toggleMenu));

    // 6. КОНТАКТНАЯ ФОРМА
    const form = document.getElementById('ai-form');
    const phoneInput = document.getElementById('phone-input');
    const captchaLabel = document.getElementById('captcha-label');
    const captchaInput = document.getElementById('captcha-input');
    let captchaResult;

    // Генерация капчи
    const genCaptcha = () => {
        const a = Math.floor(Math.random() * 10);
        const b = Math.floor(Math.random() * 10);
        captchaResult = a + b;
        captchaLabel.innerText = `${a} + ${b} = `;
    };
    genCaptcha();

    // Валидация телефона (только цифры)
    phoneInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '');
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        if (parseInt(captchaInput.value) !== captchaResult) {
            alert('Ошибка в капче! Попробуйте еще раз.');
            genCaptcha();
            captchaInput.value = '';
            return;
        }

        const btn = form.querySelector('button');
        btn.disabled = true;
        btn.innerText = 'Отправка...';

        // Имитация AJAX
        setTimeout(() => {
            form.reset();
            genCaptcha();
            document.getElementById('form-success').style.display = 'block';
            btn.disabled = false;
            btn.innerHTML = '<span>Запросить доступ</span> <i data-lucide="send"></i>';
            lucide.createIcons();
            
            setTimeout(() => {
                document.getElementById('form-success').style.display = 'none';
            }, 5000);
        }, 1500);
    });

    // 7. КУКИ ПОПАП
    const cookiePopup = document.getElementById('cookie-popup');
    const acceptBtn = document.getElementById('accept-cookies');

    if (!localStorage.getItem('cookies-accepted')) {
        setTimeout(() => cookiePopup.classList.add('show'), 2000);
    }

    acceptBtn.addEventListener('click', () => {
        localStorage.setItem('cookies-accepted', 'true');
        cookiePopup.classList.remove('show');
    });
});