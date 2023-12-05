import './bootstrap';
// VueのcreateApp関数をインポート
import { createApp } from 'vue';


// コンポーネントをインポート
import HelloWorld from './components/HelloWorld.vue';
import HelloJapan from './components/HelloJapan.vue';
import MessageComponent from './components/MessageComponent.vue';
import MuvieComponent from './components/MuvieComponent.vue';

// Vueアプリケーションインスタンスを作成
const app = createApp({
    // ルートコンポーネントで使用するデータ、メソッドなどをここに記述できます
});

// コンポーネントをアプリケーションインスタンスに登録
app.component('hello-world', HelloWorld);
app.component('hello-japan', HelloJapan);
app.component('message-component', MessageComponent);
app.component('muvie-component', MuvieComponent);

// アプリケーションをDOM要素にマウント
app.mount('#app');

