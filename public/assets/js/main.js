/* Mo Soluciones Web — interacciones */
(() => {
    'use strict';

    document.documentElement.classList.add('js');

    /* ---------- Header con fondo al hacer scroll ---------- */
    const header = document.querySelector('[data-header]');
    const onScroll = () => header?.classList.toggle('is-scrolled', window.scrollY > 10);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    /* ---------- Menú mobile ---------- */
    const toggle = document.querySelector('[data-nav-toggle]');
    const nav = document.querySelector('[data-nav]');

    const setMenu = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        toggle.querySelector('.sr-only').textContent = open ? 'Cerrar menú' : 'Abrir menú';
        nav.classList.toggle('is-open', open);
    };

    if (toggle && nav) {
        toggle.addEventListener('click', () => setMenu(toggle.getAttribute('aria-expanded') !== 'true'));
        nav.addEventListener('click', (e) => { if (e.target.closest('a')) setMenu(false); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') setMenu(false); });
        window.matchMedia('(min-width: 901px)').addEventListener('change', (e) => { if (e.matches) setMenu(false); });
    }

    /* ---------- Aparición de elementos al hacer scroll ---------- */
    const reveals = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        // Pequeño escalonado entre elementos hermanos.
        reveals.forEach((el) => {
            const siblings = [...el.parentElement.children].filter((c) => c.classList.contains('reveal'));
            el.style.transitionDelay = `${Math.min(siblings.indexOf(el), 5) * 70}ms`;
            io.observe(el);
        });
    } else {
        reveals.forEach((el) => el.classList.add('is-visible'));
    }

    /* ---------- Contadores animados (página Nosotros) ---------- */
    const counters = document.querySelectorAll('[data-count]');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (counters.length && 'IntersectionObserver' in window && !reduceMotion) {
        const animate = (el) => {
            const target = Number(el.dataset.count);
            const start = performance.now();
            const duration = 1400;
            const step = (now) => {
                const p = Math.min((now - start) / duration, 1);
                el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3)));
                if (p < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        };
        const co = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                animate(entry.target);
                co.unobserve(entry.target);
            });
        }, { threshold: 0.6 });
        counters.forEach((el) => co.observe(el));
    }

    /* ---------- Filtros del portfolio ---------- */
    const filters = document.querySelector('[data-filters]');
    const projects = document.querySelectorAll('[data-projects] .project-card');
    filters?.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-filter]');
        if (!btn) return;
        const value = btn.dataset.filter;

        filters.querySelectorAll('[data-filter]').forEach((b) => {
            const active = b === btn;
            b.classList.toggle('is-active', active);
            b.setAttribute('aria-pressed', String(active));
        });

        projects.forEach((card) => {
            const show = value === 'all' || card.dataset.category === value;
            card.classList.toggle('is-hidden', !show);
            if (show) card.classList.add('is-visible');
        });
    });

    /* ---------- Formulario de contacto ---------- */
    const form = document.querySelector('[data-contact-form]');
    if (form) {
        const messages = {
            name: 'Ingresá tu nombre.',
            email: 'Ingresá un email válido.',
            service: 'Elegí un servicio.',
            message: 'Contame un poco más sobre tu proyecto (mínimo 10 caracteres).',
        };

        const showError = (field, text) => {
            const id = `${field.name}-error`;
            let error = document.getElementById(id);
            if (!text) {
                error?.remove();
                field.removeAttribute('aria-invalid');
                field.removeAttribute('aria-describedby');
                return;
            }
            if (!error) {
                error = document.createElement('span');
                error.className = 'field-error';
                error.id = id;
                field.insertAdjacentElement('afterend', error);
            }
            error.textContent = text;
            field.setAttribute('aria-invalid', 'true');
            field.setAttribute('aria-describedby', id);
        };

        const validate = (field) => {
            if (!(field.name in messages)) return true;
            const ok = field.checkValidity() && field.value.trim().length >= (field.name === 'message' ? 10 : 1);
            showError(field, ok ? '' : messages[field.name]);
            return ok;
        };

        form.addEventListener('blur', (e) => { if (e.target.matches('input, select, textarea')) validate(e.target); }, true);
        form.addEventListener('input', (e) => { if (e.target.getAttribute('aria-invalid')) validate(e.target); });

        form.addEventListener('submit', (e) => {
            const fields = [...form.querySelectorAll('input[required], select[required], textarea[required]')];
            const invalid = fields.filter((f) => !validate(f));
            if (invalid.length) {
                e.preventDefault();
                invalid[0].focus();
                return;
            }
            const btn = form.querySelector('[type="submit"]');
            btn.classList.add('is-loading');
            btn.firstChild.textContent = 'Enviando… ';
        });
    }
})();
