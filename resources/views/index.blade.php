<!DOCTYPE html>
<html lang="ar" dir="rtl" class="dark">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mohammed Sadeq Zuhair - Portfolio</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>


<body class="dark:bg-gradient-to-b dark:from-black dark:via-gray-900 dark:to-black min-h-screen flex flex-col text-yellow-400 font-sans transition-colors duration-300">

    <header class="flex justify-between items-center p-6 bg-black/50 backdrop-blur-md">
        <nav class="flex items-center space-x-6">
          <a href="#home" class="nav-link" data-translate="home">الرئيسية</a>
          <a href="#projects" class="nav-link" data-translate="projects">المشاريع</a>
          <a href="#contact" class="nav-link" data-translate="contact">التواصل</a>
        </nav>

        <div class="flex items-center gap-4">
          <button id="themeToggle" class="control-btn">
            <i class="fas fa-moon"></i>
          </button>
          <button onclick="toggleLanguage()" id="langButton" class="control-btn">
            <span data-translate="en">EN</span> | <span data-translate="ar">AR</span>
          </button>
        </div>
      </header>
   

  <main class="flex-grow container mx-auto px-4 py-12">

    <section id="home" class="text-center mb-24" data-aos="zoom-in">
      <h1 class="text-6xl font-bold mb-6 glow-text">
        محمد صادق زهير
      </h1>
      <div class="animated-orb"></div>

      <div id="typedText" class="text-2xl text-gray-300 my-8 h-16"></div>

      <div class="max-w-3xl mx-auto text-lg text-gray-400">
        <p class="mb-4" data-translate="aboutText">
          مطور برمجيات عراقي شغوف بالتكنولوجيا، أتمتع بخبرة في تطوير الويب وحلول البرمجيات المبتكرة.
          أؤمن بقوة البرمجة في تغيير العالم، وأسعى دائمًا لتعلم التقنيات الحديثة.
        </p>
        <p class="text-yellow-500 font-semibold" data-translate="passion">
          🖥️ أحب البرمجة والإبداع التكنولوجي
        </p>
      </div>

      <div class="mt-12 flex justify-center gap-6">
        <a href="tel:+9647800873450" class="contact-btn">
          <i class="fas fa-phone mr-2"></i><span data-translate="call">اتصل بي الآن</span>
        </a>
        <a href="#contact" class="contact-btn">
          <i class="fas fa-envelope mr-2"></i><span data-translate="message">راسلني</span>
        </a>
      </div>
    </section>
