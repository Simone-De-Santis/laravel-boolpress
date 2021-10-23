<template>
    <section id="post-list">
        <h2>I miei post</h2>
        <Loader v-if="isLoading" />
        <PostCard v-else v-for="post in posts" :key="post.id" :post="post" />
    </section>
</template>

<script>
import PostCard from "./PostCard";
import Loader from "../Loader";

export default {
    name: "PostList",
    components: { PostCard, Loader },
    data() {
        return {
            baseUri: "http://localhost:8000",
            posts: [],
            // impostiamo il loader
            isLoading: false
        };
    },
    methods: {
        // funzione per la chiamata api
        getPosts() {
            this.isLoading = true;
            axios
                .get(`${this.baseUri}/api/posts`)
                .then(res => {
                    this.posts = res.data;
                    this.isLoading = false;
                })
                .catch(err => {
                    console.log(err);
                })
                .then(() => {
                    this.isLoading = false;
                });
        }
    },
    created() {
        // chiamiamo la funzione
        this.getPosts();
    }
};
</script>

<style></style>
