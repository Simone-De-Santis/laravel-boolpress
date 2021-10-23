<template>
    <section id="post-list">
        <h2>I miei post</h2>
        <Loader v-if="isLoading" />
        <div v-else>
            <Pagination
                :lastPage="pagination.lastPage"
                :currentPage="pagination.currentPage"
                @onPageChange="changePage"
            />

            <button
                class="btn mb-3"
                @click="togleOrder()"
                :class="[order == 'desc' ? 'btn-primary' : 'btn-success']"
            >
                Asc/Desc
            </button>

            <PostCard v-for="post in posts" :key="post.id" :post="post" />
            <!-- link pagination -->
            <Pagination
                :lastPage="pagination.lastPage"
                :currentPage="pagination.currentPage"
                @onPageChange="changePage"
            />
        </div>
    </section>
</template>

<script>
import PostCard from "./PostCard";
import Loader from "../Loader";
import Pagination from "../Pagination";

export default {
    name: "PostList",
    components: { PostCard, Loader, Pagination },
    data() {
        return {
            baseUri: "http://localhost:8000",
            order: "desc",
            posts: [],
            // current page
            pagination: {},
            // impostiamo il loader
            isLoading: false
        };
    },
    methods: {
        // funzione per la chiamata api
        getPosts(page) {
            this.isLoading = true;
            axios
                .get(
                    `${this.baseUri}/api/posts?page=${page}&order=${this.order}`
                )
                .then(res => {
                    // this.posts = res.data.data;
                    // destructuring:
                    const { data, current_page, last_page } = res.data;
                    this.posts = data;
                    this.pagination = {
                        currentPage: current_page,
                        lastPage: last_page
                    };

                    this.isLoading = false;
                })
                .catch(err => {
                    console.log(err);
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
        changePage(page) {
            this.getPosts(page);
        },
        togleOrder() {
            if (this.order == "desc") {
                this.order = "asc";
                this.getPosts();
            } else {
                this.order = "desc";
                this.getPosts();
            }
        }
    },
    created() {
        // chiamiamo la funzione
        this.getPosts();
    }
};
</script>

<style lang="scss" scoped></style>
