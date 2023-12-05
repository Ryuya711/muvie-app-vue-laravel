<template>
    <form @submit.prevent="submitMuvie">
        <input type="text" v-model="title" placeholder="タイトル">
        <input type="text" v-model="director" placeholder="監督名">
        <button @click="addMuvie">追加</button>
    </form>

    <li v-for="muvie in muvies" :key="muvie.id">
        {{ muvie.id }} / {{ muvie.title }} / {{ muvie.director }}
        <button
            :disabled="isPush"
            @click="displayUpdate(muvie)"
        >編集</button>

        <button
            :disabled="isPush" @click="deleteMuvie(muvie.id)"
        >削除</button>
    </li>

    <div v-if="updateForm">
        <input type="text" v-model="updateTitle" placeholder="タイトル">
        <input type="text" v-model="updateDirector" placeholder="監督名">
        <button @click="updateMuvie()">変更</button>
        <button @click="updateCancel">キャンセル</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            muvies: [],  // muviesを配列に変更
            title: '',
            director: '',
            isPush: false,
            updateForm: false,
            updateId: '',
            updateTitle: '',
            updateAuthor: ''
        };
    },

    methods: {
        // 一覧表示処理_index
        getMuvies() {
            axios.get('/api/muvies').then(res => {
                this.muvies = res.data;
            });
        },

        // 登録処理_new_create
        addMuvie() {
            axios.post('/api/muvies', {
                title: this.title,
                director: this.director
            }).then(() => {
                // リクエストが成功した後の処理
                this.title = '';
                this.director = '';
                this.getMuvies();
            });
        },

        // 更新処理
        displayUpdate(muvie) {
            this.isPush = true;
            this.updateForm = true;
            this.updateId = muvie.id;
            this.updateTitle = muvie.title;
            this.updateDirector = muvie.director;
        },
        updateMuvie() {
            axios.put('/api/muvies/' + this.updateId, {
                title: this.updateTitle,
                director: this.updateDirector
            }).then(() => {
                this.isPush = false;
                this.updateForm = false;
                this.getMuvies();
            });     
        },
        updateCancel() {
            this.isPush = false;
            this.updateForm = false;
        },

        deleteMuvie(id) {
            axios.delete('/api/muvies/' + id).then(() => {
                this.getMuvies();
            });
        },
    },

    mounted() {
        this.getMuvies();  // コンポーネントがマウントされた時に一覧を読み込む
    }
};
</script>


<style scoped>

</style>