<?php

$fullDomain = strtolower($_SERVER['HTTP_HOST'] ?? '');
$fullDomain = explode(':', $fullDomain)[0];

$parts = explode('.', $fullDomain);
$domainSlug = count($parts) >= 2
        ? $parts[count($parts) - 2]
        : $fullDomain;

$domainTitle = ucwords(str_replace('-', ' ', $domainSlug));

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $domainTitle ?> — Практики ИИ для каждого</title>
    
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%232D1B69'/><circle cx='50' cy='50' r='25' fill='%23F0F312'/></svg>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;800&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <canvas id="bg-canvas"></canvas>

    <header class="header" data-aos="fade-down">
        <div class="container header__container">
            <a href="./#hero" class="logo">
                <span class="logo__icon"></span>
                <span class="logo__text"><?= $domainTitle ?></span>
            </a>
            
            <nav class="nav">
                <ul class="nav__list">
                    <li><a href="./#hero" class="nav__link">Главная</a></li>
                    <li><a href="./#possibilities" class="nav__link">Возможности</a></li>
                    <li><a href="./#tools" class="nav__link">Инструменты</a></li>
                    <li><a href="./#training" class="nav__link">Обучение</a></li>
                    <li><a href="./#benefits" class="nav__link">Выгода</a></li>
                </ul>
            </nav>

            <a href="./#contact" class="btn btn--primary header__cta">
                <span>Связаться</span>
                <i data-lucide="arrow-up-right"></i>
            </a>

            <button class="burger" aria-label="Menu">
                <span></span>
            </button>
        </div>
    </header>
    <main class="legal-page">
    <section class="pages">
        <div class="container">
            <span class="section-tag">Privacy Policy</span>
            <h1>Политика конфиденциальности</h1>

            <div class="legal-content">
                <div class="policy-hero-card" data-aos="fade-up">
                    <p>
                        Политика конфиденциальности распространяется на персональные данные,
                        предоставляемые пользователями <strong><?= $domainTitle ?></strong>, как для доступа к практикам применения ИИ, так и для любых других взаимодействий в электронном
                        формате.
                    </p>
                </div>

                <div class="policy-notice">
                    <p>
                        <strong><?= $domainTitle ?></strong> оставляет за собой право вносить изменения в положения Политики согласно законодательству Франции и ЕС. Обратите внимание, что наши ресурсы могут содержать ссылки на сторонние ИИ-сервисы. Предоставляя свои данные, вы даете полное согласие на их обработку способами, предусмотренными настоящей Политикой.
                    </p>
                </div>

                <h2>Порядок сбора, хранения и уничтожения</h2>
                <div class="storage-info">
                    <div class="storage-item">
                        <i data-lucide="history"></i>
                        <span>Срок хранения до <strong>75 лет</strong></span>
                    </div>
                    <div class="storage-item">
                        <i data-lucide="user-check"></i>
                        <span>Только с вашего согласия</span>
                    </div>
                </div>
                <p>
                    Для предотвращения утечки данных на платформе <strong><?= $domainTitle ?></strong> мы используем современную цифровую инфраструктуру. Уничтожение или блокирование данных осуществляется по запросу пользователя или при достижении целей сбора.
                </p>

                <div class="data-collection-grid">
                    <div class="data-box" data-aos="fade-right">
                        <h3><i data-lucide="cpu"></i> Техническая информация</h3>
                        <ul>
                            <li>IP-адрес и время доступа</li>
                            <li>Источники перехода на <strong><?= $fullDomain ?></strong></li>
                            <li>Данные браузера и аналитика просмотров</li>
                        </ul>
                    </div>
                    <div class="data-box" data-aos="fade-left">
                        <h3><i data-lucide="contact"></i> Персонализация</h3>
                        <ul>
                            <li>Имя пользователя</li>
                            <li>E-mail и номер телефона</li>
                            <li>Данные об используемых инструментах</li>
                        </ul>
                    </div>
                </div>

                <h2>Цели обработки персональных данных</h2>
                <ul class="legal-list">
                    <li>Предоставление доступа к инновационной платформе обучения ИИ.</li>
                    <li>Учет пожеланий при разработке новых AI-решений.</li>
                    <li>Информирование об обновлениях технологий и материалах блога.</li>
                    <li>Обеспечение качественной экспертной поддержки.</li>
                </ul>

                <h2>Использование Cookies</h2>
                <p>
                    Файлы cookie позволяют нам анализировать трафик и сохранять ваши предпочтения (например, настройки региона Франция), чтобы сделать использование <strong><?= $fullDomain ?></strong> удобнее. Вы можете в любой момент отключить их в настройках браузера.
                </p>

                <div class="rights-block">
                    <h2>Ваши права</h2>
                    <p>
                        Если вы хотите отредактировать свои данные или прекратить их обработку в нашей системе, свяжитесь с командой <strong><?= $domainTitle ?></strong>:
                    </p>
                    <a href="mailto:hello@<?= $fullDomain ?>" class="contact-btn">hello@<?= $fullDomain ?></a>
                </div>
            </div>
        </div>
    </section>
