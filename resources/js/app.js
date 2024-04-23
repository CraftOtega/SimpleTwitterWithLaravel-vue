import './bootstrap';
import { createApp} from 'vue';
import Example from  './components/Example.vue';
import test from  './components/test.vue';
import followButton from './components/followButton.vue';

import Alpine from 'alpinejs';

const  app = createApp({})


app.component('Example', Example)
app.component('test', test)
app.component('follow', followButton)

 
app.mount('#app')


/*
const  app = createApp({

components: {

Example,
followButton,

},


});

app.mount('#app');



*/
window.Alpine = Alpine;

Alpine.start();
