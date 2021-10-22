<template>
    <section id="post-list">
        <h2>I miei post</h2>
    </section>
</template>

<script>
export default {
    name: "PostList",
    data() {
        return {
            baseUri: "http://localhost:8000",
            posts: []
        };
    },
    methods: {
        // funzione per la chiamata api
        getPosts() {
            axios
                .get(`${this.baseUri}/api/posts`)
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
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
