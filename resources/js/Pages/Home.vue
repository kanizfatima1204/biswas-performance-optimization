<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowDownRight, ArrowRight, ArrowUpRight, Asterisk, Braces, Check,
    Code2, Database, Gauge, Layers3, Menu, MoveUpRight, Smartphone, X, Zap,
} from 'lucide-vue-next';

const menuOpen = ref(false);
const closeMenu = () => { menuOpen.value = false; };

const capabilities = [
    { id: '01', icon: Code2, title: 'Websites with a point of view', description: 'Distinctive, accessible websites that communicate clearly and load without the wait.', meta: 'DESIGN + ENGINEERING', size: 'capability-wide' },
    { id: '02', icon: Layers3, title: 'Products people understand', description: 'Useful software, carefully shaped around the people and work it serves.', meta: 'PRODUCT + PLATFORM', size: '' },
    { id: '03', icon: Gauge, title: 'Speed you can demonstrate', description: 'A practical audit, focused fixes, and repeatable measurements. No score promises.', meta: 'AUDIT + OPTIMIZATION', size: '' },
];

const steps = [
    { number: '01', title: 'Find the signal', text: 'We listen, inspect what exists, and agree on what success means.' },
    { number: '02', title: 'Shape the answer', text: 'We turn the clearest opportunity into a design and delivery plan.' },
    { number: '03', title: 'Make it real', text: 'We build in small steps, check the details, and share progress early.' },
    { number: '04', title: 'Keep it improving', text: 'We measure what shipped and use the evidence to choose what comes next.' },
];

const stack = ['Laravel', 'Vue', 'Inertia', 'Vite', 'MySQL', 'Responsive UX'];
</script>