<!-- START Projects Section -->
<section id="projects" class="py-20 bg-black/20" data-aos="fade-up" aria-labelledby="projects-heading">
    <div class="container mx-auto px-4">
      <header class="text-center mb-16">
        <h2 id="projects-heading" class="text-4xl font-bold text-yellow-400 mb-4" data-translate="featuredProjects">مشاريعي المميزة</h2>
        <p class="text-gray-400 max-w-2xl mx-auto" data-translate="projectsSub">تصميمات مبتكرة وحلول برمجية ذكية تلبيةً لاحتياجات العصر الرقمي</p>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <!-- Project 1 -->
        <article class="project-card group bg-gray-900 rounded-2xl p-6 hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-yellow-400/20">
          <div class="flex items-start mb-6">
            <div class="w-12 h-12 bg-yellow-400/10 rounded-xl flex items-center justify-center mr-4">
              <i class="fas fa-coins text-2xl text-yellow-400"></i>
            </div>
            <div class="flex-1">
              <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-gray-500 text-sm" data-translate="statusActive">مُفعّل</span>
              </div>
            </div>
          </div>

          <h3 class="text-2xl font-bold mb-3" data-translate="project1Title">منصة العملات الرقمية</h3>
          <p class="text-gray-400 mb-5 leading-relaxed" data-translate="project1Desc">
            نظام مبني بـ Laravel لمراقبة وتحليل أسعار العملات الرقمية باستخدام واجهات API.
          </p>

          <div class="flex flex-wrap gap-2 mb-6">
            <span class="tech-badge">PHP</span>
            <span class="tech-badge">Laravel</span>
            <span class="tech-badge">Tailwind CSS</span>
            <span class="tech-badge">API</span>
          </div>

          <a href="/convert" class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 transition-colors font-medium">
            <span data-translate="viewDetails">عرض التفاصيل</span>
            <i class="fas fa-arrow-left text-sm"></i>
          </a>
        </article>

        <!-- Project 2 -->
        <article class="project-card group bg-gray-900 rounded-2xl p-6 hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-yellow-400/20">
          <div class="flex items-start mb-6">
            <div class="w-12 h-12 bg-yellow-400/10 rounded-xl flex items-center justify-center mr-4">
              <i class="fas fa-tasks text-2xl text-yellow-400"></i>
            </div>
            <div class="flex-1">
              <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="text-gray-500 text-sm" data-translate="statusInDevelopment">قيد البرمجة</span>
              </div>
            </div>
          </div>

          <h3 class="text-2xl font-bold mb-3" data-translate="project2Title">نظام إدارة المهام</h3>
          <p class="text-gray-400 mb-5 leading-relaxed" data-translate="project2Desc">
            نظام إدارة مهام مبني بـ Laravel وواجهة أنيقة باستخدام Tailwind CSS.
          </p>

          <div class="flex flex-wrap gap-2 mb-6">
            <span class="tech-badge">PHP</span>
            <span class="tech-badge">Laravel</span>
            <span class="tech-badge">Tailwind CSS</span>
          </div>

          <a href="/com" class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 transition-colors font-medium">
            <span data-translate="viewDetails">عرض التفاصيل</span>
            <i class="fas fa-arrow-left text-sm"></i>
          </a>
        </article>

        <!-- Project 3 -->
        <article class="project-card group bg-gray-900 rounded-2xl p-6 hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-yellow-400/20">
          <div class="flex items-start mb-6">
            <div class="w-12 h-12 bg-yellow-400/10 rounded-xl flex items-center justify-center mr-4">
              <i class="fas fa-shopping-cart text-2xl text-yellow-400"></i>
            </div>
            <div class="flex-1">
              <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-gray-500 rounded-full animate-pulse"></div>
                <span class="text-gray-500 text-sm" data-translate="statusInactive">غير مُفعّل</span>
              </div>
            </div>
          </div>

          <h3 class="text-2xl font-bold mb-3" data-translate="project3Title">متجر إلكتروني</h3>
          <p class="text-gray-400 mb-5 leading-relaxed" data-translate="project3Desc">
            منصة بيع إلكتروني تمهيداً للتنفيذ باستخدام Laravel و Tailwind CSS.
          </p>

          <div class="flex flex-wrap gap-2 mb-6">
            <span class="tech-badge">PHP</span>
            <span class="tech-badge">Laravel</span>
            <span class="tech-badge">Tailwind CSS</span>
          </div>

          <a href="/com" class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 transition-colors font-medium">
            <span data-translate="viewDetails">عرض التفاصيل</span>
            <i class="fas fa-arrow-left text-sm"></i>
          </a>
        </article>
      </div>
    </div>
  </section>
  <!-- END Projects Section -->



    <section class="skills-section mb-24" data-aos="fade-up">
        <h2 class="section-title text-center text-3xl font-bold mb-8" data-translate="technicalSkills">
          المهارات التقنية
        </h2>

        <div class="skills-grid grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
          <div class="skill-item group">
            <div class="icon bg-orange-100 text-orange-500 group-hover:bg-orange-500 group-hover:text-white transition p-4 rounded-full">
              <i class="fab fa-html5 text-2xl"></i>
            </div>
            <p class="mt-2 text-center" data-translate="htmlSkill">HTML5 & CSS3 (مبتدئ)</p>
          </div>

          <div class="skill-item group">
            <div class="icon bg-yellow-100 text-yellow-500 group-hover:bg-yellow-500 group-hover:text-white transition p-4 rounded-full">
              <i class="fab fa-js text-2xl"></i>
            </div>
            <p class="mt-2 text-center" data-translate="jsSkill">JavaScript (مبتدئ)</p>
          </div>

          <div class="skill-item group">
            <div class="icon bg-blue-100 text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition p-4 rounded-full">
              <i class="fab fa-python text-2xl"></i>
            </div>
            <p class="mt-2 text-center" data-translate="pythonSkill">Python (مبتدئ)</p>
          </div>

          <div class="skill-item group">
            <div class="icon bg-green-100 text-green-500 group-hover:bg-green-500 group-hover:text-white transition p-4 rounded-full">
              <i class="fas fa-microchip text-2xl"></i>
            </div>
            <p class="mt-2 text-center" data-translate="arduinoSkill">Arduino UNO (مبتدئ)</p>
          </div>

          <div class="skill-item group">
            <div class="icon bg-gray-200 text-gray-600 group-hover:bg-gray-600 group-hover:text-white transition p-4 rounded-full">
              <i class="fab fa-git-alt text-2xl"></i>
            </div>
            <p class="mt-2 text-center" data-translate="gitSkill">Git (مبتدئ)</p>
          </div>

          <div class="skill-item group">
            <div class="icon bg-indigo-100 text-indigo-500 group-hover:bg-indigo-500 group-hover:text-white transition p-4 rounded-full">
              <i class="fas fa-database text-2xl"></i>
            </div>
            <p class="mt-2 text-center" data-translate="sqlSkill">SQL Databases (جيد)</p>
          </div>
        </div>
      </section>

    <section id="contact" class="max-w-2xl mx-auto px-4 py-16" data-aos="fade-up" aria-labelledby="contact-heading">
        <article class="bg-gray-800/50 backdrop-blur-md rounded-2xl p-8 shadow-xl border border-yellow-400/20">
            <header class="mb-10 text-center">
                <h2 id="contact-heading" class="text-4xl font-bold mb-2 text-yellow-400" data-translate="contact">التواصل</h2>
                <p class="text-gray-400" data-translate="contactSub">أرسل لي رسالة وسأرد في أسرع وقت ممكن</p>
              </header>
          <form id="contactForm" class="space-y-8" netlify>
            <div class="form-group">
              <label for="fullName" class="block mb-3 text-lg font-medium text-yellow-300" data-translate="fullName">
                الاسم الكامل
              </label>
              <input
                type="text"
                id="fullName"
                name="fullName"
                class="w-full px-6 py-4 bg-gray-900 rounded-xl border border-gray-700 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all placeholder-gray-600"
                required
                data-translate="namePlaceholder"
                placeholder="اسمك الكامل"
              >
            </div>

            <div class="form-group">
              <label for="email" class="block mb-3 text-lg font-medium text-yellow-300" data-translate="email">
                البريد الإلكتروني
              </label>
              <input
                type="email"
                id="email"
                name="email"
                class="w-full px-6 py-4 bg-gray-900 rounded-xl border border-gray-700 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all placeholder-gray-600"
                required
                data-translate="emailPlaceholder"
                placeholder="example@mail.com"
              >
            </div>

            <div class="form-group">
              <label for="message" class="block mb-3 text-lg font-medium text-yellow-300" data-translate="message">
                الرسالة
              </label>
              <textarea
                id="message"
                name="message"
                rows="5"
                class="w-full px-6 py-4 bg-gray-900 rounded-xl border border-gray-700 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all placeholder-gray-600 resize-none"
                required
                data-translate="messagePlaceholder"
                placeholder="رسالتك..."
              ></textarea>
            </div>

            <button
              type="submit"
              class="w-full submit-btn bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-4 px-8 rounded-xl transition-all flex items-center justify-center gap-3 group"
              aria-label="إرسال الرسالة"
            >
              <span class="text-lg" data-translate="sendMessage">إرسال الرسالة</span>
              <i class="fas fa-paper-plane transition-transform group-hover:translate-x-1"></i>
            </button>
          </form>
        </article>
      </section>
  </main>

  <footer class="bg-black/50 backdrop-blur-md py-8" data-aos="fade-up" data-aos-duration="1000">

    <div class="flex justify-center space-x-8 mb-4">
      <a href="https://github.com/gmhamf" target="_blank" class="social-icon">
        <i class="fab fa-github"></i>
      </a>
      <a href="https://www.linkedin.com/in/mohammed-sadeq-zuhair-sadeq-1aa6112b7/" target="_blank" class="social-icon">
        <i class="fab fa-linkedin"></i>
      </a>
    </div>
    <div class="text-center text-gray-500 text-sm">
      <span data-translate="copyright">© 2025 محمد صادق زهير. جميع الحقوق محفوظة.</span> <br>
      📞 +964 780 087 3450 <br>
      ✉️ gmhamf@gmail.com
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

  <script>
    let currentLang = 'ar';
    const translations = {
  ar: {
    contactSub: "أرسل لي رسالة وسأرد في أسرع وقت ممكن",
    home: "الرئيسية",
    projects: "المشاريع",
    contact: "التواصل",
    aboutText: "مطور برمجيات عراقي شغوف بالتكنولوجيا، أتمتع بخبرة في تطوير الويب وحلول البرمجيات المبتكرة. أؤمن بقوة البرمجة في تغيير العالم، وأسعى دائمًا لتعلم التقنيات الحديثة.",
    passion: "🖥️ أحب البرمجة والإبداع التكنولوجي",
    call: "اتصل بي الآن",
    message: "راسلني",
    featuredProjects: "مشاريعي المميزة",
    project1Title: "منصة العملات الرقمية",
    project1Desc: "منصة متكاملة لتتبع أسعار العملات الرقمية بالزمن الحقيقي",
    project1Status: "مُفعّل",
    project2Title: "نظام إدارة المهام",
    project2Desc: "نظام ذكي لإدارة المهام الشخصية والفريقية",
    project2Status: "قيد البرمجة",
    project3Title: "متجر إلكتروني",
    project3Desc: "منصة تسوق إلكتروني بتقنيات حديثة",
    project3Status: "غير مُفعّل",
    viewProject: "عرض المشروع",
    technicalSkills: "المهارات التقنية",
    htmlSkill: "HTML5 & CSS3 (مبتدئ)",
    jsSkill: "JavaScript (مبتدئ)",
    pythonSkill: "Python (مبتدئ)",
    arduinoSkill: "Arduino UNO (مبتدئ)",
    gitSkill: "Git (مبتدئ)",
    sqlSkill: "SQL Databases (جيد)",
    fullName: "الاسم الكامل",
    email: "البريد الإلكتروني",
    message: "الرسالة",
    namePlaceholder: "اسمك الكامل",
    emailPlaceholder: "example@mail.com",
    messagePlaceholder: "رسالتك...",
    sendMessage: "إرسال الرسالة",
    copyright: "© 2025 محمد صادق زهير. جميع الحقوق محفوظة.",
    en: "EN",
    ar: "AR"
  },
  en: {
    contactSub: "Send me a message and I'll respond as soon as possible",
    home: "Home",
    projects: "Projects",
    contact: "Contact",
    aboutText: "Iraqi software developer passionate about technology, experienced in web development and innovative software solutions. I believe in programming's power to change the world and constantly seek to learn modern technologies.",
    passion: "🖥️ I love programming and tech innovation",
    call: "Call Now",
    message: "Message Me",
    featuredProjects: "Featured Projects",
    project1Title: "Crypto Platform",
    project1Desc: "Integrated real-time cryptocurrency tracking platform",
    project1Status: "Active",
    project2Title: "Task Management System",
    project2Desc: "Smart system for personal and team task management",
    project2Status: "In Development",
    project3Title: "E-Commerce Store",
    project3Desc: "Modern e-commerce shopping platform",
    project3Status: "Inactive",
    viewProject: "View Project",
    technicalSkills: "Technical Skills",
    htmlSkill: "HTML5 & CSS3 (Beginner)",
    jsSkill: "JavaScript (Beginner)",
    pythonSkill: "Python (Beginner)",
    arduinoSkill: "Arduino UNO (Beginner)",
    gitSkill: "Git (Beginner)",
    sqlSkill: "SQL Databases (Intermediate)",
    fullName: "Full Name",
    email: "Email Address",
    message: "Message",
    namePlaceholder: "Your full name",
    emailPlaceholder: "example@mail.com",
    messagePlaceholder: "Your message...",
    sendMessage: "Send Message",
    copyright: "© 2025 Mohammed Sadeq. All rights reserved.",
    en: "EN",
    ar: "AR"
  }
};


    document.addEventListener('DOMContentLoaded', () => {
      AOS.init({duration: 1000});
      initTypedJS();
      initTheme();
      setupEventListeners();
      updateContent(currentLang);
    });

    function toggleLanguage() {
      currentLang = currentLang === 'ar' ? 'en' : 'ar';
      document.documentElement.lang = currentLang;
      document.documentElement.dir = currentLang === 'ar' ? 'rtl' : 'ltr';
      updateContent(currentLang);
      initTypedJS();
    }

    function updateContent(lang) {
      document.querySelectorAll('[data-translate]').forEach(el => {
        const key = el.getAttribute('data-translate');
        if (translations[lang][key]) {
          if (el.placeholder) {
            el.placeholder = translations[lang][key];
          } else {
            el.textContent = translations[lang][key];
          }
        }
      });
    }

    function initTheme() {
      const theme = localStorage.getItem('theme') || 'dark';
      document.documentElement.classList.toggle('dark', theme === 'dark');
      document.getElementById('themeToggle').innerHTML =
        theme === 'dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
    }

    function toggleTheme() {
      const isDark = document.documentElement.classList.toggle('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      document.getElementById('themeToggle').innerHTML =
        isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
    }

    // إضافة متغير لتخزين المثيل الحالي
let typedInstance = null;

function initTypedJS() {
  // تدمير المثيل السابق إن وجد
  if (typedInstance) {
    typedInstance.destroy();
  }

  // إعداد النصوص حسب اللغة مع تحسين قابلية الصيانة
  const strings = {
    ar: [
      'مطور برمجيات مبتكر',
      'خبير حلول تكنولوجية',
      'مصمم واجهات تفاعلية'
    ],
    en: [
      'Innovative Software Developer',
      'Tech Solutions Expert',
      'Interactive UI Designer'
    ]
  };

  // إنشاء المثيل الجديد مع إعدادات محسنة
  typedInstance = new Typed('#typedText', {
    strings: strings[currentLang] || strings.en,
    typeSpeed: 40,
    backSpeed: 25,
    loop: true,
    cursorChar: '|',
    smartBackspace: true,
    startDelay: 500,
    backDelay: 1500,
    showCursor: true,
    contentType: 'html'
  });
}

    function setupEventListeners() {
      document.getElementById('themeToggle').addEventListener('click', toggleTheme);
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
          e.preventDefault();
          document.querySelector(anchor.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
          });
        });
      });
    }
  </script>

  <style>
    .glow-text {
      text-shadow: 0 0 20px rgba(255, 235, 59, 0.6);
    }

    .animated-orb {
      @apply w-32 h-32 bg-yellow-500/30 rounded-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2;
      animation: pulse 3s infinite;
    }

    .project-card {
      @apply bg-gray-800 rounded-xl p-6 transition-transform duration-300 hover:scale-105;
    }

    .project-image {
      @apply bg-gray-700 h-48 rounded-lg mb-4 bg-cover bg-center;
    }

    .project-link {
      @apply text-yellow-500 hover:text-yellow-400 transition-colors mt-4 inline-block;
    }

    .skill-item {
      @apply bg-gray-800 px-6 py-3 rounded-full text-center hover:bg-yellow-500 hover:text-black transition-all;
    }

    .contact-btn {
      @apply bg-yellow-500 text-black px-8 py-3 rounded-full font-bold hover:bg-yellow-600 transition-all flex items-center;
    }

    @keyframes pulse {
      0% { transform: translate(-50%, -50%) scale(1); }
      50% { transform: translate(-50%, -50%) scale(1.2); }
      100% { transform: translate(-50%, -50%) scale(1); }
    }
  </style>
</body>
</html>
