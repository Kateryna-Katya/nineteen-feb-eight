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
            <span class="section-tag">Risk Disclosure</span>
            <div class="legal-header">
                <i data-lucide="alert-triangle" class="warning-icon"></i>
                <h1>Отказ от ответственности</h1>
            </div>

            <div class="legal-content">
                <div class="legal-block">
                    <p>
                        <strong>Общая информация:</strong> Все материалы, статьи и практические руководства по применению ИИ,
                        опубликованные на сайте <strong><?= $domainTitle ?></strong>, носят исключительно
                        информационно-ознакомительный характер. Они не являются персональной рекомендацией,
                        профессиональным юридическим советом или гарантией получения прибыли. 
                        Платформа создана для демонстрации возможностей технологий, которые меняют правила игры.
                    </p>
                </div>

                <div class="legal-block">
                    <p>
                        <strong>Отсутствие гарантий:</strong> Команда <strong><?= $domainTitle ?></strong> не дает никаких гарантий
                        относительно абсолютной точности или актуальности ответов нейросетей, упомянутых в блоге. 
                        Любые кейсы, связанные с пассивным доходом, карьерным ростом или автоматизацией процессов, 
                        являются примерами и не гарантируют аналогичных результатов в будущем. 
                        Ваш успех зависит от индивидуального применения инструментов.
                    </p>
                </div>

                <div class="legal-block">
                    <p>
                        <strong>Ограничение ответственности:</strong> Администрация сайта <strong><?= $fullDomain ?></strong>,
                        ее владельцы и аффилированные лица не несут ответственности за
                        любые прямые или косвенные убытки, возникшие в результате использования ИИ-сервисов, 
                        описанных на ресурсе. Вся ответственность за внедрение методологий и использование 
                        стороннего ПО лежит исключительно на пользователе.
                    </p>
                </div>

                <div class="legal-block risk-warning">
                    <p>
                        <strong>Предупреждение о технологических рисках:</strong> Использование ИИ-инструментов может быть 
                        сопряжено с ошибками алгоритмов («галлюцинациями») или изменениями в политиках доступа сторонних платформ. 
                        Перед принятием важных решений на основе данных от ИИ, мы настоятельно рекомендуем 
                        провести самостоятельную проверку информации.
                    </p>
                </div>

                <div class="legal-block agreement">
                    <p>
                        <strong>Подтверждение пользователя:</strong> Продолжая использовать
                        платформу <strong><?= $domainTitle ?></strong>, вы подтверждаете, что вам исполнилось 18 лет, вы
                        находитесь в юрисдикции, где данные технологии разрешены (включая Францию и другие страны ЕС), 
                        действуете по собственной воле и полностью принимаете условия данного Дисклеймера.
                    </p>
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