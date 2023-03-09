<template>
    <div class="container mx-auto">
        <o-modal v-model:active="confirmDeleteActive">
            <div class="p-4">
                <p>¿Seguro que quieres eliminar el registro seleccionado?</p>
            </div>
            <div class="flex flex-row-reverse">
                <o-button @click="confirmDeleteActive = false"
                    >Cancelar</o-button
                >
                <o-button variant="danger" @click="deletePost()"
                    >Eliminar</o-button
                >
            </div>
        </o-modal>
        <h1>Listado de Post</h1>
        <o-button
            size="medium"
            icon-left="plus"
            @click="$router.push({ name: 'Save' })"
            >Crear</o-button
        >
        <div class="mb-10"></div>
        <br />
        <o-table
            :loading="isLoading"
            :data="posts.current_page && posts.length == 0 ? [] : posts.data"
        >
            <o-table-column field="id" label="Id" v-slot="p">
                {{ p.row.id }}
            </o-table-column>
            <o-table-column field="title" label="Titulo" v-slot="p">
                {{ p.row.title }}
            </o-table-column>
            <o-table-column field="posted" label="Posted" v-slot="p">
                {{ p.row.posted }}
            </o-table-column>
            <o-table-column field="created_at" label="Fecha" v-slot="p">
                {{ p.row.created_at }}
            </o-table-column>
            <o-table-column field="category" label="Categoría" v-slot="p">
                {{ p.row.category.title }}
            </o-table-column>
            <o-table-column field="slug" label="Acciones" v-slot="p">
                <router-link
                    class="ml-2"
                    :to="{ name: 'Save', params: { slug: p.row.slug } }"
                    >Editar</router-link
                >
                <o-button
                    icon-left="delete"
                    rounded
                    size="small"
                    variant="danger"
                    @click="
                        deletePostRow = p;
                        confirmDeleteActive = true;
                    "
                    >Eliminar</o-button
                >
            </o-table-column>
        </o-table>
        <br />
        <o-pagination
            :total="posts.total"
            @change="updatePage"
            v-model:current="currentPage"
            :range-before="2"
            :range-after="2"
            order="centered"
            size="small"
            :simple="false"
            :rounded="true"
            :per-page="posts.per_page"
        >
        </o-pagination>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: 1,
            confirmDeleteActive: false,
            deletePostRow: "",
        };
    },
    methods: {
        updatePage() {
            setTimeout(this.listPage, 100);
        },
        listPage() {
            this.isLoading = true;
            this.$axios
                .get("/api/post?page=" + this.currentPage)
                .then((res) => {
                    this.posts = res.data;
                    //console.log(this.posts);
                    this.isLoading = false;
                });
        },
        deletePost(row) {
            this.confirmDeleteActive = false;
            this.posts.data.splice(this.deletePostRow.index, 1);
            this.$axios.delete("/api/post/" + this.deletePostRow.row.id);
        },
    },
    async mounted() {
        this.listPage();
    },
};
</script>
