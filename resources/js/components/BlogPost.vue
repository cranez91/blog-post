<template>
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-12">
      <div class="w-full mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800">New changelog template + the biggest Tailwind UI update ever</h1>
        <p class="mt-2 text-sm text-gray-600">Monday, April 24, 2023</p>
        <div class="mt-6 prose prose-sm prose-indigo">
            <div class="mt-12 prose prose-slate dark:prose-dark">
                <p>I haven’t shared a Tailwind UI update since we released the <a href="https://tailwindui.com/templates/protocol">Protocol template</a> in December, but that’s not because we haven’t been busy.</p>
                <p>Over the last four months we’ve probably done more work on Tailwind UI than we ever have, and having finally wrapped up what we set out to achieve I’m excited to lay it all out for you!</p>
                <hr>
                <h2 
                    class="flex whitespace-pre-wrap not-prose" 
                    id="commit-a-beautiful-changelog-template-for-your-next-idea"
                >
                    <a 
                        class="group relative border-none lg:-ml-2 lg:pl-2" 
                        href="#commit-a-beautiful-changelog-template-for-your-next-idea"
                    >
                        <div 
                            class="absolute -ml-8 hidden items-center border-0 opacity-0 group-hover:opacity-100 group-focus:opacity-100 lg:flex"
                        >
                            ​<div 
                                class="flex h-6 w-6 items-center justify-center rounded-md text-slate-400 shadow-sm ring-1 ring-slate-900/5 hover:text-slate-700 hover:shadow hover:ring-slate-900/10 dark:bg-slate-700 dark:text-slate-300 dark:shadow-none dark:ring-0"
                            >
                                <svg width="12" height="12" fill="none" aria-hidden="true"><path d="M3.75 1v10M8.25 1v10M1 3.75h10M1 8.25h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                            </div>
                        </div>
                        Commit: A beautiful changelog template for your next idea
                        </a>
                </h2>
                <p>Just a few days ago we released <a href="https://tailwindui.com/templates/commit">Commit</a>, a brand new changelog template we designed for Tailwind UI — built of course with Tailwind CSS and Next.js.</p>
                <a href="https://tailwindui.com/templates/commit">
                    <div class="relative py-6 not-prose [a:not(:first-child)>&amp;]:mt-12 [a:not(:last-child)>&amp;]:mb-12 my-12 first:mt-0 last:mb-0 rounded-2xl overflow-hidden [figure>&amp;]:my-0">
                        <img 
                            src="https://tailwindcss.com/_next/static/media/commit-template.ad391efe.png" 
                            alt="Learn about the Commit template" 
                            decoding="async"
                        >
                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-slate-900/10 dark:ring-white/10">
                        </div>
                    </div>
                </a>
                <p>Public changelogs have become a really popular way to keep people in the loop about what you’ve been working on, and to stay accountable and build your shipping muscles. They aren’t a new concept by any means of course, but I don’t think it was until <a href="https://linear.app/changelog">Linear</a> started publishing to their changelog site that others got excited about using them almost as an alternative to a company blog.</p>
                <p><strong>Commit is our take on the modern product changelog</strong>, designed as a single page website that can act as both your project homepage and a feed of everything you’ve been working on.</p>
                <div class="relative not-prose [a:not(:first-child)>&amp;]:mt-12 [a:not(:last-child)>&amp;]:mb-12 my-12 first:mt-0 last:mb-0 rounded-2xl overflow-hidden [figure>&amp;]:my-0"><img src="https://tailwindcss.com/_next/static/media/commit-template-dark-mode.a969c7d9.png" alt="The Commit template in dark mode, partially scrolled down to reveal a second post" decoding="async"><div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-slate-900/10 dark:ring-white/10"></div></div>
                <p>Like all of our templates, it’s loaded with features and details that make it a delight to experience and a pleasure to work on:</p>
                <ul role="list">
                    <li>
                        <strong>Light and dark mode support</strong>, because you can’t make anything a developer might read without optimizing it for reading at 2am with the lights off.</li>
                    <li>
                        <strong>Hand-crafted typography styles</strong>, meticulously chosen font sizes, spacing, list styles, and more, designed specifically for this template.</li>
                    <li>
                        <strong>Built-in syntax highlighting</strong>, powered by <a href="https://github.com/shikijs/shiki">Shiki</a>, and easy to customize with a few CSS variables.</li>
                    <li>
                        <strong>Single-file editing experience</strong>, every entry lives in a single MDX file, so updating your changelog feels as lightweight as updating a <code>CHANGELOG.md</code> file in an open-source project.</li>
                    <li>
                        <strong>Beautiful animations and effects</strong>, this time powered by <a href="https://motion.dev/">Motion One</a>, making it a great resource for studying how to pull off these sorts of tricks with a cutting-edge new library.</li>
                </ul>
                <p>As always it’s easy to jump into the code and make it your own — here we’ve just tweaked a handful of colors and it feels like a totally different website:</p>
                <div class="relative not-prose [a:not(:first-child)>&amp;]:mt-12 [a:not(:last-child)>&amp;]:mb-12 my-12 first:mt-0 last:mb-0 rounded-2xl overflow-hidden [figure>&amp;]:my-0"><img src="https://tailwindcss.com/_next/static/media/commit-template-for-motion-one.c08884a6.png" alt="The Commit template customized to match the branding of the Motion One open-source library" decoding="async"><div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-slate-900/10 dark:ring-white/10"></div></div>
                <p>Check out the <a href="https://commit.tailwindui.com">live demo</a> for the full experience, and if you’re already the proud owner of a <a href="https://tailwindui.com/all-access">Tailwind UI all-access</a> license, download a copy of the template to use it in your next project or just to study the source code to learn a new trick or two.</p>
                <hr>
            </div>
        </div>
      </div>

      <CommentsSection/>
    </div>
  </div>
</template>

<script>
import CommentsSection from './CommentsSection.vue';

export default {
  components: {
    CommentsSection
  },
  data() {
    return {
    };
  },
  methods: {
    
  },
};
</script>