</main>


    <footer class="footer">
        <div class="container footer__grid">
            <div class="footer__col footer__col--brand">
                <a href="./#hero" class="logo logo--footer">
                    <span class="logo__icon"></span>
                    <span class="logo__text"><?= $domainTitle ?></span>
                </a>
                <p class="footer__description">
                    Инновационные технологии, которые работают на вас. Мы делаем ИИ доступным инструментом для повседневных задач и роста.
                </p>
            </div>

            <div class="footer__col">
                <h4 class="footer__title">Навигация</h4>
                <ul class="footer__links">
                    <li><a href="./#hero">Главная</a></li>
                    <li><a href="./#possibilities">Возможности</a></li>
                    <li><a href="./#tools">Инструменты</a></li>
                    <li><a href="./#training">Обучение</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h4 class="footer__title">Документы</h4>
                <ul class="footer__links">
                    <li><a href="./privacy.php">Privacy Policy</a></li>
                    <li><a href="./cookies.php">Cookie Policy</a></li>
                    <li><a href="./terms.php">Terms of Service</a></li>
                    <li><a href="./return.php">Return Policy</a></li>
                    <li><a href="./disclaimer.php">Disclaimer</a></li>
                    <li><a href="./contact.php">Contact Us</a></li>
                    <li><a href="./personal-data-policy.php">Data Policy</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h4 class="footer__title">Контакты</h4>
                <ul class="footer__contact-info">
                    <li>
                        <i data-lucide="phone"></i>
                        <a href="tel:+33189480386">+33 1 89 48 03 86</a>
                    </li>
                    <li>
                        <i data-lucide="mail"></i>
                        <a href="mailto:hello@<?= $fullDomain ?>">hello@<?= $fullDomain ?></a>
                    </li>
                    <li>
                        <i data-lucide="map-pin"></i>
                        <span>12 Rue de Rivoli, 75004 Paris, France</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="container footer__bottom">
            <p>&copy; <?= date('Y') ?> <?= $domainTitle ?>. Все права защищены. Предложение активно в странах ЕС.</p>
        </div>
    </footer>
    <div class="mobile-menu">
        <div class="mobile-menu__content">
            <nav class="mobile-nav">
                <a href="./#hero" class="mobile-nav__link">Главная</a>
                <a href="./#possibilities" class="mobile-nav__link">Возможности</a>
                <a href="./#tools" class="mobile-nav__link">Инструменты</a>
                <a href="./#training" class="mobile-nav__link">Обучение</a>
                <a href="./#benefits" class="mobile-nav__link">Выгода</a>
                <a href="./#contact" class="btn btn--primary">Связаться</a>
            </nav>
        </div>
    </div>
    
    <div id="cookie-popup" class="cookie-popup">
        <div class="cookie-popup__content">
            <p>Этот сайт использует cookies для улучшения работы. Подробнее — в нашей <a href="./cookies.php">Cookie политике</a>.</p>
            <button id="accept-cookies" class="btn btn--primary">Принять</button>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="script.js"></script>
</body>
</html>