<template>
    <Head>
        <title>Biswas IT Firm — Digital work, made with intent</title>
        <meta name="description" content="Biswas IT Firm designs and builds considered digital products, responsive websites, and faster online experiences." />
        <link rel="preload" as="image" href="/images/hero.svg" fetchpriority="high" />
    </Head>

    <div class="editorial-site">
        <div class="announcement"><span class="announcement-dot"></span> INDEPENDENT DIGITAL STUDIO <span class="announcement-separator">/</span> DHAKA, BANGLADESH</div>

        <header class="editorial-header">
            <div class="editorial-nav frame">
                <a href="#home" class="wordmark" aria-label="Biswas IT home" @click="closeMenu"><span class="wordmark-symbol">b.</span><span>BISWAS <i>IT FIRM</i></span></a>
                <button class="editorial-menu-toggle" type="button" :aria-expanded="menuOpen" aria-label="Toggle navigation" @click="menuOpen = !menuOpen"><X v-if="menuOpen" :size="19" /><Menu v-else :size="19" /></button>
                <nav class="editorial-links" :class="{ 'editorial-links-open': menuOpen }" aria-label="Main navigation">
                    <a href="#expertise" @click="closeMenu">Expertise</a>
                    <a href="#field-notes" @click="closeMenu">Field notes</a>
                    <a href="#method" @click="closeMenu">Method</a>
                    <Link href="/performance-report" @click="closeMenu">Performance audit <ArrowUpRight :size="13" /></Link>
                </nav>
            </div>
        </header>

        <main id="home">
            <section class="editorial-hero">
                <div class="frame hero-frame">
                    <div class="hero-editorial-copy">
                        <p class="eyebrow-editorial"><span>01</span> BISWAS IT <i>/</i> PRODUCT &amp; PERFORMANCE STUDIO</p>
                        <h1>Good ideas.<br /><span class="headline-marker">Built to work.</span></h1>
                        <p class="hero-editorial-lede">We bring product thinking and careful engineering together to make digital experiences clearer, faster, and easier to trust.</p>
                        <div class="editorial-actions"><a class="button-ink" href="#expertise">What we can do <ArrowDownRight :size="16" /></a><Link class="button-text" href="/performance-report">See the performance audit <ArrowRight :size="15" /></Link></div>
                    </div>

                    <div class="poster-wrap">
                        <div class="poster-index"><span>STUDIO STUDY</span><span>NO. 001 — 2026</span></div>
                        <div class="hero-poster"><img class="poster-art" :src="'/images/hero.svg'" width="900" height="900" alt="Abstract flowing lines in shades of blue" fetchpriority="high" decoding="async" /><span class="poster-label poster-label-top">THOUGHTFUL<br />BY DESIGN</span><span class="poster-label poster-label-bottom">FAST<br />BY DEFAULT</span><span class="poster-stamp"><Asterisk :size="18" /> B.</span></div>
                        <div class="poster-caption"><span>Useful technology, with room to breathe.</span><ArrowUpRight :size="14" /></div>
                    </div>
                </div>

                <div class="frame build-ribbon"><div class="ribbon-intro"><span>THE CURRENT BUILD</span><b>A small, inspectable starting point.</b></div><div class="ribbon-metric"><strong>2.1<span>KB</span></strong><small>HERO SVG · RAW</small></div><div class="ribbon-metric"><strong>~4.4<span>KB</span></strong><small>HOME ROUTE · GZIP</small></div><div class="ribbon-metric"><strong>~7<span>KB</span></strong><small>CSS · GZIP</small></div><div class="ribbon-end"><span class="ribbon-line"></span><span>BUILD OUTPUT, NOT A LIGHTHOUSE SCORE</span></div></div>
            </section>

            <section id="expertise" class="editorial-section expertise-section">
                <div class="frame"><div class="section-topline"><span>01 — WHAT WE MAKE</span><span>STRATEGY / DESIGN / DEVELOPMENT</span></div><div class="expertise-heading"><h2>Useful things.<br /><span>Made with care.</span></h2><p>Technology is only valuable when it makes something better for someone. We focus on the details that make the whole experience work.</p></div>
                    <div class="capability-grid"><article v-for="item in capabilities" :key="item.id" class="capability-card" :class="item.size"><div class="capability-meta"><span>{{ item.meta }}</span><span>{{ item.id }}</span></div><div class="capability-icon"><component :is="item.icon" :size="19" /></div><h3>{{ item.title }}</h3><p>{{ item.description }}</p><a href="#contact" class="capability-arrow" :aria-label="`Ask about ${item.title}`"><ArrowUpRight :size="17" /></a></article><div class="capability-aside"><Asterisk :size="20" /><p>Thoughtful work is a thousand small decisions, made in the right order.</p><a href="#method">A little about our method <ArrowRight :size="14" /></a></div></div>
                </div>
            </section>

            <section id="field-notes" class="field-section">
                <div class="frame field-layout"><div class="field-art"><div class="field-art-top"><span>FIELD NOTE 001</span><span>PERFORMANCE LAB</span></div><div class="field-schematic"><div class="schematic-axis axis-h"></div><div class="schematic-axis axis-v"></div><div class="schematic-circle circle-a"></div><div class="schematic-circle circle-b"></div><div class="schematic-point point-a"></div><div class="schematic-point point-b"></div><div class="schematic-point point-c"></div><span class="schematic-word">less<br />waiting</span><span class="schematic-caption">A faster path<br />to the useful part.</span><div class="schematic-tag">01 — THE CRITICAL PATH</div></div><div class="field-art-foot"><span>OBSERVE → CHANGE → MEASURE</span><span>EST. 2026</span></div></div><div class="field-copy"><p class="eyebrow-editorial"><span>02</span> A WORKING STUDY</p><h2>Performance is a feeling.<br /><em>And a number.</em></h2><p>People notice when a page responds quickly. Lighthouse helps us understand why. This demo pairs a real implementation with a report that is ready for measured before-and-after results.</p><div class="field-facts"><div><span>01</span><b>Inspect</b><small>Find the bottleneck.</small></div><div><span>02</span><b>Improve</b><small>Change the critical path.</small></div><div><span>03</span><b>Verify</b><small>Compare the same test.</small></div></div><Link href="/performance-report" class="button-outline">Open the audit <ArrowUpRight :size="15" /></Link></div></div>
            </section>

            <section id="method" class="editorial-section method-section">
                <div class="frame"><div class="section-topline"><span>03 — HOW WE WORK</span><span>NO BLACK BOXES</span></div><div class="method-heading"><h2>Good work is<br />a <span>conversation.</span></h2><p>Shared context beats guesswork. Here is how we take an idea from the first question to a product in the world.</p></div>
                    <div class="method-list"><article v-for="step in steps" :key="step.number" class="method-row"><span class="method-number">{{ step.number }}</span><h3>{{ step.title }}</h3><p>{{ step.text }}</p><ArrowUpRight :size="16" class="method-arrow" /></article></div>
                </div>
            </section>

            <section class="stack-band"><div class="frame stack-band-inner"><div><span class="stack-kicker">A FEW TOOLS WE TRUST</span><p>Chosen for the work.<br /><b>Never for the trend.</b></p></div><div class="stack-list"><span v-for="(technology, index) in stack" :key="technology"><i>0{{ index + 1 }}</i>{{ technology }}</span></div></div></section>

            <section id="contact" class="contact-editorial"><div class="frame contact-editorial-inner"><div class="contact-orbit-mark"><MoveUpRight :size="24" /><span>LET'S<br />MAKE IT<br />MATTER.</span></div><div class="contact-editorial-copy"><p class="eyebrow-editorial"><span>04</span> YOUR NEXT CHAPTER</p><h2>Have a good<br />problem?</h2><p>Tell us what is not working yet. We will help you find a thoughtful way forward.</p><div class="contact-editorial-actions"><a class="button-primary" href="mailto:hello@biswasit.com">Start a conversation <ArrowUpRight :size="16" /></a><Link href="/performance-report" class="contact-report-link">Or explore the audit <ArrowRight :size="14" /></Link></div></div></div></section>
        </main>

        <footer class="editorial-footer"><div class="frame footer-editorial-main"><a href="#home" class="wordmark"><span class="wordmark-symbol">b.</span><span>BISWAS <i>IT FIRM</i></span></a><p>Digital work,<br />made with intent.</p><div class="footer-editorial-links"><a href="#expertise">Expertise</a><a href="#method">Method</a><Link href="/performance-report">Performance audit</Link></div><span class="footer-location"><span class="announcement-dot"></span> DHAKA, BANGLADESH</span></div><div class="frame footer-editorial-bottom"><span>© {{ new Date().getFullYear() }} Biswas IT Firm · Performance optimization demo</span><a href="#home">Back to top ↑</a><span>BUILT WITH LARAVEL / VUE / VITE</span></div></footer>
    </div>
</template>
