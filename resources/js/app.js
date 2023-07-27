require('./bootstrap');

import { createApp } from 'vue';
import BlogPost from './components/BlogPost.vue';

createApp({
    components: {
        BlogPost,
    }
}).mount('#app');