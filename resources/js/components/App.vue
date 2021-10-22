<template>
    <div class="container">
        <Header :title="title" />
        <main>
            <PostList />
        </main>
    </div>
</template>

<script>
// import del componente esterno 'header'
import Header from "./Header.vue";
import PostList from "./Posts/PostList.vue";

export default {
    name: "App",
    components: {
        PostList,
        Header
    },
    data() {
        return { title: " Blog di De Santis Simone" };
    }
};
</script>
