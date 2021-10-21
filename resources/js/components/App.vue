<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <Header :title="title" />
                    <div class="card-body">
                        Sito in costruzione
                    </div>
                </div>
                questa pagina è in resource / js /components /app.vue
            </div>
        </div>
    </div>
</template>

<script>
// import del componente esterno 'header'
import Header from "./Header.vue";
export default {
    name: "App",
    data() {
        return { title: " Blog di De Santis Simone" };
    },
    components: {
        Header
    }
};
</script>
