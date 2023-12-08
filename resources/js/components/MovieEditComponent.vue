<template>
    <div class="movie-edit">
        <h1 class="title">編集画面</h1>
        <div class="form-container">
            <div class="form-group">
                <label for="title">タイトル:</label>
                <input type="text" id="title" v-model="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="director">監督:</label>
                <input type="text" id="director" v-model="director" class="form-control">
            </div>
            <div class="form-group">
                <label for="score">スコア:</label>
                <input type="number" id="score" v-model="score" class="form-control" min="0.1" max="5.0" step="0.1">
            </div>
            <button @click="updateMovie" class="btn">更新</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            title: '',
            director: '',
            score: 0
        };
    },
    mounted() {
        this.fetchMovieData(this.$route.params.movieId);
    },
    methods: {
        fetchMovieData(movieId) {
            axios.get(`/api/movies/${movieId}`).then(response => {
                const movieData = response.data;
                this.title = movieData.title;
                this.director = movieData.director;
                this.score = movieData.score ? movieData.score.score : 0;
            }).catch(error => {
                console.error(error);
            });
        },
        updateMovie() {
            axios.put(`/api/movies/${this.$route.params.movieId}`, {
                title: this.title,
                director: this.director,
                score: this.score
            }).then(() => {
                this.$router.push(`/movies/${this.$route.params.movieId}`);
            }).catch(error => {
                console.error(error);
            });
        }
    }
};
</script>

<style scoped>
.movie-edit {
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.title {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 2em;
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: white;
    color: #495057;
}

.btn {
    padding: 10px 20px;
    border: none;
    background-color: #6c757d;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    margin-right: 5px;
}

.btn:hover {
    background-color: #5a6268;
}
</style>